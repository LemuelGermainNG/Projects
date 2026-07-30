<?php

declare(strict_types=1);

namespace App\Core\Support\Discovery;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

final class FileScanner
{
    /**
     * Scan a directory and return all discovered classes.
     *
     * @return array<class-string, string>
     */
    public function scan(string $directory): array
    {
        if (! is_dir($directory)) {
            return [];
        }

        $classes = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $directory,
                RecursiveDirectoryIterator::SKIP_DOTS,
            ),
        );

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $class = $this->extractClassFromFile(
                $file->getPathname(),
            );

            if ($class !== null && class_exists($class)) {
                $classes[$class] = $file->getPathname();
            }
        }

        return $classes;
    }

    /**
     * Extract the fully-qualified class name from a PHP file.
     */
    protected function extractClassFromFile(string $path): ?string
    {
        $contents = file_get_contents($path);

        if ($contents === false) {
            return null;
        }

        $tokens = token_get_all($contents);

        $namespace = '';
        $class = '';

        $count = count($tokens);

        for ($i = 0; $i < $count; $i++) {
            if (! is_array($tokens[$i])) {
                continue;
            }

            switch ($tokens[$i][0]) {

                case T_NAMESPACE:

                    $namespace = '';

                    for ($j = $i + 1; $j < $count; $j++) {

                        if ($tokens[$j] === ';' || $tokens[$j] === '{') {
                            break;
                        }

                        if (! is_array($tokens[$j])) {
                            continue;
                        }

                        if (
                            in_array(
                                $tokens[$j][0],
                                [
                                    T_STRING,
                                    T_NS_SEPARATOR,
                                    T_NAME_QUALIFIED,
                                ],
                                true,
                            )
                        ) {
                            $namespace .= $tokens[$j][1];
                        }
                    }

                    break;

                case T_CLASS:
                case T_INTERFACE:
                case T_TRAIT:
                case T_ENUM:

                    for ($j = $i + 1; $j < $count; $j++) {

                        if (! is_array($tokens[$j])) {
                            continue;
                        }

                        if ($tokens[$j][0] === T_STRING) {
                            $class = $tokens[$j][1];
                            break;
                        }
                    }

                    break;
            }

            if ($namespace !== '' && $class !== '') {
                return "{$namespace}\\{$class}";
            }
        }

        return null;
    }
}

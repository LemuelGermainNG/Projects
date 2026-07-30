<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;
use InvalidArgumentException;

final class BuilderRegistry
{
    /**
     * Registered builders.
     *
     * @var array<class-string<Schema>, class-string<Builder>>
     */
    protected array $builders = [];

    /**
     * Register a builder for a schema.
     *
     * @param class-string<Schema> $schema
     * @param class-string<Builder> $builder
     */
    public function register(
        string $schema,
        string $builder,
    ): static {
        $this->builders[$schema] = $builder;

        return $this;
    }

    /**
     * Compile a schema.
     */
    public function build(Schema $schema): array
    {
        $builder = $this->resolve($schema);

        return new $builder(
            $schema,
            $this,
        )->build();
    }

    /**
     * Returns all registered builders.
     *
     * @return array<class-string<Schema>, class-string<Builder>>
     */
    public function builders(): array
    {
        return $this->builders;
    }

    /**
     * Resolve the builder for a schema.
     *
     * @return class-string<Builder>
     */
    protected function resolve(Schema $schema): string
    {
        $schemaClass = $schema::class;

        if (! isset($this->builders[$schemaClass])) {
            throw new InvalidArgumentException(
                sprintf(
                    'No builder registered for schema [%s].',
                    $schemaClass,
                ),
            );
        }

        return $this->builders[$schemaClass];
    }
}

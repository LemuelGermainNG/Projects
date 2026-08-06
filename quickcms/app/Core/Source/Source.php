<?php

declare(strict_types=1);

namespace App\Core\Source;

use App\Core\Source\Contracts\Source as SourceContract;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

abstract class Source implements SourceContract
{
    /**
     * @return class-string<Model>
     */
    abstract public static function model(): string;

    /**
     * @return class-string<Data>
     */
    abstract public static function data(): string;

    public static function name(): string
    {
        return str(class_basename(static::class))
            ->before('Source')
            ->snake()
            ->toString();
    }
}

<?php

declare(strict_types=1);

namespace App\Core\Source\Contracts;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

interface Source
{
    /**
     * @return non-empty-string
     */
    public static function name(): string;

    /**
     * @return class-string<Model>
     */
    public static function model(): string;

    /**
     * @return class-string<Data>
     */
    public static function data(): string;
}

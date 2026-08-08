<?php

declare(strict_types=1);

namespace Tests\Support\Builders\Widget;

use App\Core\Schema\Widget\WidgetSchema;
use Tests\Fixtures\Sources\UserSource;

final class WidgetBuilderFactory
{
    public static function make(): WidgetSchema
    {
        return WidgetSchema::make()
            ->key('users')
            ->title('Users')
            ->description('Manage users')
            ->icon('heroicon-o-users')
            ->visible(true)
            ->width(6)
            ->columns([
                'default' => 1,
                'md' => 2,
            ])
            ->source(UserSource::class)
            ->props([
                'refresh' => true,
            ]);
    }

    public static function key(): WidgetSchema
    {
        return WidgetSchema::make()
            ->key('users');
    }

    public static function title(): WidgetSchema
    {
        return WidgetSchema::make()
            ->title('Users');
    }

    public static function description(): WidgetSchema
    {
        return WidgetSchema::make()
            ->description('Manage users');
    }

    public static function icon(): WidgetSchema
    {
        return WidgetSchema::make()
            ->icon('heroicon-o-users');
    }

    public static function visibility(): WidgetSchema
    {
        return WidgetSchema::make()
            ->visible(false);
    }

    public static function width(): WidgetSchema
    {
        return WidgetSchema::make()
            ->width(6);
    }

    public static function columns(): WidgetSchema
    {
        return WidgetSchema::make()
            ->columns([
                'default' => 1,
                'md' => 2,
            ]);
    }

    public static function props(): WidgetSchema
    {
        return WidgetSchema::make()
            ->props([
                'refresh' => true,
            ]);
    }

    public static function empty(): WidgetSchema
    {
        return WidgetSchema::make();
    }
}

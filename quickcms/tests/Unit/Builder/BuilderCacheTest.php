<?php

declare(strict_types=1);

use App\Core\Builder\BuilderCache;

function cachePath(): string
{
    return sys_get_temp_dir().'/builder-cache-'.uniqid('', true).'.php';
}

function cleanup(string $path): void
{
    if (file_exists($path)) {
        unlink($path);
    }
}

it('does not exist by default', function (): void {
    $path = cachePath();

    cleanup($path);

    $cache = new BuilderCache($path);

    expect($cache->exists())
        ->toBeFalse();
});

it('stores builders', function (): void {
    $path = cachePath();

    cleanup($path);

    $cache = new BuilderCache($path);

    $builders = [
        'App\\Schema\\DocumentSchema' => 'App\\Builder\\DocumentBuilder',
        'App\\Schema\\FormSchema' => 'App\\Builder\\FormBuilder',
    ];

    $cache->store($builders);

    expect($cache->exists())
        ->toBeTrue();

    cleanup($path);
});

it('loads builders', function (): void {
    $path = cachePath();

    cleanup($path);

    $cache = new BuilderCache($path);

    $builders = [
        'App\\Schema\\DocumentSchema' => 'App\\Builder\\DocumentBuilder',
        'App\\Schema\\FormSchema' => 'App\\Builder\\FormBuilder',
    ];

    $cache->store($builders);

    expect($cache->load())
        ->toBe($builders);

    cleanup($path);
});

it('returns an empty array when the cache does not exist', function (): void {
    $path = cachePath();

    cleanup($path);

    $cache = new BuilderCache($path);

    expect($cache->load())
        ->toBe([]);
});

it('clears the cache', function (): void {
    $path = cachePath();

    cleanup($path);

    $cache = new BuilderCache($path);

    $cache->store([
        'App\\Schema\\DocumentSchema' => 'App\\Builder\\DocumentBuilder',
    ]);

    expect($cache->exists())
        ->toBeTrue();

    $cache->clear();

    expect($cache->exists())
        ->toBeFalse();

    cleanup($path);
});

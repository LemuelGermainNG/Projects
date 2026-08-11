<?php

declare(strict_types=1);

it('exposes the same source to table and card widgets', function (): void {
    $response = $this->getJson(
        '/api/applications/admin/schema',
    );

    $response->assertOk();

    $schema = $response->json(
        'data.schema',
    );

    expect($schema)
        ->not->toBeNull();

    $widgets = [];

    $walk = function (mixed $value) use (
        &$walk,
        &$widgets,
    ): void {
        if (! is_array($value)) {
            return;
        }

        /*
         * A compiled widget always exposes its type and key.
         */
        if (
            isset($value['type'], $value['key'])
            && is_string($value['type'])
            && is_string($value['key'])
            && in_array(
                $value['type'],
                [
                    'table-widget',
                    'card-widget',
                ],
                true,
            )
        ) {
            $widgets[$value['key']] = $value;
        }

        foreach ($value as $child) {
            $walk($child);
        }
    };

    $walk($schema);

    expect($widgets)
        ->toHaveKeys([
            'latest-users',
            'users-source',
        ]);

    expect($widgets['latest-users'])
        ->toMatchArray([
            'type' => 'table-widget',
            'source' => 'user',
        ]);

    expect($widgets['users-source'])
        ->toMatchArray([
            'type' => 'card-widget',
            'source' => 'user',
        ]);
});

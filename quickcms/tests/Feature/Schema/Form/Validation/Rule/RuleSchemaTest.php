<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Rule\Rule;
use App\Core\Schema\Form\Validation\Rule\RuleType;
use Tests\Support\Builders\RuleBuilderFactory;

it('creates a rule', function (): void {
    expect(
        RuleBuilderFactory::make(),
    )->toBeInstanceOf(
        Rule::class,
    );
});

it('sets rule properties', function (): void {
    $rule = RuleBuilderFactory::make();

    expect($rule->type())
        ->toBe(
            RuleType::Min,
        );

    expect($rule->parameters())
        ->not()
        ->toBeNull();

    expect($rule->getMessage())
        ->toBe('Minimum 3 caractères');
});

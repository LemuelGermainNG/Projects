<?php

declare(strict_types=1);

use App\Core\Schema\Form\Validation\Rule\Password\PasswordParameters;
use App\Core\Schema\Form\Validation\Rule\Rule;
use App\Core\Schema\Form\Validation\Rule\RuleType;

describe('Presence', function (): void {

    it('creates required rule', function (): void {
        expect(Rule::required()->type())
            ->toBe(RuleType::Required);
    });

    it('creates nullable rule', function (): void {
        expect(Rule::nullable()->type())
            ->toBe(RuleType::Nullable);
    });

    it('creates accepted rule', function (): void {
        expect(Rule::accepted()->type())
            ->toBe(RuleType::Accepted);
    });

    it('creates declined rule', function (): void {
        expect(Rule::declined()->type())
            ->toBe(RuleType::Declined);
    });

});

describe('Types', function (): void {

    it('creates string rule', fn () => expect(Rule::string()->type())->toBe(RuleType::String));

    it('creates boolean rule', fn () => expect(Rule::boolean()->type())->toBe(RuleType::Boolean));

    it('creates integer rule', fn () => expect(Rule::integer()->type())->toBe(RuleType::Integer));

    it('creates numeric rule', fn () => expect(Rule::numeric()->type())->toBe(RuleType::Numeric));

    it('creates array rule', fn () => expect(Rule::array()->type())->toBe(RuleType::Array));

    it('creates date rule', fn () => expect(Rule::date()->type())->toBe(RuleType::Date));

    it('creates file rule', fn () => expect(Rule::file()->type())->toBe(RuleType::File));

    it('creates image rule', fn () => expect(Rule::image()->type())->toBe(RuleType::Image));

});

describe('Text', function (): void {

    it('creates email rule', fn () => expect(Rule::email()->type())->toBe(RuleType::Email));

    it('creates regex rule', fn () => expect(Rule::regex('/.*/')->type())->toBe(RuleType::Regex));

});

describe('Size', function (): void {

    it('creates min rule', fn () => expect(Rule::min(3)->type())->toBe(RuleType::Min));

    it('creates max rule', fn () => expect(Rule::max(255)->type())->toBe(RuleType::Max));

    it('creates between rule', fn () => expect(Rule::between(3, 255)->type())->toBe(RuleType::Between));

    it('creates decimal rule', fn () => expect(Rule::decimal(2)->type())->toBe(RuleType::Decimal));

    it('creates multiple of rule', fn () => expect(Rule::multipleOf(0.5)->type())->toBe(RuleType::MultipleOf));

});

describe('Dates', function (): void {

    it('creates before rule', fn () => expect(Rule::before('today')->type())->toBe(RuleType::Before));

    it('creates before or equal rule', fn () => expect(Rule::beforeOrEqual('today')->type())->toBe(RuleType::BeforeOrEqual));

    it('creates after rule', fn () => expect(Rule::after('today')->type())->toBe(RuleType::After));

    it('creates after or equal rule', fn () => expect(Rule::afterOrEqual('today')->type())->toBe(RuleType::AfterOrEqual));

});

describe('Database', function (): void {

    it('creates exists rule', fn () => expect(Rule::exists('users')->type())->toBe(RuleType::Exists));

    it('creates unique rule', fn () => expect(Rule::unique('users')->type())->toBe(RuleType::Unique));

});

describe('Files', function (): void {

    it('creates mimes rule', fn () => expect(Rule::mimes(['jpg'])->type())->toBe(RuleType::Mimes));

    it('creates extensions rule', fn () => expect(Rule::extensions(['jpg'])->type())->toBe(RuleType::Extensions));

});

describe('Password', function (): void {

    it('creates password rule', function (): void {

        expect(
            Rule::password(
                PasswordParameters::make(),
            )->type(),
        )->toBe(
            RuleType::Password,
        );

    });

});

describe('Comparison', function (): void {

    it('creates same rule', fn () => expect(Rule::same('password')->type())->toBe(RuleType::Same));

    it('creates different rule', fn () => expect(Rule::different('password')->type())->toBe(RuleType::Different));

    it('creates in rule', fn () => expect(Rule::in(['a'])->type())->toBe(RuleType::In));

    it('creates not in rule', fn () => expect(Rule::notIn(['a'])->type())->toBe(RuleType::NotIn));

});

describe('Custom', function (): void {

    it('creates custom rule', fn () => expect(Rule::custom('slug')->type())->toBe(RuleType::Custom));

});

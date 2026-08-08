<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Password;

use App\Core\Schema\Form\Validation\Rule\Parameter\RuleParameters;

final class PasswordParameters extends RuleParameters
{
    protected int $min = 8;

    protected bool $letters = false;

    protected bool $mixedCase = false;

    protected bool $numbers = false;

    protected bool $symbols = false;

    protected bool $uncompromised = false;

    protected PasswordStrength|null $strength = null;

    protected bool $generate = false;

    protected bool $showStrengthMeter = true;

    protected bool $includeDefaults = false;

    public static function make(): static
    {
        return new static();
    }

    public function min(
        int $value,
    ): static {
        return $this->with(
            'min',
            $value,
        );
    }

    public function letters(
        bool $value = true,
    ): static {
        return $this->with(
            'letters',
            $value,
        );
    }

    public function mixedCase(
        bool $value = true,
    ): static {
        return $this->with(
            'mixedCase',
            $value,
        );
    }

    public function numbers(
        bool $value = true,
    ): static {
        return $this->with(
            'numbers',
            $value,
        );
    }

    public function symbols(
        bool $value = true,
    ): static {
        return $this->with(
            'symbols',
            $value,
        );
    }

    public function uncompromised(
        bool $value = true,
    ): static {
        return $this->with(
            'uncompromised',
            $value,
        );
    }

    public function strength(
        PasswordStrength $strength,
    ): static {
        return $this->with(
            'strength',
            $strength,
        );
    }

    public function weak(): static
    {
        return $this->strength(
            PasswordStrength::Weak,
        );
    }

    public function medium(): static
    {
        return $this->strength(
            PasswordStrength::Medium,
        );
    }

    public function strong(): static
    {
        return $this->strength(
            PasswordStrength::Strong,
        );
    }

    public function veryStrong(): static
    {
        return $this->strength(
            PasswordStrength::VeryStrong,
        );
    }

    public function generate(
        bool $value = true,
    ): static {
        return $this->with(
            'generate',
            $value,
        );
    }

    public function showStrengthMeter(
        bool $value = true,
    ): static {
        return $this->with(
            'showStrengthMeter',
            $value,
        );
    }

    public function hideStrengthMeter(): static
    {
        return $this->showStrengthMeter(false);
    }

    public function includeDefaults(
        bool $value = true,
    ): static {
        return $this->with(
            'includeDefaults',
            $value,
        );
    }

    public function shouldIncludeDefaults(): bool
    {
        return $this->includeDefaults;
    }
}

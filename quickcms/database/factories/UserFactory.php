<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Features\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
final class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement([
                'active',
                'inactive',
                'pending',
            ]),
            'password' => 'password',
            'email_verified_at' => now(),
        ];
    }
}

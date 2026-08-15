<?php

declare(strict_types=1);

namespace App\Features\User\Pages;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Action\Actions\CancelAction;
use App\Core\Schema\Action\Actions\SaveAction;
use App\Core\Schema\Form\Field\FieldSchema;
use App\Core\Schema\Form\FormSchema;
use App\Core\Schema\Form\Input\Email\EmailInputSchema;
use App\Core\Schema\Form\Input\Password\PasswordInputSchema;
use App\Core\Schema\Form\Input\Select\SelectSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;
use App\Core\Schema\Form\Validation\Validation;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Page\PageSchema;

final class UserCreatePage implements Page
{
    public function id(): string
    {
        return 'users/create';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Create User')
                    ->description('Create a new application user.'),
            )
            ->content(
                CardSchema::make()
                    ->child(
                        FormSchema::make()
                            ->source('user')
                            ->schema([
                                FieldSchema::make()
                                    ->name('name')
                                    ->label('Name')
                                    ->child(
                                        TextInputSchema::make()
                                            ->name('name')
                                            ->placeholder('Jane Doe')
                                            ->validation(
                                                Validation::make()
                                                    ->required()
                                                    ->string()
                                                    ->min(2)
                                                    ->max(255),
                                            ),
                                    ),

                                FieldSchema::make()
                                    ->name('email')
                                    ->label('Email')
                                    ->child(
                                        EmailInputSchema::make()
                                            ->name('email')
                                            ->placeholder('jane@example.com')
                                            ->validation(
                                                Validation::make()
                                                    ->required()
                                                    ->email()
                                                    ->max(255),
                                            ),
                                    ),

                                FieldSchema::make()
                                    ->name('password')
                                    ->label('Password')
                                    ->child(
                                        PasswordInputSchema::make()
                                            ->name('password')
                                            ->revealable()
                                            ->validation(
                                                Validation::make()
                                                    ->required()
                                                    ->min(8),
                                            ),
                                    ),

                                FieldSchema::make()
                                    ->name('status')
                                    ->label('Status')
                                    ->child(
                                        SelectSchema::make()
                                            ->name('status')
                                            ->options([
                                                'active' => 'Active',
                                                'inactive' => 'Inactive',
                                            ])
                                            ->value('active')
                                            ->validation(
                                                Validation::make()
                                                    ->required()
                                                    ->in([
                                                        'active',
                                                        'inactive',
                                                    ]),
                                            ),
                                    ),
                            ])
                            ->footerActions([
                                CancelAction::make(),
                                SaveAction::make(),
                            ]),
                    ),
            );
    }

    public function metadata(): array
    {
        return [
            'title' => 'Create User',
            'description' => 'Create a new application user.',
        ];
    }
}

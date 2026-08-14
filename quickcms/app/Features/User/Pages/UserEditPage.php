<?php

declare(strict_types=1);

namespace App\Features\User\Pages;

use App\Core\Runtime\Contracts\Page;
use App\Core\Schema\Action\Actions\DeleteAction;
use App\Core\Schema\Action\Actions\SaveAction;
use App\Core\Schema\Form\Field\FieldSchema;
use App\Core\Schema\Form\FormSchema;
use App\Core\Schema\Form\Input\Email\EmailInputSchema;
use App\Core\Schema\Form\Input\Select\SelectSchema;
use App\Core\Schema\Form\Input\Text\TextInputSchema;
use App\Core\Schema\Form\Validation\Validation;
use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Layout\Card\CardSchema;
use App\Core\Schema\Page\PageSchema;
use App\Features\User\Sources\UserSource;

final class UserEditPage implements Page
{
    public function id(): string
    {
        return 'users/{id}/edit';
    }

    public function content(): PageSchema
    {
        return PageSchema::make()
            ->header(
                HeaderSchema::make()
                    ->title('Edit User')
                    ->description('Update an existing application user.'),
            )
            ->content(
                CardSchema::make()
                    ->child(
                        FormSchema::make()
                            ->source(UserSource::class)
                            ->schema([
                                FieldSchema::make()
                                    ->name('name')
                                    ->label('Name')
                                    ->child(
                                        TextInputSchema::make()
                                            ->name('name')
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
                                            ->validation(
                                                Validation::make()
                                                    ->required()
                                                    ->email()
                                                    ->max(255),
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
                                DeleteAction::make(),
                                SaveAction::make(),
                            ]),
                    ),
            );
    }

    public function metadata(): array
    {
        return [
            'title' => 'Edit User',
            'description' => 'Update an existing application user.',
        ];
    }
}

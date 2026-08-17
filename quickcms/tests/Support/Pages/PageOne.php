<?php

namespace Tests\Support\Pages;


use App\Core\Page\Contracts\Page;
use App\Core\Schema\Page\PageSchema;
use Override;

final class PageOne implements Page
{
    #[Override]
    public function id(): string
    {
        return 'page-one';
    }
    
    public function content(): PageSchema
    {
        return PageSchema::make();
    }

    #[Override]
    public function metadata(): array
    {
        return [];
    }

}

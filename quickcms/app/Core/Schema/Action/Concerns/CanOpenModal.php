<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

use App\Core\Schema\Modal\ModalSchema;

trait CanOpenModal
{
    /**
     * Action modal.
     */
    protected ?ModalSchema $modal = null;

    /**
     * Get or set the action modal.
     */
    public function modal(?ModalSchema $modal = null): ModalSchema|static|null
    {
        if ($modal === null) {
            return $this->modal;
        }

        $this->modal = $modal;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

use App\Core\Schema\Confirm\ConfirmSchema;

trait CanRequireConfirmation
{
    /**
     * Action confirmation.
     */
    protected ?ConfirmSchema $confirmation = null;

    /**
     * Get or set the confirmation dialog.
     */
    public function confirmation(
        ?ConfirmSchema $confirmation = null,
    ): ConfirmSchema|static|null {
        if ($confirmation === null) {
            return $this->confirmation;
        }

        $this->confirmation = $confirmation;

        return $this;
    }
}

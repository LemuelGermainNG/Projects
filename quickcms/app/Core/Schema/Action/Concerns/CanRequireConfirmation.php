<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Concerns;

use App\Core\Schema\Modal\ConfirmationSchema;

trait CanRequireConfirmation
{
    /**
     * Action confirmation.
     */
    protected ?ConfirmationSchema $confirmation = null;

    /**
     * Get or set the confirmation dialog.
     */
    public function confirmation(
        ?ConfirmationSchema $confirmation = null,
    ): ConfirmationSchema|static|null {
        if ($confirmation === null) {
            return $this->confirmation;
        }

        $this->confirmation = $confirmation;

        return $this;
    }
}

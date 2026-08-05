<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Time;

use App\Core\Schema\Form\Base\DateInputBaseBuilder;

final class TimeBuilder extends DateInputBaseBuilder
{
    public static function schema(): string
    {
        return TimeSchema::class;
    }

    public function build(): array
    {
        /** @var TimeSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'hoursStep',
            $this->evaluate(
                $schema->hoursStep(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'minutesStep',
            $this->evaluate(
                $schema->minutesStep(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'secondsStep',
            $this->evaluate(
                $schema->secondsStep(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'seconds',
            $this->evaluate(
                $schema->isSeconds(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'twentyFourHours',
            $this->evaluate(
                $schema->isTwentyFourHours(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}

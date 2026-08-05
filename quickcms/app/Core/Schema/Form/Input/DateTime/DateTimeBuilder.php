<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\DateTime;

use App\Core\Schema\Form\Base\DateInputBaseBuilder;

final class DateTimeBuilder extends DateInputBaseBuilder
{
    public static function schema(): string
    {
        return DateTimeSchema::class;
    }

    public function build(): array
    {
        /** @var DateTimeSchema $schema */
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
            'weekStartsOn',
            $this->evaluateEnum(
                $schema->weekStartsOn(),
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

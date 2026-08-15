<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Calendar;

use App\Core\Builder\Builder;

final class CalendarWidgetBuilder extends Builder
{
    public static function schema(): string
    {
        return CalendarWidgetSchema::class;
    }

    public function build(): array
    {
        /** @var CalendarWidgetSchema $schema */
        $schema = $this->schema;

        $data = [
            'type' => $this->type(),

            'title' => $this->evaluate(
                $schema->title(),
            ),

            'description' => $this->evaluate(
                $schema->description(),
            ),

            'icon' => $this->evaluate(
                $schema->icon(),
            ),

            'visible' => $this->evaluate(
                $schema->isVisible(),
            ),

            'width' => $this->evaluate(
                $schema->width(),
            ),

            'columns' => $this->evaluate(
                $schema->columns(),
            ),

            'props' => $schema->props(),
        ];

        $this->addIfNotNull(
            $data,
            'key',
            $this->evaluate(
                $schema->widgetKey(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'source',
            $this->resolveSourceName(
                $schema->source(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'views',
            $this->evaluate(
                $schema->viewsValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'defaultView',
            $this->evaluate(
                $schema->defaultViewValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'currentDate',
            $this->evaluate(
                $schema->currentDateValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'eventKey',
            $this->evaluate(
                $schema->eventKeyValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'eventTitle',
            $this->evaluate(
                $schema->eventTitleValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'eventStart',
            $this->evaluate(
                $schema->eventStartValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'eventEnd',
            $this->evaluate(
                $schema->eventEndValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'eventAllDay',
            $this->evaluate(
                $schema->eventAllDayValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'eventColor',
            $this->evaluate(
                $schema->eventColorValue(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'data',
            $this->compileChild(
                $schema->dataSchema(),
            ),
        );

        return $data;
    }
}

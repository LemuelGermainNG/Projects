<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Calendar;

use App\Core\Schema\Widget\WidgetSchema;

final class CalendarWidgetSchema extends WidgetSchema
{
    protected array|null $views = null;

    protected string|null $defaultView = null;

    protected string|null $currentDate = null;

    protected string|null $eventKey = null;

    protected string|null $eventTitle = null;

    protected string|null $eventStart = null;

    protected string|null $eventEnd = null;

    protected string|null $eventAllDay = null;

    protected string|null $eventColor = null;

    public function views(
        ?array $views,
    ): static {
        return $this->with(
            'views',
            $views,
        );
    }

    public function defaultView(
        ?string $defaultView,
    ): static {
        return $this->with(
            'defaultView',
            $defaultView,
        );
    }

    public function currentDate(
        ?string $currentDate,
    ): static {
        return $this->with(
            'currentDate',
            $currentDate,
        );
    }

    public function eventKey(
        ?string $eventKey,
    ): static {
        return $this->with(
            'eventKey',
            $eventKey,
        );
    }

    public function eventTitle(
        ?string $eventTitle,
    ): static {
        return $this->with(
            'eventTitle',
            $eventTitle,
        );
    }

    public function eventStart(
        ?string $eventStart,
    ): static {
        return $this->with(
            'eventStart',
            $eventStart,
        );
    }

    public function eventEnd(
        ?string $eventEnd,
    ): static {
        return $this->with(
            'eventEnd',
            $eventEnd,
        );
    }

    public function eventAllDay(
        ?string $eventAllDay,
    ): static {
        return $this->with(
            'eventAllDay',
            $eventAllDay,
        );
    }

    public function eventColor(
        ?string $eventColor,
    ): static {
        return $this->with(
            'eventColor',
            $eventColor,
        );
    }

    public function viewsValue(): ?array
    {
        return $this->views;
    }

    public function defaultViewValue(): ?string
    {
        return $this->defaultView;
    }

    public function currentDateValue(): ?string
    {
        return $this->currentDate;
    }

    public function eventKeyValue(): ?string
    {
        return $this->eventKey;
    }

    public function eventTitleValue(): ?string
    {
        return $this->eventTitle;
    }

    public function eventStartValue(): ?string
    {
        return $this->eventStart;
    }

    public function eventEndValue(): ?string
    {
        return $this->eventEnd;
    }

    public function eventAllDayValue(): ?string
    {
        return $this->eventAllDay;
    }

    public function eventColorValue(): ?string
    {
        return $this->eventColor;
    }
}

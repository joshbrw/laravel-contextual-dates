<?php

namespace Joshbrw\LaravelContextualDates\Traits;

use Carbon\Carbon;
use Joshbrw\LaravelContextualDates\Contracts\DateTimeFactory;
use Joshbrw\LaravelContextualDates\DateTime;

trait FormatsDates
{
    /**
     * Localize a Carbon into a DateTime
     * @param Carbon $carbon
     * @return DateTime
     */
    public function localizeDate(Carbon $carbon)
    {
        return app(DateTimeFactory::class)->createFromCarbon($carbon);
    }
}

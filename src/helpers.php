<?php

use Carbon\Carbon;
use Joshbrw\LaravelContextualDates\Contracts\DateTimeFactory;
use Joshbrw\LaravelContextualDates\DateTime;

/**
 * Localize a Date
 * @param Carbon|null $date
 * @return DateTime|null
 */
function localize_date(Carbon $date = null)
{
    if ($date === null) {
        return null;
    }

    return app(DateTimeFactory::class)
        ->createFromCarbon($date);
}

/**
 * Configure a Carbon date in a Format
 * @param Carbon|null $date
 * @param string $format The pre-configured format, i.e. 'long', or any regular PHP Date Format
 * @return string|null
 */
function format_date(Carbon $date = null, $format = 'Y-m-d H:i:s')
{
    if ($date === null) {
        return null;
    }

    return localize_date($date)->format($format);
}

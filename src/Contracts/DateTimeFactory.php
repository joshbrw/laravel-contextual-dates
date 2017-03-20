<?php

namespace Joshbrw\LaravelContextualDates\Contracts;

use Carbon\Carbon;
use Joshbrw\LaravelContextualDates\DateTime;
use DateTime as StandardDateTime;

interface DateTimeFactory
{

    /**
     * Set the Timezone
     * @param string $timezone
     * @return DateTimeFactory
     */
    public function setTimezone($timezone = 'UTC');

    /**
     * Get the Timezone
     * @return string
     */
    public function getTimezone();

    /**
     * Add a custom format
     * @param string $name Name of the format, i.e. 'american'
     * @param string $format Value of the format, i.e. 'Y-m-d'
     * @return DateTimeFactory
     */
    public function addFormat($name, $format);

    /**
     * Get all of the registered formats, in format:
     *      name => format
     * @return array
     */
    public function getFormats();

    /**
     * Create a DateTime instance from a Carbon instance
     * @param Carbon $date
     * @return DateTime
     */
    public function createFromCarbon(Carbon $date);

    /**
     * Create a DateTime instance from a standard DateTime instance
     * @param StandardDateTime $date
     * @return DateTime
     */
    public function createFromDateTime(StandardDateTime $date);
}

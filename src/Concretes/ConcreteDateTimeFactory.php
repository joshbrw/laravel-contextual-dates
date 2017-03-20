<?php

namespace Joshbrw\LaravelContextualDates\Concretes;

use Carbon\Carbon;
use Joshbrw\LaravelContextualDates\Contracts\DateTimeFactory;
use Joshbrw\LaravelContextualDates\DateTime;

class ConcreteDateTimeFactory implements DateTimeFactory
{
    /**
     * @var string Timezone
     */
    protected $timezone = 'UTC';

    /**
     * @var array
     */
    protected $formats = [
        'long' => 'd-m-Y H:i:s',
        'short' => 'd-m-Y'
    ];

    /**
     * Set the Timezone
     * @param string $timezone
     * @return DateTimeFactory
     */
    public function setTimezone($timezone = 'UTC')
    {
        if (!$this->timezoneIsValid($timezone)) {
            throw new InvalidArgumentException("Timezone {$timezone} is invalid.");
        }

        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get the Timezone
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Is $timezone a valid Timezone?
     * @param string $timezone
     * @return bool
     */
    protected function timezoneIsValid($timezone)
    {
        return in_array($timezone, timezone_identifiers_list());
    }


    /**
     * Add a custom format
     * @param string $name Name of the format, i.e. 'american'
     * @param string $format Value of the format, i.e. 'Y-m-d'
     * @return DateTimeFactory
     */
    public function addFormat($name, $format)
    {
        $this->formats[$name] = $format;

        return $this;
    }

    /**
     * Get all of the registered formats, in format:
     *      name => format
     * @return array
     */
    public function getFormats()
    {
        return $this->formats;
    }

    /**
     * Create a DateTime instance from a Carbon instance
     * @param Carbon $date
     * @return DateTime
     */
    public function createFromCarbon(Carbon $date)
    {
        $dateTime = DateTime::createFromFormat(
            Carbon::ISO8601,
            $date->format(Carbon::ISO8601),
            $date->getTimezone()
        );

        $dateTime->setTimezone($this->timezone);

        foreach ($this->formats as $name => $format) {
            $dateTime->addFormat($name, $format);
        }

        return $dateTime;
    }

    /**
     * Create a DateTime instance from a standard DateTime instance
     * @param \DateTime $date
     * @return DateTime
     */
    public function createFromDateTime(\DateTime $date)
    {
        $carbon = Carbon::createFromFormat(
            Carbon::ISO8601,
            $date->format(Carbon::ISO8601),
            $date->getTimezone()
        );

        return self::createFromCarbon($carbon);
    }
}

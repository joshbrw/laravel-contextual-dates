<?php

namespace Joshbrw\LaravelContextualDates;

use Carbon\Carbon;

class DateTime extends Carbon
{

    /**
     * @var string[]
     */
    private $formats = [];

    /**
     * Add a custom format
     * @param string $name Name of the format, i.e. 'american'
     * @param string $format Value of the format, i.e. 'Y-m-d'
     * @return DateTime
     */
    public function addFormat($name, $format)
    {
        $this->formats[$name] = $format;

        return $this;
    }

    /**
     * Format the DateTime.
     * The custom formats can also be called here.
     * @param string $format
     * @return string
     */
    public function format($format)
    {
        /* If it's not a custom format, i.e. 'short', pass up to parent */
        if (!array_key_exists($format, $this->formats)) {
            return parent::format($format);
        }

        return parent::format($this->formats[$format]);
    }


}

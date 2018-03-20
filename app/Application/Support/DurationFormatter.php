<?php

namespace LaravelDDD\Application\Support;

class DurationFormatter
{
    /**
     * The seconds.
     *
     * @var int
     */
    protected $seconds = 0;

    /**
     * Construct the class with seconds.
     *
     * @param int $seconds
     */
    public function __construct($seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * Convert seconds to a human readable duration.
     *
     * @return mixed
     */
    public function toHumanReadable()
    {
        //
    }
}
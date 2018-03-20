<?php

use LaravelDDD\Application\Support\DurationFormatter;

if (! function_exists('format_duration')) {
    /**
     * Convert seconds to a human readable duration.
     *
     * @param string $seconds
     * @return mixed
     */
    function format_duration(string $seconds)
    {
        return (new DurationFormatter($seconds))->toHumanReadable();
    }
}
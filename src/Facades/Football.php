<?php

namespace FootballData\Facades;

use Illuminate\Support\Facades\Facade;

class Football extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'football';
    }
}
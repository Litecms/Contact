<?php

namespace Litecms\Contact\Facades;

use Illuminate\Support\Facades\Facade;

class Contact extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'contact';
    }
}

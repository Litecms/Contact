<?php

namespace Litecms\Contact\Forms;

use Litepie\Form\FormInterpreter;

class Contact extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = config('litecms.contact.contact.urls');

        self::$search = config('litecms.contact.contact.search');

        self::$orderBy = config('litecms.contact.contact.order');

        self::$groups =  config('litecms.contact.contact.groups');

        self::$list =  config('litecms.contact.contact.list');

        self::$fields = config('litecms.contact.contact.form');

        return new static();
    }
}

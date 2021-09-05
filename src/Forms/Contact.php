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

        self::$urls = [
            'new' => [
                'url' => guard_url('contact/contact/new'),
                'method' => 'GET',
            ],
            'create' => [
                'url' => guard_url('contact/contact/create'),
                'method' => 'GET',
            ],
            'store' => [
                'url' => guard_url('contact/contact'),
                'method' => 'POST',
            ],
            'update' => [
                'url' => guard_url('contact/contact'),
                'method' => 'PUT',
            ],
            'list' => [
                'url' => guard_url('contact/contact'),
                'method' => 'GET',
            ],
            'delete' => [
                'url' => guard_url('contact/contact'),
                'method' => 'DELETE',
            ],
        ];
        self::$search = [
            'name' => [
                "type" => 'text',
                "label" => trans('contact::contact.label.name'),
                "placeholder" => trans('contact::contact.placeholder.name'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "4",
                "roles" => [],
            ]
        ];
        self::$groups = [
            'main' => trans('contact::contact.groups.main'),
            'details' => trans('contact::contact.groups.details'),
            'images' => trans('contact::contact.groups.images'),
            'settings' => trans('contact::contact.groups.settings'),
        ];
        self::$list = [
            [
                'key' => "ref",
                'label' => trans('contact::contact.label.ref'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "id",
                'label' => trans('contact::contact.label.id'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "name",
                'label' => trans('contact::contact.label.name'),
                'sortable' => 'true',
                'roles' => [],
            ],
            [
                'key' => "status",
                'label' => trans('contact::contact.label.status'),
                'sortable' => 'true',
                'roles' => [],
            ],
        ];
        self::$fields = [
                'name' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.name'),
                "placeholder" => trans('contact::contact.placeholder.name'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'phone' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.phone'),
                "placeholder" => trans('contact::contact.placeholder.phone'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'mobile' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.mobile'),
                "placeholder" => trans('contact::contact.placeholder.mobile'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'email' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.email'),
                "placeholder" => trans('contact::contact.placeholder.email'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'default' => [
                "element" => 'numeric',
                "type" => 'numeric',
                "label" => trans('contact::contact.label.default'),
                "placeholder" => trans('contact::contact.placeholder.default'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'website' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.website'),
                "placeholder" => trans('contact::contact.placeholder.website'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'details' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.details'),
                "placeholder" => trans('contact::contact.placeholder.details'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'address' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.address'),
                "placeholder" => trans('contact::contact.placeholder.address'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'street' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.street'),
                "placeholder" => trans('contact::contact.placeholder.street'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'city' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.city'),
                "placeholder" => trans('contact::contact.placeholder.city'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'state' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.state'),
                "placeholder" => trans('contact::contact.placeholder.state'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'country' => [
                "element" => 'text',
                "type" => 'text',
                "label" => trans('contact::contact.label.country'),
                "placeholder" => trans('contact::contact.placeholder.country'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'zip' => [
                "element" => 'numeric',
                "type" => 'numeric',
                "label" => trans('contact::contact.label.zip'),
                "placeholder" => trans('contact::contact.placeholder.zip'),
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "6",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            'location' => [
                "element" => 'map',
                "type" => 'text',
                "label" => trans('contact::contact.label.lat'),
                "placeholder" => trans('contact::contact.placeholder.lat'),
                'coordinates' => function($field){
                    $field->latitude = $field->getValue('lat');
                    $field->longitude = $field->getValue('lng');
                    $field->latField = 'lat';
                    $field->lngField = 'lng';
                },
                "rules" => '',
                "group" => "main",
                "section" => "first",
                "col" => "12",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ]
        ];

        return new static();
    }
}

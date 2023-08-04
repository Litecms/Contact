<?php


return  
    [
        'model' => [
            'model' => \Litecms\Contact\Models\Contact::class,
            'table' => 'litecms_contact_contacts',
            'hidden'=> [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'created_at', 'updated_at'],
            'appends' => [],
            'fillable' => ['name',  'phone',  'mobile',  'email',  'default',  'website',  'details',  'address',  'street',  'city',  'state',  'country',  'zip',  'lat',  'lng',  'status',  'user_id',  'user_type'],
            'translatables' => [],
            'upload_folder' => 'contact/contact',
            'uploads' => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts' => [
            
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision' => [],
            'perPage' => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'search' => [
            
        ],

        'list' => [
            [
                "key" => "name", 
                "type" => "text", 
                "label" => 'contact::contact.label.name', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "phone", 
                "type" => "text", 
                "label" => 'contact::contact.label.phone', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "mobile", 
                "type" => "text", 
                "label" => 'contact::contact.label.mobile', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "email", 
                "type" => "text", 
                "label" => 'contact::contact.label.email', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "default", 
                "type" => "text", 
                "label" => 'contact::contact.label.default', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "website", 
                "type" => "text", 
                "label" => 'contact::contact.label.website', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "details", 
                "type" => "text", 
                "label" => 'contact::contact.label.details', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "address", 
                "type" => "text", 
                "label" => 'contact::contact.label.address', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "street", 
                "type" => "text", 
                "label" => 'contact::contact.label.street', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "city", 
                "type" => "text", 
                "label" => 'contact::contact.label.city', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "state", 
                "type" => "text", 
                "label" => 'contact::contact.label.state', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "country", 
                "type" => "text", 
                "label" => 'contact::contact.label.country', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "zip", 
                "type" => "text", 
                "label" => 'contact::contact.label.zip', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "lat", 
                "type" => "text", 
                "label" => 'contact::contact.label.lat', 
                'sort' => true,
                'roles' => [],
            ],
            [
                "key" => "lng", 
                "type" => "text", 
                "label" => 'contact::contact.label.lng', 
                'sort' => true,
                'roles' => [],
            ],
        ],

        'form' => [
            [
                "key" => 'name',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.name',
                "placeholder" => 'contact::contact.placeholder.name',
                "rules" => '',
                "group" => "main.main",
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
            ],
            [
                "key" => 'phone',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.phone',
                "placeholder" => 'contact::contact.placeholder.phone',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'mobile',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.mobile',
                "placeholder" => 'contact::contact.placeholder.mobile',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'email',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.email',
                "placeholder" => 'contact::contact.placeholder.email',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'default',
                "element" => 'switch',
                "type" => 'switch',
                "label" => 'contact::contact.label.default',
                "placeholder" => 'contact::contact.placeholder.default',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'website',
                "element" => 'url',
                "type" => 'url',
                "label" => 'contact::contact.label.website',
                "placeholder" => 'contact::contact.placeholder.website',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "8",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'details',
                "element" => 'textarea',
                "type" => 'text',
                "label" => 'contact::contact.label.details',
                "placeholder" => 'contact::contact.placeholder.details',
                "rules" => '',
                "group" => "main.main",
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
            [
                "key" => 'address',
                "element" => 'textarea',
                "type" => 'text',
                "label" => 'contact::contact.label.address',
                "placeholder" => 'contact::contact.placeholder.address',
                "rules" => '',
                "group" => "main.main",
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
            [
                "key" => 'street',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.street',
                "placeholder" => 'contact::contact.placeholder.street',
                "rules" => '',
                "group" => "main.main",
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
            [
                "key" => 'city',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.city',
                "placeholder" => 'contact::contact.placeholder.city',
                "rules" => '',
                "group" => "main.main",
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
            [
                "key" => 'state',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.state',
                "placeholder" => 'contact::contact.placeholder.state',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'country',
                "element" => 'select',
                "type" => 'select',
                "label" => 'contact::contact.label.country',
                "placeholder" => 'contact::contact.placeholder.country',
                "rules" => '',
                "options" => function(){
                    return trans('contact::contact.options.country');
                },
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'zip',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.zip',
                "placeholder" => 'contact::contact.placeholder.zip',
                "rules" => '',
                "group" => "main.main",
                "section" => "first",
                "col" => "4",
                "append" => null,
                "prepend" => null,
                "roles" => [],
                "attributes" => [
                    'wrapper' => [],
                    "label" => [],
                    "element" => [],

                ],
            ],
            [
                "key" => 'lat',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.lat',
                "placeholder" => 'contact::contact.placeholder.lat',
                "rules" => '',
                "group" => "main.main",
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
            [
                "key" => 'lng',
                "element" => 'text',
                "type" => 'text',
                "label" => 'contact::contact.label.lng',
                "placeholder" => 'contact::contact.placeholder.lng',
                "rules" => '',
                "group" => "main.main",
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
        ],

        'urls' => [
            'new' => [
                'url' => 'contact/contact/new',
                'method' => 'GET',
            ],
            'create' => [
                'url' => 'contact/contact/create',
                'method' => 'GET',
            ],
            'store' => [
                'url' => 'contact/contact',
                'method' => 'POST',
            ],
            'update' => [
                'url' => 'contact/contact',
                'method' => 'PUT',
            ],
            'list' => [
                'url' => 'contact/contact',
                'method' => 'GET',
            ],
            'delete' => [
                'url' => 'contact/contact',
                'method' => 'DELETE',
            ],
        ],
        'order' => [
            'created_at' => 'contact::contact.label.created_at',
            'name' => 'contact::contact.label.name',
            'status' => 'contact::contact.label.status',
        ],
        'groups' => [
            [
                'icon' => "mdi:account-supervisor-outline",
                'name' => "block::category.groups.main",
                'group' => "main.main",
                'title' => "block::category.groups.main",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::category.groups.details",
                'group' => "main.documents",
                'title' => "block::category.groups.details",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::category.groups.images",
                'group' => "main.documents",
                'title' => "block::category.groups.images",
            ],
            [
                'icon' => "fe:home",
                'name' => "block::category.groups.settings",
                'group' => "main.documents",
                'title' => "block::category.groups.settings",
            ]
        ],
        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Contact',
            'module' => 'Contact',
        ],

        
        
    ];

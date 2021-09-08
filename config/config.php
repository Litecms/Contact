<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litecms',

    /*
     * Package.
     */
    'package' => 'contact',

    /*
     * Modules.
     */
    'modules' => ['contact'],

    'gmapapi' => env('GMAP_API'),
    
    'contact' => [
        'model' => [
            'model' => 'Litecms\Contact\Models\Contact',
            'table' => 'contacts',
            'hidden' => [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at'],
            'appends' => [],
            'fillable' => ['user_id', 'name', 'phone', 'mobile', 'email', 'default', 'website', 'details', 'address',
                'street', 'city', 'state', 'country', 'zip', 'lat', 'lng', 'status', 'slug'],
            'translate' => [],
            'upload_folder' => 'contact/contact',
            'uploads' => [],
            'casts' => [],
            'revision' => [],
            'perPage' => '20',
            'search' => [
                'name' => 'like',
                'status',
            ],
        ],
    ],
];

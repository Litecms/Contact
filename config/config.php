<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'litecms',

    /*
     * Package.
     */
    'package'   => 'contact',

    /*
     * Modules.
     */
    'modules'   => ['contact'],

    'gmapapi'   => env('GMAP_API'),

    'image'    => [
        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '370',
            'height'    => '420',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'lg' => [
            'width'     => '780',
            'height'    => '497',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '800',
            'height'    => '530',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
    ],

    'contact'       => [
        'model'             => 'Litecms\Contact\Models\Contact',
        'table'             => 'contacts',
        'presenter'         => \Litecms\Contact\Repositories\Presenter\ContactItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'name', 'phone',  'mobile',  'email',  'default',  'website',  'details',  'address',  'street',  'city',  'state',  'country',  'zip',  'lat',  'lng',  'status'],
        'translate'         => [],
        'upload_folder'     => 'contact/contact',
        'uploads'           => [],
        'casts'             => [],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'status',
        ],
    ],
];

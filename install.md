# Installation

The instructions below will help you to properly installand run the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/litecms/contact/`

## Composer

Add the below entries in the `composer.json`.


```json

...
     "repositories": {
        ...

        {
            "type": "path",
            "url": "packages/litecms/contact"
        }

        ...
    },
...

```
Then run `composer require litecms/contact`


## Migration and seeds

```
    php artisan migrate
    php artisan db:seed --class=Litecms\\Contact\\Seeders\\ContactTableSeeder
```

## Publishing

* Configuration
```
    php artisan vendor:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --tag="config"
```
* Language
```
    php artisan vendor:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --tag="lang"
```
* Views
```
    php artisan vendor:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --tag="view"
```

## URLs and APIs

### Web Urls

* Admin
```
    http://path-to-route-folder/admin/contact/{modulename}
```

* User
```
    http://path-to-route-folder/user/contact/{modulename}
```

* Public
```
    http://path-to-route-folder/contacts
```


### API endpoints

These endpoints can be used with or without `/api/`
And also the user can be varied depend on the type of users, eg user, client, admin etc.

#### Resource

* List
```
    http://path-to-route-folder/api/user/contact/{modulename}
    METHOD: GET
```

* Create
```
    http://path-to-route-folder/api/user/contact/{modulename}
    METHOD: POST
```

* Edit
```
    http://path-to-route-folder/api/user/contact/{modulename}/{id}
    METHOD: PUT
```

* Delete
```
    http://path-to-route-folder/api/user/contact/{modulename}/{id}
    METHOD: DELETE
```

#### Public

* List
```
    http://path-to-route-folder/api/contact/{modulename}
    METHOD: GET
```

* Single Item
```
    http://path-to-route-folder/api/contact/{modulename}/{slug}
    METHOD: GET
```

#### Others

* Report
```
    http://path-to-route-folder/api/user/contact/{modulename}/report/{report}
    METHOD: GET
```

* Export/Import
```
    http://path-to-route-folder/api/user/contact/{modulename}/exim/{exim}
    METHOD: POST
```

* Action
```
    http://path-to-route-folder/api/user/contact/{modulename}/action/{id}/{action}
    METHOD: PATCH
```

* Actions
```
    http://path-to-route-folder/api/user/contact/{modulename}/actions/{action}
    METHOD: PATCH
```

* Workflow
```
    http://path-to-route-folder/api/user/contact/{modulename}/workflow/{id}/{transition}
    METHOD: PATCH
```

This is a Laravel 5 package that provides contact management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/contact`.

    "litecms/contact": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\Contact\Providers\ContactServiceProvider::class,

```

And also add it to alias

```php
'Contact'  => Litecms\Contact\Facades\Contact::class,
```

Use the below commands for publishing

Configuration

    php artisan vendor:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --tag="lang"

Views 

    php artisan vendor:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --tag="view"

Publish admin views only if it is necessary.

**Publishing views to theme**

Publishes admin view
    php artisan theme:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --view=="admin" --theme=="admin"

Publishes client view
    php artisan theme:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --view=="default" --theme=="client"

Publishes user view
    php artisan theme:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --view=="default" --theme=="user"

Publishes public view
    php artisan theme:publish --provider="Litecms\Contact\Providers\ContactServiceProvider" --view=="public" --theme=="public"
    
## Usage



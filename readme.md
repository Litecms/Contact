This is a Laravel 5 package that provides contact management facility for lavalite framework.

## Installation

Begin by installing this package through Composer

    composer install litecms/contact

## Publishing

Configuration

    php artisan vendor:publish --provider="Litecms\Contact\ContactServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Contact\ContactServiceProvider" --tag="lang"

### Publishing views 

Publish to resources\vendor directory

    php artisan vendor:publish --provider="Litecms\Contact\ContactServiceProvider" --tag="view"


Publishes admin view to admin theme

    php artisan theme:publish --provider="Litecms\Contact\ContactServiceProvider" --view="admin" --theme="admin"

Publishes public view to public theme

    php artisan theme:publish --provider="Litecms\Contact\ContactServiceProvider" --view="public" --theme="public"
    


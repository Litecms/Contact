<?php

namespace Litecms\Contact\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Sluggable;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Activities\Traits\LogsActivity;
use Litepie\Trans\Traits\Translatable;

class Contact extends Model
{
    use Filer, SoftDeletes, Hashids, Sluggable, Translatable, LogsActivity, PresentableTrait;
    // use Workflow;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.contact.contact';


}

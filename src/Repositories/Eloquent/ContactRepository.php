<?php

namespace Litecms\Contact\Repositories\Eloquent;

use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.contact.contact.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.contact.contact.model');
    }
}

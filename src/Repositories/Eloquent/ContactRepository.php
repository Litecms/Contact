<?php

namespace Litecms\Contact\Repositories\Eloquent;

use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Litepie\Repository\BaseRepository;
use Litecms\Contact\Repositories\Eloquent\Presenters\ContactItemPresenter;


class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('litecms.contact.contact.model.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.contact.contact.model.model');
    }

    /**
     * Returns the default presenter if none is availabale.
     *
     * @return void
     */
    public function presenter()
    {
        return ContactItemPresenter::class;
    }
}

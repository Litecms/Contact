<?php

namespace Litecms\Contact;

use Litecms\Contact\Models\Contact;


class Contact
{
    /**
     * $contact object.
     */
    protected $contact;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->contact = app(Contact::class);
    }

    /**
     * Returns count of contact.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Find contact by slug.
     *
     * @param array $filter
     *
     * @return int
     */
    public function contact($slug)
    {
        return  $this->contact
            ->findBySlug($slug)
            ->toArray();
    }
}

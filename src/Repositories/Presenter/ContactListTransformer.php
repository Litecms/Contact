<?php

namespace Litecms\Contact\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ContactListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Contact\Models\Contact $contact)
    {
        return [
            'id'                => $contact->getRouteKey(),
            'name'              => $contact->name,
            'phone'             => $contact->phone,
            'mobile'            => $contact->mobile,
            'email'             => $contact->email,
            'default'           => $contact->default,
            'website'           => $contact->website,
            'details'           => $contact->details,
            'address'           => $contact->address,
            'street'            => $contact->street,
            'city'              => $contact->city,
            'state'             => $contact->state,
            'country'           => $contact->country,
            'zip'               => $contact->zip,
            'lat'               => $contact->lat,
            'lng'               => $contact->lng,
            'status'            => trans($contact->status),
            'created_at'        => format_date($contact->created_at),
            'updated_at'        => format_date($contact->updated_at),
        ];
    }
}
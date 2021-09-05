<?php

namespace Litecms\Contact\Repositories\Eloquent\Presenters;

use Litepie\Repository\Presenter\Presenter;

class ContactItemPresenter extends Presenter
{

    public function itemLink()
    {
        return guard_url('contact/contact') . '/' . $this->getRouteKey();
    }

    public function title()
    {
        if ($this->title != '') {
            return $this->title;
        }

        if ($this->name != '') {
            return $this->name;
        }

        return 'None';
    }

    public function toArray()
    {
        return [
            'id' => $this->getRouteKey(),
            'title' => $this->title(),
            'name' => $this->name,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'default' => $this->default,
            'website' => $this->website,
            'details' => $this->details,
            'address' => $this->address,
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zip' => $this->zip,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'status' => $this->status,
            'slug' => $this->slug,
            'user_id' => $this->user_id,
            'user_type' => $this->user_type,
            'upload_folder' => $this->upload_folder,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
            ],
        ];
    }
}

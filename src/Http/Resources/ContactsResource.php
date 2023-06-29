<?php

namespace Litecms\Contact\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactsResource extends JsonResource
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

    public function toArray($request)
    {
        return [
            'id' => $this->getRouteKey(),
            'title' => $this->title(),
            'owner' => $this->owner?->name,
            'category' => $this->category?->name,
            'description' => $this->description,
            'image' => [
                'main' => url($this->defaultImage('images', 'xs')),
                'sub' => @$this->client->picture,
            ],
            'status' => $this->status,
            'slug' => $this->slug,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
            ],
        ];
    }

}

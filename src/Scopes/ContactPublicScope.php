<?php

namespace Litecms\Contact\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ContactPublicScope implements Scope
{
    
    public function onlyPublished($duilder)
    {
        return $duilder->where('status', 'Active');
    }

    public function apply(Builder $duilder, Model $model)
    {
        return $this->onlyPublished($duilder);
    }
}
<?php

namespace Litecms\Contact\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Litecms\Contact\Models\Contact;

class ContactPolicy
{


    /**
     * Determine if the given user can view the contact.
     *
     * @param Authenticatable $user
     * @param Contact $contact
     *
     * @return bool
     */
    public function view(Authenticatable $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.view') && $user->isAdmin()) {
            return true;
        }

        return $contact->user_id == user_id() && $contact->user_type == user_type();
    }

    /**
     * Determine if the given user can create a contact.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function create(Authenticatable $user)
    {
        return  $user->canDo('contact.contact.create');
    }

    /**
     * Determine if the given user can update the given contact.
     *
     * @param Authenticatable $user
     * @param Contact $contact
     *
     * @return bool
     */
    public function update(Authenticatable $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.edit') && $user->isAdmin()) {
            return true;
        }

        return $contact->user_id == user_id() && $contact->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given contact.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function destroy(Authenticatable $user, Contact $contact)
    {
        return $contact->user_id == user_id() && $contact->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given contact.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function verify(Authenticatable $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given contact.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function approve(Authenticatable $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}

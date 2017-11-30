<?php

namespace Litecms\Contact\Policies;

use App\User;
use Litecms\Contact\Models\Contact;

class ContactPolicy
{

    /**
     * Determine if the given user can view the contact.
     *
     * @param User $user
     * @param Contact $contact
     *
     * @return bool
     */
    public function view(User $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.view') && $user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine if the given user can create a contact.
     *
     * @param User $user
     * @param Contact $contact
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('contact.contact.create');
    }

    /**
     * Determine if the given user can update the given contact.
     *
     * @param User $user
     * @param Contact $contact
     *
     * @return bool
     */
    public function update(User $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.update') && $user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine if the given user can delete the given contact.
     *
     * @param User $user
     * @param Contact $contact
     *
     * @return bool
     */
    public function destroy(User $user, Contact $contact)
    {
        if ($user->canDo('contact.contact.delete') && $user->isAdmin()) {
            return true;
        }
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

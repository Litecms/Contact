<?php

namespace Litecms\Contact\Policies;

use Litepie\User\Interfaces\UserPolicyInterface;
use Litecms\Contact\Models\Contact;

class ContactPolicy
{


    /**
     * Determine if the given user can view the contact.
     *
     * @param UserPolicyInterface $authUser
     * @param Contact $contact
     *
     * @return bool
     */
    public function view(UserPolicyInterface $authUser, Contact $contact)
    {
        if ($authUser->canDo('contact.contact.view') && $authUser->isAdmin()) {
            return true;
        }

        return $contact->user_id == user_id() && $contact->user_type == user_type();
    }

    /**
     * Determine if the given user can create a contact.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function create(UserPolicyInterface $authUser)
    {
        return  $authUser->canDo('contact.contact.create');
    }

    /**
     * Determine if the given user can update the given contact.
     *
     * @param UserPolicyInterface $authUser
     * @param Contact $contact
     *
     * @return bool
     */
    public function update(UserPolicyInterface $authUser, Contact $contact)
    {
        if ($authUser->canDo('contact.contact.edit') && $authUser->isAdmin()) {
            return true;
        }

        return $contact->user_id == user_id() && $contact->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given contact.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function destroy(UserPolicyInterface $authUser, Contact $contact)
    {
        return $contact->user_id == user_id() && $contact->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given contact.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function verify(UserPolicyInterface $authUser, Contact $contact)
    {
        if ($authUser->canDo('contact.contact.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given contact.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function approve(UserPolicyInterface $authUser, Contact $contact)
    {
        if ($authUser->canDo('contact.contact.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $authUser    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($authUser, $ability)
    {
        if ($authUser->isSuperuser()) {
            return true;
        }
    }
}

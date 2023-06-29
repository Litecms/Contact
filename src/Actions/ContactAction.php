<?php

namespace Litecms\Contact\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Litepie\Actions\Concerns\AsAction;
use Litepie\Actions\Traits\LogsActions;
use Litepie\Notification\Traits\SendNotification;
use Litecms\Contact\Models\Contact;


class ContactAction
{
    use AsAction;
    
    protected $model;
    protected $namespace = 'litecms.contact.contact';
    protected $eventClass = \Litecms\Contact\Events\ContactAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, Contact $contact, array $request = [])
    {
        $this->action = $action;
        $this->request = $request;
        $this->model = $contact;
        $this->function = Str::camel($action);
        $this->executeAction();
        return $this->model;

    }



    public function store(Contact $contact, array $request)
    {
        $attributes = $request;
        $attributes['user_id'] = user_id();
        $attributes['user_type'] = user_type();
        $contact = $contact->create($attributes);
        return $contact;
    }

    public function update(Contact $contact, array $request)
    {
        $attributes = $request;
        $contact->update($attributes);
        return $contact;
    }

    public function destroy(Contact $contact, array $request)
    {
        $contact->delete();
        return $contact;
    }

    public function copy(Contact $contact, array $request)
    {
        $count = $request['count'] ?: 1;

        if ($count == 1) {
            $contact = $contact->replicate();
            $contact->created_at = Carbon::now();
            $contact->save();
            return $contact;
        }

        for ($i = 1; $i <= $count; $i++) {
            $new = $contact->replicate();
            $new->created_at = Carbon::now();
            $new->save();
        }

        return $contact;
    }


}

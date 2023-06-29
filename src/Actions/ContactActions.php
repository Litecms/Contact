<?php

namespace Litecms\Contact\Actions;

use Illuminate\Support\Str;
use Litecms\Contact\Models\Contact;
use Litecms\Contact\Scopes\ContactResourceScope;
use Litepie\Actions\Concerns\AsAction;
use Litepie\Actions\Traits\LogsActions;
use Litepie\Database\RequestScope;

class ContactActions
{
    use AsAction;
    use LogsActions;
        
    protected $model;
    protected $namespace = 'litecms.contact.contact';
    protected $eventClass = \Litecms\Contact\Events\ContactAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, array $request)
    {
        $this->model = app(Contact::class);
        $this->action = $action;
        $this->request = $request;
        $this->function = Str::camel($action);

        $function = Str::camel($action);

        $this->dispatchActionBeforeEvent();
        $data = $this->$function($request);
        $this->dispatchActionAfterEvent();

        $this->logsAction();
        return $data;

    }

    public function paginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $contact = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new ContactResourceScope())
            ->paginate($pageLimit);

        return $contact;
    }

    public function simplePaginate(array $request)
    {
        $pageLimit = isset($request['pageLimit']) ?: config('database.pagination.limit');
        $contact = $this->model
            ->pushScope(new RequestScope())
            ->pushScope(new ContactResourceScope())
            ->simplePaginate($pageLimit);

        return $contact;
    }

    function empty(array $request) {
        return $this->model->forceDelete();
    }

    function restore(array $request) {
        return $this->model->restore();
    }

    public function delete(array $request)
    {
        $ids = $request['ids'];
        $ids = collect($ids)->map(function ($id) {
            return hashids_decode($id);
        });
        return $this->model->whereIn('id', $ids)->delete();
    }
}

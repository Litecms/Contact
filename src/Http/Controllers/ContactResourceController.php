<?php

namespace Litecms\Contact\Http\Controllers;

use Exception;
use Litecms\Contact\Actions\ContactAction;
use Litecms\Contact\Actions\ContactActions;
use Litecms\Contact\Forms\Contact as ContactForm;
use Litecms\Contact\Http\Requests\ContactResourceRequest;
use Litecms\Contact\Http\Resources\ContactResource;
use Litecms\Contact\Http\Resources\ContactsCollection;
use Litecms\Contact\Models\Contact;
use Litepie\Http\Controllers\ResourceController as BaseController;

/**
 * Resource controller class for contact.
 */
class ContactResourceController extends BaseController
{

    /**
     * Initialize contact resource controller.
     *
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->form = ContactForm::only('main')
                ->setAttributes()
                ->toArray();
            $this->modules = $this->modules(config('litecms.contact.modules'), 'contact', guard_url('contact'));
            return $next($request);
        });
    }

    /**
     * Display a list of contact.
     *
     * @return Response
     */
    public function index(ContactResourceRequest $request)
    {
        $request = $request->all();
        $page = ContactActions::run('paginate', $request);

        $data = new ContactsCollection($page);

        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('contact::contact.names'))
            ->view('contact::contact.index')
            ->data(compact('data', 'modules', 'form'))
            ->output();

    }

    /**
     * Display contact.
     *
     * @param Request $request
     * @param Model   $contact
     *
     * @return Response
     */
    public function show(ContactResourceRequest $request, Contact $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new ContactResource($model);
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('contact::contact.name'))
            ->data(compact('data', 'form', 'modules'))
            ->view('contact::contact.show')
            ->output();
    }

    /**
     * Show the form for creating a new contact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ContactResourceRequest $request, Contact $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new ContactResource($model);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('contact::contact.name'))
            ->view('contact::contact.create')
            ->data(compact('data', 'form', 'modules'))
            ->output();

    }

    /**
     * Create new contact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ContactResourceRequest $request, Contact $model)
    {
        try {
            $request = $request->all();
            $model = ContactAction::run('store', $model, $request);
            $data = new ContactResource($model);
            return $this->response->message(trans('messages.success.created', ['Module' => trans('contact::contact.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('contact/contact/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/contact/contact'))
                ->redirect();
        }

    }

    /**
     * Show contact for editing.
     *
     * @param Request $request
     * @param Model   $contact
     *
     * @return Response
     */
    public function edit(ContactResourceRequest $request, Contact $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new ContactResource($model);
        // return view('contact::contact.edit', compact('data', 'form', 'modules'));

        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('contact::contact.name'))
            ->view('contact::contact.edit')
            ->data(compact('data', 'form', 'modules'))
            ->output();

    }

    /**
     * Update the contact.
     *
     * @param Request $request
     * @param Model   $contact
     *
     * @return Response
     */
    public function update(ContactResourceRequest $request, Contact $model)
    {
        try {
            $request = $request->all();
            $model = ContactAction::run('update', $model, $request);
            $data = new ContactResource($model);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('contact::contact.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('contact/contact/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('contact/contact/' . $model->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the contact.
     *
     * @param Model   $contact
     *
     * @return Response
     */
    public function destroy(ContactResourceRequest $request, Contact $model)
    {
        try {

            $request = $request->all();
            $model = ContactAction::run('destroy', $model, $request);
            $data = new ContactResource($model);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('contact::contact.name')]))
                ->code(202)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('contact/contact/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('contact/contact/' . $model->getRouteKey()))
                ->redirect();
        }

    }
}

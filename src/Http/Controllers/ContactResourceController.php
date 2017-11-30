<?php

namespace Litecms\Contact\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Litecms\Contact\Http\Requests\ContactRequest;
use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Litecms\Contact\Models\Contact;

/**
 * Resource controller class for contact.
 */
class ContactResourceController extends BaseController
{

    /**
     * Initialize contact resource controller.
     *
     * @param type ContactRepositoryInterface $contact
     *
     * @return null
     */
    public function __construct(ContactRepositoryInterface $contact)
    {
        parent::__construct();
        $this->repository = $contact;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Contact\Repositories\Criteria\ContactResourceCriteria::class);
    }

    /**
     * Display a list of contact.
     *
     * @return Response
     */
    public function index(ContactRequest $request)
    {

        if ($this->response->typeIs('json')) {
            $pageLimit = $request->input('pageLimit');
            $data      = $this->repository
                ->setPresenter(\Litecms\Contact\Repositories\Presenter\ContactListPresenter::class)
                ->getDataTable($pageLimit);
            return $this->response
                ->data($data)
                ->output();
        }

        $contacts = $this->repository->paginate();
        
        $this->response->theme->asset()->container('footer')->add('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . config('litecms.contact.gmapapi'));

        return $this->response->title(trans('contact::contact.names'))
            ->view('contact::contact.index', true)
            ->data(compact('contacts'))
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
    public function show(ContactRequest $request, Contact $contact)
    {

        if ($contact->exists) {
            $view = 'contact::contact.show';
        } else {
            $view = 'contact::contact.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('contact::contact.name'))
            ->data(compact('contact'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new contact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ContactRequest $request)
    {

        $contact = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('contact::contact.name')) 
            ->view('contact::contact.create', true) 
            ->data(compact('contact'))
            ->output();
    }

    /**
     * Create new contact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ContactRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $contact                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('contact::contact.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('contact/contact/' . $contact->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('contact/contact'))
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
    public function edit(ContactRequest $request, Contact $contact)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('contact::contact.name'))
            ->view('contact::contact.edit', true)
            ->data(compact('contact'))
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
    public function update(ContactRequest $request, Contact $contact)
    {
        try {
            $attributes = $request->all();

            $contact->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('contact::contact.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('contact/contact/' . $contact->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('contact/contact/' . $contact->getRouteKey()))
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
    public function destroy(ContactRequest $request, Contact $contact)
    {
        try {

            $contact->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('contact::contact.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('contact/contact'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('contact/contact/' . $contact->getRouteKey()))
                ->redirect();
        }

    }

}


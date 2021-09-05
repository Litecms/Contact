<?php

namespace Litecms\Contact\Http\Controllers;

use Exception;
use Litecms\Contact\Forms\Contact as ContactForm;
use Litecms\Contact\Http\Requests\ContactRequest;
use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Litecms\Contact\Repositories\Eloquent\Filters\ContactResourceFilter;
use Litecms\Contact\Repositories\Eloquent\Presenters\ContactListPresenter;
use Litepie\Http\Controllers\ResourceController as BaseController;
use Litepie\Repository\Filter\RequestFilter;

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
    public function __construct(ContactRepositoryInterface $contact)
    {
        parent::__construct();
        $this->form = ContactForm::setAttributes()->toArray();
        $this->modules = $this->modules(config('litecms.contact.modules'), 'contact', guard_url('contact'));
        $this->repository = $contact;
    }

    /**
     * Display a list of contact.
     *
     * @return Response
     */
    public function index(ContactRequest $request)
    {

        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $data = $this->repository
            ->pushFilter(RequestFilter::class)
            ->pushFilter(ContactResourceFilter::class)
            ->setPresenter(ContactListPresenter::class)
            ->simplePaginate($pageLimit)
        // ->withQueryString()
            ->toArray();

        extract($data);
        $form = $this->form;
        $modules = $this->modules;
        $this->response->theme
            ->asset()
            ->container('footer')
            ->add('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . config('litecms.contact.gmapapi'));

        return $this->response->setMetaTitle(trans('contact::contact.names'))
            ->view('contact::contact.index')
            ->data(compact('data', 'meta', 'links', 'modules', 'form'))
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
    public function show(ContactRequest $request, ContactRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('contact::contact.name'))
            ->data(compact('data', 'form', 'modules', 'form'))
            ->view('contact::contact.show')
            ->output();
    }

    /**
     * Show the form for creating a new contact.
     *
     * @param Request $request
     *x
     * @return Response
     */
    public function create(ContactRequest $request, ContactRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();
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
    public function store(ContactRequest $request, ContactRepositoryInterface $repository)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['user_type'] = user_type();
            $repository->create($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.created', ['Module' => trans('contact::contact.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('contact/contact/' . $data['id']))
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
    public function edit(ContactRequest $request, ContactRepositoryInterface $repository)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = $repository->toArray();

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
    public function update(ContactRequest $request, ContactRepositoryInterface $repository)
    {
        // dd($repository->model);
        try {
            $attributes = $request->all();
            $repository->update($attributes);
            $data = $repository->toArray();

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('contact::contact.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('contact/contact/' . $data['id']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('contact/contact/' . $repository->getRouteKey()))
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
    public function destroy(ContactRequest $request, ContactRepositoryInterface $repository)
    {
        try {
            $repository->delete();
            $data = $repository->toArray();

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
                ->url(guard_url('contact/contact/' . $data['id']))
                ->redirect();
        }

    }
}

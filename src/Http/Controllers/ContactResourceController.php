<?php

namespace Litecms\Contact\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Contact\Http\Requests\ContactRequest;
use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Litecms\Contact\Models\Contact;

/**
 * Admin web controller class.
 */
class ContactResourceController extends BaseController
{

// use ContactWorkflow;
    /**
     * Initialize contact controller.
     *
     * @param type ContactRepositoryInterface $contact
     *
     * @return type
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

        $this->response->theme->asset()->container('footer')->add('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . config('litecms.contact.gmapapi'));

        return $this->response->title(trans('contact::contact.names'))
            ->view('contact::admin.contact.index')
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
            $view = 'contact::admin.contact.show';
        } else {
            $view = 'contact::admin.contact.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('contact::contact.name'))
            ->data(compact('contact'))
            ->view($view)
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

        Form::populate($contact);

        return response()->view('contact::admin.contact.create', compact('contact'));

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
            $attributes            = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $contact               = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('contact::contact.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/contact/contact/' . $contact->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
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
        Form::populate($contact);
        return response()->view('contact::admin.contact.edit', compact('contact'));
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

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('contact::contact.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/contact/contact/' . $contact->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/contact/contact/' . $contact->getRouteKey()),
            ], 400);

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

            $t = $contact->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('contact::contact.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/contact/contact/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/contact/contact/' . $contact->getRouteKey()),
            ], 400);
        }

    }

}

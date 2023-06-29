<?php

namespace Litecms\Contact\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use App\Http\Requests\PublicRequest;
use Litepie\Database\RequestScope;
use Litecms\Contact\Http\Resources\ContactResource;
use Litecms\Contact\Http\Resources\ContactsCollection;
use Litecms\Contact\Scopes\ContactPublicScope;
use Litecms\Contact\Models\Contact;

class ContactPublicController extends BaseController
{

    /**
     * Show contact's list.
     *
     * @return response
     */
    protected function index(PublicRequest $request)
    {

        $search = $request->search;
        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $page = Contact::pushScope(new RequestScope())
            ->pushScope(new ContactPublicScope())
            ->paginate($pageLimit)
            ->withQueryString();

        $data = new ContactsCollection($page);

        $categories = [];
        $tags = [];
        $recent = [];

        return $this->response->setMetaTitle(trans('contact::contact.names'))
            ->view('contact::public.contact.index')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }

    /**
     * Show contact.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(PublicRequest $request, $slug='default')
    {
        $model = Contact::findBySlug($slug);
        $data = new ContactResource($model);

        $categories = [];
        $tags = [];
        $recent = [];
    
        return $this->response->setMetaTitle($data['title'] . trans('contact::contact.name'))
            ->view('contact::public.contact.show')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }

}

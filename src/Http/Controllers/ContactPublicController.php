<?php

namespace Litecms\Contact\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Illuminate\Http\Request as Request;
use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Mail;
use Hash;

class ContactPublicController extends BaseController
{
    // use ContactWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Contact\Interfaces\ContactRepositoryInterface $contact
     *
     * @return type
     */
    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->repository = $contact;
        parent::__construct();
    }

    /**
     * Show contact's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {

        $this->response->theme->asset()->container('footer')->add('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . config('litecms.contact.gmapapi'));

        $contact = $this->repository
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->first();

        return $this->response->setMetaTitle(trans('contact::contact.names'))
            ->view('contact::public.index')
            ->populate(false)
            ->data(compact('contact'))
            ->output();
    }

    /**
     * Send mail
     *
     * @param string $slug
     *
     * @return response
     */
    public function sendMail(Request $request)
    {
        
        $data = $request->all();
       Mail::send('contact::emails.message', ['data' => $data], function ($message) use ($data) {
           $message->from($data['email']);
           $message->to('swathy@renfos.com')->subject('Contact Enquiry');
       });
           return $this->response->message('Success! Your message send successfully.')
               ->code(204)
               ->status('success')
               ->url(url('/contacts'))
               ->redirect();

    }
    public function show($slug)
    {
        $this->response->theme->asset()->container('footer')->add('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . config('litecms.contact.gmapapi'));

        $contact = $this->repository
            ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
            ->scopeQuery(function ($query) use ($slug){
                return $query->orderBy('id', 'DESC')
                ->where('id',hashids_decode($slug));
            })->first();

        return $this->response->setMetaTitle(trans('contact::contact.names'))
            ->view('contact::public.index')
            ->populate(false)
            ->data(compact('contact'))
            ->output();
    }

}

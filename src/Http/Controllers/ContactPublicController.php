<?php

namespace Litecms\Contact\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Illuminate\Http\Request as Request;
use Litecms\Contact\Interfaces\ContactRepositoryInterface;
use Mail;

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
            ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->first();

        return $this->response->title(trans('contact::contact.names'))
            ->view('contact::public.contact.index')
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
        Mail::send('contact::public.emails.message', compact('data'), function ($message) use ($data) {
            $message->setReplyTo($data['email'], $data['name']);
            $message->to(config('litecms.contact.mail_to_email'), config('litecms.contact.mail_to_name'));
            $message->subject(config('litecms.contact.mail_subject'));
        });

        return response()->json([
            'type'    => 'Success',
            'message' => 'Your message has been send successfully.',
            'code'    => 201,
        ], 201);

    }

}

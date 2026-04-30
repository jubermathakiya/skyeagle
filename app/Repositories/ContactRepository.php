<?php

namespace App\Repositories;

use App\Mail\ContactEnquiryMail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactRepository extends BaseRepository
{
    public function __construct(Enquiry $model)
    {
        parent::__construct($model);
    }

    public function storeContacts($request)
    {
        try {
            $data = [
                'name'            => $request->name,
                'email'           => $request->email,
                'phone'           => $request->phone,
                'message'         => $request->message,
                'source'          => 'contact',
                'ip_address'      => $request->ip(),
            ];
            $contact = $this->model->create($data);
            Mail::to(config('mail.from.address'))
            ->queue(new ContactEnquiryMail($data));
            return $contact;
        } catch (\Exception $e) {
            Log::error('Repository Contact Error: ' . $e->getMessage(), [
                'data' => $request->all()
            ]);
            throw $e;
        }
    }
}
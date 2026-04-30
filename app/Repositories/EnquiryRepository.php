<?php

namespace App\Repositories;

use App\Mail\TourEnquiryMail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnquiryRepository extends BaseRepository
{
    public function __construct(Enquiry $model)
    {
        parent::__construct($model);
    }

    public function storeEnquiry($request)
    {
        try {
            $data = [
                'name'            => $request->name,
                'email'           => $request->email,
                'phone'           => $request->phone,
                'message'         => $request->message,
                'tour_details_id' => $request->tour_details_id,
                'source'          => 'tour-details',
                'ip_address'      => $request->ip(),
            ];
            $enquiry =  $this->model->create($data);
            Mail::to(config('mail.from.address'))
            ->queue(new TourEnquiryMail($data));
            return $enquiry;
        } catch (\Exception $e) {
            Log::error('Repository Enquiry Error: ' . $e->getMessage(), [
                'data' => $request->all()
            ]);
            throw $e;
        }
    }
}
<?php

return [
    'app_name' => env('APP_NAME', 'Skyeagle Trip'),

    'company_email' => env('COMPANY_EMAIL', 'info@skyeagletrip.com'),
    'company_phone' => env('COMPANY_PHONE', '+91 89800 46600'),
    'company_phone_tel' => env('COMPANY_PHONE_TEL', '+918980046600'),
    'company_address' => env('COMPANY_ADDRESS', '401, PV Enclave, Before In The Lane Of ICICI Bank, Sindhu Bhavan Marg, near Bodakdev, Ahmedabad, Gujarat 380059'),

    'currency_symbol' => '₹',
    'backend_url' => env('BACKEND_URL', env('APP_URL')),
    'email_media_url' => env('EMAIL_MEDIA_URL', env('APP_URL')),
    'email_media_disk_path' => env('EMAIL_MEDIA_DISK_PATH', base_path('../skyeagle-admin/storage/app/public')),
];

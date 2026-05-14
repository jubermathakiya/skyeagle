<?php

/**
 * Application role identifiers (users.role_id).
 * Override via .env if your backend uses different IDs.
 */
return [

    'ids' => [
        'admin' => (int) env('ROLE_ID_ADMIN', 1),
        'user'  => (int) env('ROLE_ID_USER', 2),
    ],

    /**
     * Default role assigned during new registrations
     * (OTP verification + social signup).
     */
    'registration_default' => (int) env('ROLE_ID_USER', 2),

    'messages' => [
        'admin_credentials_on_customer_login' => env(
            'ROLE_MSG_ADMIN_ON_CUSTOMER_LOGIN',
            'These are admin credentials. Please log in through the admin panel.'
        ),

        'non_user_role' => env(
            'ROLE_MSG_NON_USER',
            'Your role is not authorized for customer access. Only customers can log in to this portal.'
        ),

        'middleware_blocked' => env(
            'ROLE_MSG_MIDDLEWARE',
            'Your account is not authorized to access this section.'
        ),
    ],
];
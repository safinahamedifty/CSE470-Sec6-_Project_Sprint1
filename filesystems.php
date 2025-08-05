<?php

return [

    'default' => env('FILESYSTEM_DISK', 'local'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        // Add these new disks for profile pictures and resumes
        'profile_pictures' => [
            'driver' => 'local',
            'root' => storage_path('app/public/profile_pictures'),
            'url' => env('APP_URL').'/storage/profile_pictures',
            'visibility' => 'public',
        ],

        'resumes' => [
            'driver' => 'local',
            'root' => storage_path('app/public/resumes'),
            'url' => env('APP_URL').'/storage/resumes',
            'visibility' => 'public',
        ],

    ],

];
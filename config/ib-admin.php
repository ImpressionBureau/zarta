<?php

use App\Models\Translate;

return [
	'translatable_class' => Translate::class,

	'admin' => [
	    'prefix' => 'admin'
    ],

    'breadcrumbs' => [
        'home_name' => '',
        'home_link' => config('app.url')
    ]
];
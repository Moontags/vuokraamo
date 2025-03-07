<?php

protected $routeMiddleware = [
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'block.customer' => \App\Http\Middleware\BlockCustomerMiddleware::class,
];

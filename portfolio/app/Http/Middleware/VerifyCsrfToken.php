<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "admin/check-pwd","admin/update-portfolio-status","admin/update-service-status","admin/update-testimonial-status","admin/update-logo-status","admin/update-skill-status"
    ];
}

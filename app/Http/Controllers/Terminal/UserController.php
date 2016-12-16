<?php

namespace App\Http\Controllers\Terminal;

use App\Http\Controllers\ApiException;
use App\Http\Controllers\Controller;
use App\Services\Register;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Auth;

class UserController extends Controller
{

    use AuthAndRegisterUser;

    /**
     * UserController constructor.
     * @param Register $service
     * @param Guard $guard
     */
    public function __construct(Register $service,Guard $guard)
    {
        $this->register=$service;
        $this->auth=$guard;
    }

    public function desc() {
        var_dump(Auth::check());
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 16:17
 */

namespace App\Http\Controllers\Terminal;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Model\UserModel;
use Illuminate\Contracts\Auth\Guard;

class UserController extends Controller
{

    use UserModel;

    /**
     * UserController constructor.
     * @param Guard $guard
     */
    public function __construct(Guard $guard)
    {
        $this->middleware('auth');
        $this->auth = $guard;
    }

}
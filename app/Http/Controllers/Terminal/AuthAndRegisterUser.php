<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/16
 * Time: 11:32
 */

namespace App\Http\Controllers\Terminal;

use App\Model\UserModel;
use App\Services\Register;
use Validator;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Contracts\Auth\Guard;

trait AuthAndRegisterUser
{

    /**
     * @var Register
     */
    protected $register;

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    public function register(Request $request) {
        $validator = $this->register->validator($request->all());
        if ($validator -> fails()) {
            echo json_encode($validator->errors());
        } else {
            Auth::login($this->register->create($request->all()));
        }
    }

    public function login(Request $request) {
        $this->validator($request->all());
        $credentials = $request->only(['email','password']);
        if (Auth::attempt($credentials)) echo 'login';
    }

    public function validator(array $data) {
        $validator =  Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        if ($validator -> fails()) {
            throw new \Exception();
        }
    }

    public function logout() {

    }
}
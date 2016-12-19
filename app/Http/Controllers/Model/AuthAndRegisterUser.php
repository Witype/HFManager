<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/16
 * Time: 11:32
 */

namespace App\Http\Controllers\Model;

use App\Http\Controllers\BaseContract;
use App\Model\UserModel;
use App\Exceptions\CommonException;
use App\Services\Register;
use Validator;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Auth\SessionGuard;

trait AuthAndRegisterUser
{
    use BaseContract;
    /**
     * @var Register
     */
    protected $register;

    /**
     * The Guard implementation.
     *
     * @var SessionGuard
     */
    protected  $auth;

    public function register(Request $request) {
        $validator = $this->register->validator($request->all());
        $this->checkValidator($validator);
        $this->register->create($request->all());
        return $this->attemptLogin($request);
    }

    public function login(Request $request) {
        $this->validator($request->all());
        $this->isUserExists($request['email']);
        return $this->attemptLogin($request);
    }

    protected function attemptLogin(Request $request) {
        $credentials = $request->only(['email','password']);
        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            $user = UserModel::where('email',$request['email'])->first();
            return $this->success(['user' => $user->toArray()]);
        }
        $this->failure(new CommonException(trans('constant.COMMON_EMAIL_OR_PASSWORD_ERROR')));
    }

    protected function isUserExists($email) {
        $user = UserModel::where('email',$email)->first();
        if (!$user) $this->failure(new CommonException(trans('constant.COMMON_USER_NOT_EXISTS')));
    }

    public function validator(array $data) {
        $validator =  Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        $this->checkValidator($validator);
    }

    public function logout() {
        $this->auth->logout();
        return $this->success();
    }

}
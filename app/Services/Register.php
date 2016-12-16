<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/16
 * Time: 12:24
 */

namespace App\Services;

use Illuminate\Contracts\Auth\Registrar as RegisterContract;
use Validator;
use App\Model\UserModel;

class Register implements RegisterContract
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'nickname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * @param array $data
     * @return UserModel
     */
    public function create(array $data)
    {
        return UserModel::create([
            'name' => $data['nickname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
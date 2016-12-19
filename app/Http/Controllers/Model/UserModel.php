<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 16:18
 */

namespace App\Http\Controllers\Model;


use App\Http\Controllers\BaseContract;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

trait UserModel
{
    use BaseContract;

    /**
     * @var Guard
     */
    protected $auth;

    public function reset(Request $request) {

    }

    public function change(Request $request) {

    }

}
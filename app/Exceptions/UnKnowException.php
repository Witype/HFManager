<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 15:00
 */

namespace App\Exceptions;


class UnKnowException extends APIException
{
    public function __construct()
    {
        parent::__construct(trans('constant.UN_KNOW_ERROR'), -1);
    }

}
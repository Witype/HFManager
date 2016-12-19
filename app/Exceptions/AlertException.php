<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 12:20
 */

namespace App\Exceptions;


class AlertException extends APIException
{
    public function __construct($message)
    {
        parent::__construct($message, 20000);
    }

}
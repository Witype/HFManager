<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 11:40
 */

namespace App\Exceptions;

class APIException extends \Exception
{
    protected $message;

    protected $code;

    /**
     * APIException constructor.
     * @param $message
     * @param $code
     */
    public function __construct($message, $code)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function __toString()
    {
        return json_encode(['message' => $this->message,'code' => $this->code]);
    }

}
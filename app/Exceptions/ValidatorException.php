<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 14:00
 */

namespace App\Exceptions;

use Illuminate\Validation\Validator as SystemValidator;

class ValidatorException extends APIException
{
    /**
     * ValidatorException constructor.
     * @param SystemValidator $validator
     */
    public function __construct($validator)
    {
        $error = $this->getFirstValidatorError($validator);
        parent::__construct($error, 30000);
    }

    /**
     * @param $validator
     * @return string
     */
    protected function getFirstValidatorError($validator) {
        return $validator->messages()->first();
    }

}
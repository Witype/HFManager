<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/16
 * Time: 14:09
 */

namespace App\Services;

use Illuminate\Validation\Validator as SystemValidator;

class Validator extends SystemValidator
{
    public function errors()
    {
        foreach ($this->messages()->keys() as $key) {
            return ['message' => $this->messages()->get($key)[0],"code" => 1];
        }
        return $this->messages();
    }

}
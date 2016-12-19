<?php
/**
 * Created by PhpStorm.
 * User: Typer_work
 * Date: 2016/12/19
 * Time: 11:34
 */

namespace App\Http\Controllers;


use App\Exceptions\UnKnowException;
use App\Exceptions\ValidatorException;
use Validator;

trait BaseContract
{
    /**
     * 请求接口成功
     * @param array|null $data
     * @return json
     */
    protected function success(array $data = null) {
        $result = ['message' => trans('constant.SUCCESS'), 'code' => 0];
        if ($data) {
            $result = array_merge($result,$data);
        }
        return json_encode($result);
    }

    /**
     * 请求接口失败
     * @param \Exception|null $error
     * @throws UnKnowException
     * @throws \Exception
     */
    protected function failure(\Exception $error = null) {
        if ($error) throw $error;
        else throw new UnKnowException();
    }

    /**
     * 检查验证是否通过
     * @param $validator
     * @throws ValidatorException
     */
    protected function checkValidator($validator) {
        if ($validator -> fails()) throw new ValidatorException($validator);
    }
}
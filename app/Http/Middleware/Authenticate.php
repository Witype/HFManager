<?php

namespace App\Http\Middleware;

use App\Exceptions\CommonException;
use Closure;
use Session;
use Auth;

class Authenticate
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws CommonException
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            throw new CommonException(trans('constant.COMMON_UN_LOGIN'));
        }
        return $next($request);
    }
}

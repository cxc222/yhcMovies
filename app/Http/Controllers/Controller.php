<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *  成功
     * @param $msg
     * @param $datas
     */
    public function ResponseSuccess($msg, $datas=[]){
        return $this->ResponseJson(true, $msg, $datas);
    }

    /**
     * 返回错误
     * @param $msg
     * @param $datas
     */
    public function ResponseError($msg, $datas){
        return $this->ResponseJson(true, $msg, $datas);
    }

    /**
     * @param bool $status
     * @param string $msg
     * @param array $datas
     * @return mixed
     */
    protected function ResponseJson($status=true, $msg='', $datas=[]){
        return response()->json([
            'status' => $status,
            'msg' => $msg,
            'data' => $datas
        ]);
    }
}

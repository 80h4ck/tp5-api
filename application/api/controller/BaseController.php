<?php

namespace app\api\controller;

use think\Controller;

class BaseController extends Controller
{

    protected function apiJson($data, $success = true, $errorMsg = "")
    {

        /*
        {
        "success":true or false , "false代表服务器返回数据失败，true代表成功",
        "errorMsg":"成功返回""，在success为false的时候返回对应的失败信息",
        "result":"此处返回为实际的数据，根据返回的数据类型确定result的最终类型"
      }
        */

        //需要返回的数据
        $result = [
            "success" => $success,
            "errorMsg" => $errorMsg,
            "result" => $data

        ];

        return json($result);


    }


}

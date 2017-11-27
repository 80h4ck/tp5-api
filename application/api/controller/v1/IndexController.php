<?php

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use think\Controller;
use think\Db;
use think\Request;

class IndexController extends BaseController
{
    public function login($username, $pwd)
    {

        //1.通过用户名确定用户是否存在
        $member = Db::name("member")->where(['username' => $username])->find();

        //2.如果不存在
        if ($member) {
            //2.1 判断密码是否正确
            if (password_verify($pwd, $member['password_hash'])) {

                //查出当前用户等待付款的订单

                $waitPayCount=Db::name("order")->where(['member_id'=>$member['id'],'status'=>1])->count();
                //成功
//        "id": "用户id",
//       "userName": "用户名",
//       "userIcon": "头像路径",
//       "waitPayCount": 待付款数,
//       "waitReceiveCount": 待收货数,
//       "userLevel": 用户等级（1注册会员2铜牌会员3银牌会员4金牌会员5钻石会员）
                $result = [
                    "id" => $member['id'],
                    "userName" => $member['username'],
                    "userIcon" => "",
                    "waitPayCount" => $waitPayCount,
                    "waitReceiveCount" => 5,
                    "userLevel" => 5
                ];
                return $this->apiJson($result);
            } else {
                return $this->apiJson(null, false, "密码错误");
            }

        } else {
            //3.不存在
            return $this->apiJson(null, false, "用户名不存在");


        }


    }


    public function banner($adKind)
    {

        $result = [
            [
                "id" => 1,
                "type" => 2,
                "adUrl" => "https://www.baidu.com/img/baidu_jgylogo3.gif",
                "webUrl" => "https://www.baidu.com/",
                "adKind" => $adKind
            ]

        ];

        return $this->apiJson($result);
    }

    public function seckill()
    {
        $resust=[
            "total" => 5,
            "rows" => [

                [  "allPrice" => 50,
                    "pointPrice" => 30,
                    "iconUrl" => "https://www.baidu.com/img/baidu_jgylogo3.gif",
                    "timeLeft" => 50,
                    "type" => 1,
                    "productId" => 3]

            ]


        ];

        return $this->apiJson($resust);


    }

    public function getYourFav(){

        $result= [

            "total"=> 2,
            "rows"=>[
                [
                    "price"=>50,
                    "name"=>"商品名称",
                    "iconUrl"=>"商品图片",
                    "productId"=>3
                ]


            ]];


        return $this->apiJson($result);






    }


    public function test(){



       return $this->apiJson(request()->post('id'));


    }
}

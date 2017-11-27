<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use  think\Route;

//Route::any(":ver1/login","api/:ver1.login/index");
Route::any(":ver1/index/login","api/:ver1.index/login");
Route::any(":ver1/index/:v","api/:ver1.index/:v");
//Route::any("v2/login","api/v2.login/index");

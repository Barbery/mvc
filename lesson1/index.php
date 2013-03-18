<?php

# 定义application路径
define('APPPATH', trim(__DIR__,'/'));

# 获得请求地址
$root = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];

$URI = array();

# 获得index.php 后面的地址
$url = trim(str_replace($root, '', $request), '/');

# 如果为空，则是访问根地址
if (empty($url))
{
    # 默认控制器和默认方法
    $class = 'Index';
    $func = 'welcome';
}
else
{
    $URI = explode('/', $url);

    # 如果function为空 则默认访问index
    if (count($URI) < 2)
    {
        $class = ucfirst($URI[0]);
        $func = 'index';
    }
    else
    {
        $class = ucfirst($URI[0]);
        $func = $URI[1];
    }
}

# 把class加载进来
include(APPPATH . '/' . 'application/controllers/' . $class . '.php');

#实例化
$obj = new $class;

call_user_func_array(
    # 调用内部function
    array($obj,$func), 
    # 传递参数
    array_slice($URI, 2)
);

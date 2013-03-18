<?php

class Index
{
    function __construct()
    {
    }

    function welcome()
    {
        $result['title'] = '这里是welcome页面';
        $result['content'] = 'hello world'; 

        load('index', 'view', $result);

    }


    function not_display()
    {
        $result['title'] = '这里是not_display页面';
        $result['content'] = '不要输出'; 
        $result['arr'] = array(0,1,2,3,4,5,6);
        
        # 如果设置不显示，则返回html内容
        $result['do_not_display'] = TRUE;

        $content = load('index', 'view', $result);

        echo $content;
    }



    function test()
    {
        $result['title'] = '这里是not_display页面';
        $result['content'] = '不要输出'; 
        $result['arr'] = array(0,1,2,3,4,5,6);

        $content = load('index_2', 'view', $result);
    }


}


?>
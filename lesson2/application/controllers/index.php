<?php

class Index
{
    function __construct()
    {
    }

    function welcome()
    {
        echo 'I am default controller';
    }

    function test()
    {
        $a = load('index_model');
        $a->set_data('偶尔陶醉');

        $b = load('index_model');
        echo $b->get_data();
        echo '<hr>';
        echo $b->do_something();
    }


}


?>
<?php 

class Index_model
{
    private $data = '123';

    public function get_data()
    {
        return $this->data;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }

    public function do_something()
    {
        $obj1 = load('test', 'library', array('var1'=>'value1'));
        $obj2 = load('test', 'library', array('var1'=>'change to value2'));

        return $obj2->get_var('var1');
    }

}



?>
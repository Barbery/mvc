<?php

class Test
{
    function __construct($data)
    {
        $this->set_var($data);
    }

    public function get_var($name)
    {
        return $this->$name;
    }

    public function set_var($data=array())
    {
        foreach ($data as $key => $value)
        {
            $this->$key = $value;
        }
    }
}



?>
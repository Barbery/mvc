<?php

class Loader
{
    private $_loaded_models = array();
    private $_loaded_librarys = array();
    private static $OBJ;

    # 单例模式，不允许new对象
    private function __construct()
    {

    }


    public static function get_instance()
    {
        if (is_null(self::$OBJ))
        {
            $class = __CLASS__;
            self::$OBJ = new $class;
        }
        
        return self::$OBJ;
    }

    public function model($model, $data=array())
    {
        $model = strtolower($model);

        # 如果已经加载，则返回对象，避免重复加载
        if (isset($this->_loaded_models[$model]))
        {
            return $this->_loaded_models[$model];
        }

        # 否则加载文件
        include ROOT."/application/models/{$model}.php";

        $class = ucfirst($model);
        # 实例化对象
        if (empty($data))
        {
            $instance = new $class;
        }
        else
        {
            $instance = new $class($data);
        }
        # 把对象cache起来
        $this->_loaded_models[$model] = $instance;

        return $instance;
    }


    public function library($library, $data=array())
    {
        $library = strtolower($library);

        # 如果已经加载，则返回对象，避免重复加载
        if (isset($this->_loaded_librarys[$library]))
        {
            return $this->_loaded_librarys[$library];
        }

        # 否则加载文件
        include ROOT."/application/librarys/{$library}.php";

        $class = ucfirst($library);
        # 实例化对象
        if (empty($data))
        {
            $instance = new $class;
        }
        else
        {
            $instance = new $class($data);
        }
        
        # 把对象cache起来
        $this->_loaded_librarys[$library] = $instance;

        return $instance;
    }


    public function view($view, $data=array())
    {
        $view = strtolower($view);

        extract($data);

        ob_start();
        # 否则加载文件
        include ROOT."/application/views/{$view}.html";

        if ( ! empty($data['do_not_display']))
        {
            $content = ob_get_contents();
            @ob_end_clean();
            return $content;
        }

        ob_end_flush();

        return TRUE;
    }


}



?>
<?php
namespace application\core;

class View {
    public $path;
    public $route;
    public $layout = 'default'; // Template
    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }
    public function render($title, $vars = []) {
        extract($vars);
        $path = 'application/views/'.$this->path.'.php';

        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';
        } else {
            View::errorCode(403);
        }
    }

    public static function errorCode($code){
        http_response_code($code);
       echo'404';
        exit;
    }
    public function message($status, $message){
        exit(json_encode(['status' => $status, 'message' => $message]));
    }
    public function dataResult($status, $data){
        exit(json_encode(['status' => $status, 'result' => $data]));
    }
    public function fileMassage($title_file, $size, $status){
        exit(json_encode(['title_file' => $title_file, 'size' => $size, 'status' => $status]));
    }



}
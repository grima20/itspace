<?php
namespace application\controllers;
use application\core\Controller;
class MainController extends Controller {
    public $dataJSON;
    public function __construct($route)
    {
        parent::__construct($route);
        $this->dataJSON = json_decode(file_get_contents('php://input'), true);
    }

    public function indexAction() {
        $vars = [
            'users' => '1'
        ];

        $this->view->render('Главная страница', $vars);
	}

}
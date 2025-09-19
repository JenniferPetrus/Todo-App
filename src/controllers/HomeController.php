<?php

namespace App\controllers;
use App\controllers\BaseController;
use App\models\TodoModel;
use App\components\TodoCard\TodoCard;

class HomeController extends BaseController{
  public function index(){
    $todoModel = new TodoModel();
    $todos = $todoModel->getTodos();

    $CardObject = new TodoCard;
    $card = $CardObject->createCard();

    var_dump($todos);
    $this->view("home", ["message" => "Hello World", "card" => $card]);
  }
}
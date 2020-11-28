<?php

class PagesController {

  public function index(){
    require 'views/index.view.php';
  }

  public function login() {
    require 'views/login.view.php';
  }
}

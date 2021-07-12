<?php

class PagesController {

  public function index(){
    $db = App::get('database');
    $result = $db->selectAll('rfp_main');
    require 'views/index.view.php';
  }

  public function addRFPEntry(){
    $db = App::get('database');

    $question_category = $_REQUEST['question_category'];
    $response = $_REQUEST['response'];
    $question = $_REQUEST['question'];
    $industry = $_REQUEST['industry'];
    $service = $_REQUEST['service'];
    $keywords = $_REQUEST['keywords'];
    $approved_by = $_REQUEST['approved_by'];

    $result = $db->insert('rfp_main',compact('question_category','response','question','industry','service','keywords','approved_by'));

    if ($result) {
      echo json_encode([
         'id' => $result,
         'response' => "success"
      ]);
    } 
  }

  public function login() {
    require 'views/login.view.php';
  }
}

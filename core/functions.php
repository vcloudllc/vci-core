<?php


function show_errors(){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

function dd($data){
  echo '<pre>';
  die(var_dump($data));
  echo '</pre>';
}

function session($name, $value = null) {
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  if ($value != null) {
    $_SESSION[$name] = $value;
  }

  return $_SESSION[$name];
}

function session_forget($name)
{
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  
  unset($_SESSION[$name]);
}

function currentUser(): ?stdClass
{
  return AuthenticationService::getServiceObject()->getCurrentUser();
}

function isAuthenticated(): bool
{
  return AuthenticationService::getServiceObject()->isAuthenticated();
}
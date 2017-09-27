<?php

class UserSession{
    public function __construct()
    {
      if(session_status() == PHP_SESSION_NONE)
        session_start();
    }
    public function destroy()
    {
      session_destroy();
    }
    public function create($userId, $firstName, $lastName, $email)
    {
      $_SESSION["user"] = [
        "UserId" => $userId,
        "FirstName" => $firstName,
        "LastName" => $lastName,
        "Email" => $email
      ];
    }
    public function isAuthenticated()
    {
      if(array_key_exists("user", $_SESSION))
        return(true);
      return(false);
    }
    public function getUserId()
    {
      return($_SESSION["user"]["UserId"]);
    }
    public function getFirstName()
    {
      return($_SESSION["user"]["FirstName"]);
    }
    public function getLastName()
    {
      return($_SESSION["user"]["LastName"]);
    }
    public function getEmail()
    {
      return($_SESSION["user"]["Email"]);
    }
  }

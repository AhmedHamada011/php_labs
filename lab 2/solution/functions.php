<?php

  function remember_var($var)
  {
      if (isset($_POST[$var]) && !empty($_POST[$var])) {
          return $_POST[$var];
      }
  }

  function validate_form()
  {
      $name = isset($_POST["name"]) ? $_POST["name"] : "";
      $email = isset($_POST["email"]) ? $_POST["email"] : "";
      $message = isset($_POST["message"]) ? $_POST["message"] : "";

      if (empty($name) ||empty($email) || empty($message)) {
          return  "All fields are required";
      } elseif (strlen($name) > MAX_NAME_LENGTH) {
          return "Name must be less than less than 100 charchters";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return "Email is not valid";
      } elseif (strlen($message) > MAX_MESSAGE_LENGTH) {
          return "Message must be less than less than 255 charchters";
      } else {
          return "";
      }
  }

  function print_welcome_message()
  {
      return  "<strong>". WELCOME_MESSAGE ."</strong> </br></br>
    <strong>Name: </strong>" .$_POST["name"] . "</br>".
      "<strong>Email: </strong>" .$_POST["email"] . "</br>".
      "<strong>Message: </strong>" .$_POST["message"];
  }

  function store_contact_info()
  {
      $contact_file = fopen(CONTACT_INFO_FILE, "a+");

      $date = date("F j Y g:i a");
      $ip = $_SERVER['REMOTE_ADDR'];
      $email = $_POST["email"];
      $name = $_POST["name"];
      fwrite($contact_file, "$date,$ip,$email,$name" . PHP_EOL);
  }

  function get_visitors()
  {
      $visitors = file(CONTACT_INFO_FILE);
      $array_of_visitors = [];
      foreach ($visitors as $visitor) {
          $array_of_visitors[] = explode(",", $visitor);
      }

      return $array_of_visitors;
  }

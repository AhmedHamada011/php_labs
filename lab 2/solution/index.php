<?php 
require_once("config.php");
require_once("functions.php");

if (!empty($_POST)) {

  $errors = validate_form();
  
  if(empty($errors)){
    echo print_welcome_message();
    store_contact_info();
    exit();
  }
  
}

$parameter = isset($_GET["page"]) ? $_GET["page"] : "contact";
if ($parameter === "contact")
  require_once("views/contact.php");
elseif($parameter == "visitors")
  require_once("views/visitors.php");


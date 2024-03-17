<?php
header('Content-Type: application/json');

$password = "cash cow";

$input = json_decode(stripslashes(file_get_contents("php://input")));
$result = [];

switch ($input->functionname) {
   case 'authenticate':
      if (!isset($input->arguments)) {
         $result['error'] = 'Error in arguments!';
      } else {
         $result['result'] = $input->arguments == $password;
      }
      break;
   
   default:
      $result['error'] = 'Function ' . $input->functionname . ' not found!';
      break;
}

echo json_encode($result);
?>
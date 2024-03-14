<?php
   // $q = intval($_GET['q']);
   $test = '';

   $con = mysqli_connect('localhost','myuser','mypassword');
   if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
      $test = 'failure';
   }
   echo "connection successfull";
   $test = 'test';


   // mysqli_select_db($con,"ajax_demo");
   // $sql="SELECT * FROM user WHERE id = '".$q."'";
   // $result = mysqli_query($con,$sql);


   mysqli_close($con);
?>
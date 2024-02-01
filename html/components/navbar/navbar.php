<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <style>
      <?php include 'navbar.css'; ?>
   </style>
</head>

<header class="nav_container nav_header">
   <nav class="nav">
      <div class="nav_logo">
         <h2>CIS 4250</h2>
      </div>

      <div class="nav_menu" id="nav_menu">
         <? $pagename = basename($_SERVER['PHP_SELF']); ?>
         <ul class="nav_menu_list">
            <li class="nav_menu_item">
               <?php if ($pagename != "index.php") {
                  echo '<a href="../../index.php"
                  class="nav_menu_link"> Home </a>';
               } ?>
            </li>
            <li class="nav_menu_item">
               <a href="../../about_us/about_us.php" class="nav_menu_link">About Us</a>
            </li>
            <li class="nav_menu_item">
               <a href="../../instruction/instruction.php" class="nav_menu_link">Instructions</a>
            </li>
         </ul>
      </div>
   </nav>
</header>
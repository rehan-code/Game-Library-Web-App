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

<header class="nav-container nav-header">
   <nav class="nav">
      <div class="nav-logo">
         <h2>CIS 4250</h2>
      </div>

      <div class="nav-menu" id="nav-menu">
         <? $pagename = basename($_SERVER['PHP_SELF']); ?>
         <ul class="nav-menu-list">
            <li class="nav-menu-item">
               <?php if ($pagename != "index.php") {
                  echo '<a href="../../index.php"
                  class="nav-menu-link"> Home </a>';
               } ?>
            </li>
            <li class="nav-menu-item">
               <a href="../../about_us/about_us.php" class="nav-menu-link">About Us</a>
            </li>
            <li class="nav-menu-item">
               <a href="../../instruction/instruction.php" class="nav-menu-link">Instructions</a>
            </li>
         </ul>
      </div>
   </nav>
</header>
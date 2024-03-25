<?php
/**
 * Shared navigation bar component
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <style>
      <?php require 'navbar.css'; ?>
   </style>
</head>

<header class="nav-container nav-header">
   <nav class="nav">
      <div class="nav-logo">
         <a
            href='../../index.php'
            class="nav-menu-link"
         >
            <h2 >CIS 4250</h2>
         </a> 
      </div>

      <div class="nav-menu" id="nav-menu">
         <?php $pagename = basename($_SERVER['PHP_SELF']); ?>
         <ul class="nav-menu-list">
            <li class="nav-menu-item">
               <a
                  href="../../about_us/about_us.php"
                  class="nav-menu-link"
               >
                  About Us
               </a>
            </li>
            <!--  Testing Purposes -->
            <!-- <li class="nav-menu-item">
               <a
                  href="../../cryptogram/congrats/congrats_page.php"
                  class="nav-menu-link"
               >
                  Congrats Page
               </a>
            </li>
            <li class="nav-menu-item">
               <a
                  href="../../word_puzzle/secret_page/secret_page.php"
                  class="nav-menu-link"
               >
               secret page
               </a>
            </li> -->
            <!-- <li class="nav-menu-item">
               <a
                  href="../../cryptogram/game/cryptogram.php"
                  class="nav-menu-link"
               >
               cryptogram page
               </a>
            </li> -->
             <!--  Testing Purposes -->
         </ul>
      </div>
   </nav>
</header>
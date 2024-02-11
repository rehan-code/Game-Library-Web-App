<?php
/**
 * Shared keyboard component
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
      <?php require 'hangman_game.css'; ?>
   </style>
</head>

<div id="keyboard">
   <?php
      $alphabet = range('A', 'Z');
      foreach ($alphabet as $letter) {
         echo '<button class="key">' . $letter . '</button>';
      }
   ?>
</div>
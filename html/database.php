<?php
/**
 * Setup database for local dev
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

  $servername = "db";
  $username = "root";
  $password = "rootpassword";
  $dbname = "teamDB";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  echo "Connection successful";

  // Create database
  $sql = "CREATE DATABASE teamDB";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }

  // sql to create cyber_qquestion table
  $sql = "CREATE TABLE cyber_question (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(255) NOT NULL,
  option_1 VARCHAR(255) NOT NULL,
  option_2 VARCHAR(255) NOT NULL,
  option_3 VARCHAR(255) NOT NULL,
  option_4 VARCHAR(255) NOT NULL,
  answer VARCHAR(255) NOT NULL,
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table cyber_question created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  // Insert data into table
  $questions_1 = [
    [
      "question"=> "What does HTML stand for?",
      "options"=> ["Hyper Text Markup Language", "Hyperlinks and Text Markup Language", "Home Tool Markup Language", "Hyperlink and Text Markup Language"],
      "correct_answer"=> "Hyper Text Markup Language"
    ],
    [
      "question"=> "Which of the following is not a programming language?",
      "options"=> ["Java", "Python", "HTML", "C++"],
      "correct_answer"=> "HTML"
    ],
    [
      "question"=> "What does CSS stand for?",
      "options"=> ["Cascading Style Sheets", "Creative Style Sheets", "Computer Style Sheets", "Colorful Style Sheets"],
      "correct_answer"=> "Cascading Style Sheets"
    ],
    [
      "question"=> "Which of the following is a front-end framework for building user interfaces?",
      "options"=> ["Node.js", "React", "Express", "Django"],
      "correct_answer"=> "React"
    ],
    [
      "question"=> "Which of the following is an example of a relational database management system?",
      "options"=> ["MongoDB", "MySQL", "Redis", "SQLite"],
      "correct_answer"=> "MySQL"
    ],
    [
      "question"=> "What does CPU stand for?",
      "options"=> ["Central Processing Unit", "Computer Processing Unit", "Control Processing Unit", "Core Processing Unit"],
      "correct_answer"=> "Central Processing Unit"
    ],
    [
      "question"=> "Which programming language is known as the 'father' of all programming languages?",
      "options"=> ["C", "Python", "Fortran", "Java"],
      "correct_answer"=> "C"
    ],
    [
      "question"=> "What is the capital of Silicon Valley?",
      "options"=> ["San Francisco", "San Jose", "Santa Clara", "Palo Alto"],
      "correct_answer"=> "San Jose"
    ],
    [
      "question"=> "What does SQL stand for?",
      "options"=> ["Structured Query Language", "Sequential Query Language", "Structured Question Language", "Sequential Question Language"],
      "correct_answer"=> "Structured Query Language"
    ],
    [
      "question"=> "Which company developed the Python programming language?",
      "options"=> ["Microsoft", "Google", "Apple", "Facebook"],
      "correct_answer"=> "Google"
    ],
    [
      "question"=> "What is the main purpose of JavaScript?",
      "options"=> ["Styling web pages", "Creating dynamic content", "Database management", "Server-side scripting"],
      "correct_answer"=> "Creating dynamic content"
    ],
    [
      "question"=> "What is the name of the algorithm used to sort elements in ascending or descending order?",
      "options"=> ["Insertion Sort", "Merge Sort", "Quick Sort", "All of the other"],
      "correct_answer"=> "All of the other"
    ],
    [
      "question"=> "Which protocol is used for secure communication over a computer network?",
      "options"=> ["HTTP", "FTP", "SSH", "SMTP"],
      "correct_answer"=> "SSH"
    ],
    [
      "question"=> "Which data structure uses a Last-In-First-Out (LIFO) approach?",
      "options"=> ["Queue", "Stack", "Tree", "Linked List"],
      "correct_answer"=> "Stack"
    ],
    [
      "question"=> "What does URL stand for?",
      "options"=> ["Uniform Resource Locator", "Universal Record Locator", "Uniform Resource Link", "Universal Resource Link"],
      "correct_answer"=> "Uniform Resource Locator"
    ],
    [
      "question"=> "What is the primary function of a firewall?",
      "options"=> ["Protecting against viruses", "Filtering network traffic", "Encrypting data", "Managing user authentication"],
      "correct_answer"=> "Filtering network traffic"
    ],
    [
      "question"=> "Which of the following is not a type of network topology?",
      "options"=> ["Star", "Ring", "Cube", "Mesh"],
      "correct_answer"=> "Cube"
    ],
    [
      "question"=> "What is the maximum value that can be represented with a single byte?",
      "options"=> ["255", "256", "127", "-128"],
      "correct_answer"=> "255"
    ],
    [
      "question"=> "What is the primary function of an operating system?",
      "options"=> ["Managing hardware resources", "Executing application software", "Handling user input", "Providing internet connectivity"],
      "correct_answer"=> "Managing hardware resources"
    ],
    [
      "question"=> "Which of the following is not a programming paradigm?",
      "options"=> ["Object-Oriented Programming", "Procedural Programming", "Functional Programming", "Logical Programming"],
      "correct_answer"=> "Logical Programming"
    ]
  ];
  foreach ($questions_1 as $item) {
    $sql = "INSERT INTO cyber_question (
      question,
      option_1,
      option_2,
      option_3,
      option_4,
      answer
    )
    VALUES (
    {$item["question"]},
    {$item["options"][0]}, 
    {$item["options"][1]}, 
    {$item["options"][2]}, 
    {$item["options"][3]},
    {$item["correct_answer"]}, 
    );";
    
    $result = mysqli_query($conn, $sql);
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }


  // Select all from cyber questions table
  $sql = "SELECT * FROM cyber_question";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - Question: " . $row["question"]. " " . "<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);

?>
<?php
/**
 * Setup database for local dev
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

require 'database_cred.php';

// Create connection
// $conn = mysqli_connect($servername, $username, $password);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// echo "Connection successful\n";

// // Create database
// $sql = "CREATE DATABASE teamDB";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully\n";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// mysqli_close($conn);


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Drop table
$sql = "DROP TABLE cyber_question;";
if (mysqli_query($conn, $sql)) {
    echo "Table cyber_question dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error;
}

// sql to create cyber_question table
$sql = "CREATE TABLE cyber_question (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
stage_num INT(1) UNSIGNED,
question VARCHAR(255) NOT NULL,
option_1 VARCHAR(255) NOT NULL,
option_2 VARCHAR(255) NOT NULL,
option_3 VARCHAR(255) NOT NULL,
option_4 VARCHAR(255) NOT NULL,
answer VARCHAR(255) NOT NULL
);";

if (mysqli_query($conn, $sql)) {
    echo "Table cyber_question created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

//Delete all data
// sql to delete a record
$sql = "DELETE FROM cyber_question";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully\n";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Insert data into table
$questions_1 = [
    [
        "question" => "What does HTML stand for?",
        "options" => [
            "Hyper Text Markup Language",
            "Hyperlinks and Text Markup Language",
            "Home Tool Markup Language",
            "Hyperlink and Text Markup Language"
        ],
        "correct_answer" => "Hyper Text Markup Language"
    ],
    [
        "question" => "Which of the following is not a programming language?",
        "options" => ["Java", "Python", "HTML", "C++"],
        "correct_answer" => "HTML"
    ],
    [
        "question" => "What does CSS stand for?",
        "options" => [
            "Cascading Style Sheets",
            "Creative Style Sheets",
            "Computer Style Sheets",
            "Colorful Style Sheets"
        ],
        "correct_answer" => "Cascading Style Sheets"
    ],
    [
        "question" => "Which of the following is a front-end framework 
    for building user interfaces?",
        "options" => ["Node.js", "React", "Express", "Django"],
        "correct_answer" => "React"
    ],
    [
        "question" => "Which of the following is an example of a 
    relational database management system?",
        "options" => ["MongoDB", "MySQL", "Redis", "SQLite"],
        "correct_answer" => "MySQL"
    ],
    [
        "question" => "What does CPU stand for?",
        "options" => [
            "Central Processing Unit",
            "Computer Processing Unit",
            "Control Processing Unit",
            "Core Processing Unit"
        ],
        "correct_answer" => "Central Processing Unit"
    ],
    [
        "question" => "Which programming language is known as 
    the \'father\' of all programming languages?",
        "options" => ["C", "Python", "Fortran", "Java"],
        "correct_answer" => "C"
    ],
    [
        "question" => "What is the capital of Silicon Valley?",
        "options" => ["San Francisco", "San Jose", "Santa Clara", "Palo Alto"],
        "correct_answer" => "San Jose"
    ],
    [
        "question" => "What does SQL stand for?",
        "options" => [
            "Structured Query Language",
            "Sequential Query Language",
            "Structured Question Language",
            "Sequential Question Language"
        ],
        "correct_answer" => "Structured Query Language"
    ],
    [
        "question" => "Which company developed the Python programming language?",
        "options" => ["Microsoft", "Google", "Apple", "Facebook"],
        "correct_answer" => "Google"
    ],
    [
        "question" => "What is the main purpose of JavaScript?",
        "options" => [
            "Styling web pages",
            "Creating dynamic content",
            "Database management",
            "Server-side scripting"
        ],
        "correct_answer" => "Creating dynamic content"
    ],
    [
        "question" => "What is the name of the algorithm used to 
    sort elements in ascending or descending order?",
        "options" => [
            "Insertion Sort",
            "Merge Sort",
            "Quick Sort",
            "All of the other"
        ],
        "correct_answer" => "All of the other"
    ],
    [
        "question" => "Which protocol is used for secure communication 
    over a computer network?",
        "options" => ["HTTP", "FTP", "SSH", "SMTP"],
        "correct_answer" => "SSH"
    ],
    [
        "question" => "Which data structure uses a Last-In-First-Out (LIFO) 
        approach?",
        "options" => ["Queue", "Stack", "Tree", "Linked List"],
        "correct_answer" => "Stack"
    ],
    [
        "question" => "What does URL stand for?",
        "options" => [
            "Uniform Resource Locator",
            "Universal Record Locator",
            "Uniform Resource Link",
            "Universal Resource Link"
        ],
        "correct_answer" => "Uniform Resource Locator"
    ],
    [
        "question" => "What is the primary function of a firewall?",
        "options" => [
            "Protecting against viruses",
            "Filtering network traffic",
            "Encrypting data",
            "Managing user authentication"
        ],
        "correct_answer" => "Filtering network traffic"
    ],
    [
        "question" => "Which of the following is not a type of network topology?",
        "options" => ["Star", "Ring", "Cube", "Mesh"],
        "correct_answer" => "Cube"
    ],
    [
        "question" => "What is the maximum value that can be represented 
    with a single byte?",
        "options" => ["255", "256", "127", "-128"],
        "correct_answer" => "255"
    ],
    [
        "question" => "What is the primary function of an operating system?",
        "options" => [
            "Managing hardware resources",
            "Executing application software",
            "Handling user input",
            "Providing internet connectivity"
        ],
        "correct_answer" => "Managing hardware resources"
    ],
    [
        "question" => "Which of the following is not a programming paradigm?",
        "options" => [
            "Object-Oriented Programming",
            "Procedural Programming",
            "Functional Programming",
            "Logical Programming"
        ],
        "correct_answer" => "Logical Programming"
    ]
];
$questions_2 = [
    [
        "question" => "Which popular video game franchise
      features a protagonist named \'Mario\'?",
        "options" => [
            "The Legend of Zelda",
            "Final Fantasy",
            "Super Mario",
            "Pokemon"
        ],
        "correct_answer" => "Super Mario"
    ],
    [
        "question" => "In the game \'The Legend of Zelda: Breath of the Wild\',
      what is the name of the protagonist?",
        "options" => ["Link", "Zelda", "Ganondorf", "Sheik"],
        "correct_answer" => "Link"
    ],
    [
        "question" => "Which of the following is a popular battle
      royale game developed by Epic Games?",
        "options" => [
            "Fortnite",
            "Apex Legends",
            "PUBG",
            "Call of Duty: Warzone"
        ],
        "correct_answer" => "Fortnite"
    ],
    [
        "question" => "What is the main objective in the game
      \'Minecraft\'?",
        "options" => [
            "Survive",
            "Defeat the Ender Dragon",
            "Build structures",
            "Explore"
        ],
        "correct_answer" => "Survive"
    ],
    [
        "question" => "Which popular video game series features
      a character named \'Master Chief\'?",
        "options" => [
            "Halo",
            "Call of Duty",
            "Gears of War",
            "Destiny"
        ],
        "correct_answer" => "Halo"
    ],
    [
        "question" => "Which gaming console is known for franchises
      like \'God of War\' and \'Uncharted\'?",
        "options" => [
            "PlayStation",
            "Xbox",
            "Nintendo Switch",
            "PC"
        ],
        "correct_answer" => "PlayStation"
    ],
    [
        "question" => "What is the best-selling video game of all
      time as of 2022?",
        "options" => [
            "Minecraft",
            "Tetris",
            "Grand Theft Auto V",
            "Wii Sports"
        ],
        "correct_answer" => "Minecraft"
    ],
    [
        "question" => "In the game \'The Witcher 3: Wild Hunt\',
      what is the name of the main character?",
        "options" => [
            "Geralt",
            "Ciri",
            "Yennefer",
            "Triss"
        ],
        "correct_answer" => "Geralt"
    ],
    [
        "question" => "Which company developed the game \'Overwatch\'?",
        "options" => [
            "Blizzard Entertainment",
            "Electronic Arts",
            "Valve Corporation",
            "Ubisoft"
        ],
        "correct_answer" => "Blizzard Entertainment"
    ],
    [
        "question" => "What genre of game is \'League of Legends\'?",
        "options" => [
            "MOBA (Multiplayer Online Battle Arena)",
            "MMORPG (Massively Multiplayer Online Role-Playing Game)",
            "FPS (First-Person Shooter)",
            "RPG (Role-Playing Game)"
        ],
        "correct_answer" => "MOBA (Multiplayer Online Battle Arena)"
    ],
    [
        "question" => "Which gaming franchise features a
      post-apocalyptic setting and includes titles like \'Fallout 4\'?",
        "options" => [
            "Elder Scrolls",
            "Doom",
            "BioShock",
            "Fallout"
        ],
        "correct_answer" => "Fallout"
    ],
    [
        "question" => "What is the name of the main character
      in the \'Assassin\'s Creed\' series?",
        "options" => [
            "Ezio Auditore",
            "Altair Ibn-La\'Ahad",
            "Connor Kenway",
            "Desmond Miles"
        ],
        "correct_answer" => "Altair Ibn-La\'Ahad"
    ],
    [
        "question" => "Which game features a battle between
      terrorists and counter-terrorists and includes maps
      like \'Dust II\' and \'Mirage\'?",
        "options" => [
            "Call of Duty",
            "Counter-Strike: Global Offensive",
            "Rainbow Six Siege",
            "Valorant"
        ],
        "correct_answer" => "Counter-Strike: Global Offensive"
    ],
    [
        "question" => "What is the main mechanic in the game
      \'Among Us\'?",
        "options" => [
            "Solving puzzles",
            "Building structures",
            "Survival",
            "Identifying impostors"
        ],
        "correct_answer" => "Identifying impostors"
    ],
    [
        "question" => "Which game features a battle between two
      teams of five players each, with the objective of destroying
      the opposing team\'s base?",
        "options" => [
            "Dota 2",
            "Rocket League",
            "Team Fortress 2",
            "Starcraft II"
        ],
        "correct_answer" => "Dota 2"
    ],
    [
        "question" => "In the game \'Pokémon\', what is the name of
      the main character that players control?",
        "options" => [
            "Pikachu",
            "Ash Ketchum",
            "Red",
            "Charmander"
        ],
        "correct_answer" => "Red"
    ],
    [
        "question" => "Which game franchise is known for its
      open-world crime action games, such as \'Grand Theft Auto V\'?",
        "options" => [
            "Watch Dogs",
            "Saints Row",
            "Red Dead Redemption",
            "Grand Theft Auto"
        ],
        "correct_answer" => "Grand Theft Auto"
    ],
    [
        "question" => "What is the primary objective in the game
      \'Dark Souls\'?",
        "options" => [
            "Defeat bosses",
            "Solve puzzles",
            "Explore dungeons",
            "Build structures"
        ],
        "correct_answer" => "Defeat bosses"
    ],
    [
        "question" => "Which game features a blocky, procedurally-generated
      3D world that allows players to explore and create?",
        "options" => [
            "Terraria",
            "Roblox",
            "Stardew Valley",
            "No Man\'s Sky"
        ],
        "correct_answer" => "Minecraft"
    ],
    [
        "question" => "What is the name of the character players
      control in the game \'Half-Life\'?",
        "options" => [
            "Gordon Freeman",
            "Alyx Vance",
            "Barney Calhoun",
            "Adrian Shephard"
        ],
        "correct_answer" => "Gordon Freeman"
    ]
];
$questions_3 = [
    [
        "question" => "Who directed the movie \'Titanic\'?",
        "options" => [
            "Steven Spielberg",
            "James Cameron",
            "Martin Scorsese",
            "Christopher Nolan"
        ],
        "correct_answer" => "James Cameron"
    ],
    [
        "question" => "What is the name of the fictional
      British spy in the movie series created by Ian
      Fleming?",
        "options" => [
            "Jason Bourne",
            "Ethan Hunt",
            "Jack Ryan",
            "James Bond"
        ],
        "correct_answer" => "James Bond"
    ],
    [
        "question" => "Which movie features the song
      \'Hakuna Matata\'?",
        "options" => [
            "Frozen",
            "The Lion King",
            "Aladdin",
            "Beauty and the Beast"
        ],
        "correct_answer" => "The Lion King"
    ],
    [
        "question" => "In which movie does the character
      Harry Potter first appear?",
        "options" => [
            "Harry Potter and the Chamber of Secrets",
            "Harry Potter and the Sorcerer\'s Stone",
            "Harry Potter and the Goblet of Fire",
            "Harry Potter and the Prisoner of Azkaban"
        ],
        "correct_answer" => "Harry Potter and the Sorcerer\'s Stone"
    ],
    [
        "question" => "What is the name of the island in
      \'Jurassic Park\'",
        "options" => [
            "Skull Island",
            "Monster Island",
            "Isla Nublar",
            "Isla Sorna"
        ],
        "correct_answer" => "Isla Nublar"
    ],
    [
        "question" => "Who played the Joker in \'The Dark Knight\'?",
        "options" => [
            "Jack Nicholson",
            "Jared Leto",
            "Heath Ledger",
            "Joaquin Phoenix"
        ],
        "correct_answer" => "Heath Ledger"
    ],
    [
        "question" => "Which movie did Forrest Gump star in?",
        "options" => [
            "Catch Me If You Can",
            "Forrest Gump",
            "Big",
            "The Green Mile"
        ],
        "correct_answer" => "Forrest Gump"
    ],
    [
        "question" => "What is the main character\'s name in
      \'The Matrix\'?",
        "options" => [
            "Morpheus",
            "Neo",
            "Trinity",
            "Agent Smith"
        ],
        "correct_answer" => "Neo"
    ],
    [
        "question" => "In \'Finding Nemo\', what type of fish
      is Nemo?",
        "options" => [
            "Clownfish",
            "Goldfish",
            "Beta Fish",
            "Guppy"
        ],
        "correct_answer" => "Clownfish"
    ],
    [
        "question" => "Who is the famous British secret agent in
      movies?",
        "options" => [
            "Jason Bourne",
            "Ethan Hunt",
            "Jack Ryan",
            "James Bond"
        ],
        "correct_answer" => "James Bond"
    ],
    [
        "question" => "What is Indiana Jones\' profession?",
        "options" => ["Doctor", "Archaeologist", "Lawyer", "Spy"],
        "correct_answer" => "Archaeologist"
    ],
    [
        "question" => "Who directed \'Schindler\'s List\'?",
        "options" => [
            "Quentin Tarantino",
            "Ridley Scott",
            "Steven Spielberg",
            "George Lucas"
        ],
        "correct_answer" => "Steven Spielberg"
    ],
    [
        "question" => "In which movie series is the fictional
      character \'Rocky Balboa\' the main character?",
        "options" => ["Rocky", "Rambo", "Terminator", "Die Hard"],
        "correct_answer" => "Rocky"
    ],
    [
        "question" => "What is the name of the kingdom in \'Frozen\'?",
        "options" => ["Arendelle", "Genovia", "Corona", "Aldovia"],
        "correct_answer" => "Arendelle"
    ],
    [
        "question" => "Who played the main character in the
      1994 film \'Forrest Gump\'?",
        "options" => [
            "Tom Hanks",
            "Brad Pitt",
            "Johnny Depp",
            "Leonardo DiCaprio"
        ],
        "correct_answer" => "Tom Hanks"
    ],
    [
        "question" => "What year was the original
      \'Jurassic Park\' movie released?",
        "options" => ["1990", "1993", "1996", "1999"],
        "correct_answer" => "1993"
    ],
    [
        "question" => "In \'Back to the Future\', what makes time
      travel possible?",
        "options" => [
            "A black hole",
            "A magic spell",
            "A flux capacitor",
            "A quantum leap"
        ],
        "correct_answer" => "A flux capacitor"
    ],
    [
        "question" => "What is the name of the spacecraft in \'Alien\'?",
        "options" => [
            "Nostromo",
            "Enterprise",
            "Millennium Falcon",
            "Serenity"
        ],
        "correct_answer" => "Nostromo"
    ],
    [
        "question" => "Who directed \'Inception\'?",
        "options" => [
            "Steven Spielberg",
            "Christopher Nolan",
            "Ridley Scott",
            "James Cameron"
        ],
        "correct_answer" => "Christopher Nolan"
    ],
    [
        "question" => "What color is the pill that Neo takes in
      \'The Matrix\'?",
        "options" => ["Red", "Blue", "Green", "Yellow"],
        "correct_answer" => "Red"
    ],

];
foreach ($questions_1 as $item) {
    $sql = "INSERT INTO cyber_question (
    question,
    stage_num,
    option_1,
    option_2,
    option_3,
    option_4,
    answer
  )
  VALUES (
  '{$item["question"]}',
  1,
  '{$item["options"][0]}', 
  '{$item["options"][1]}', 
  '{$item["options"][2]}', 
  '{$item["options"][3]}',
  '{$item["correct_answer"]}'
  );";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
foreach ($questions_2 as $item) {
    $sql = "INSERT INTO cyber_question (
    question,
    stage_num,
    option_1,
    option_2,
    option_3,
    option_4,
    answer
  )
  VALUES (
  '{$item["question"]}',
  2,
  '{$item["options"][0]}', 
  '{$item["options"][1]}', 
  '{$item["options"][2]}', 
  '{$item["options"][3]}',
  '{$item["correct_answer"]}'
  );";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
foreach ($questions_3 as $item) {
    $sql = "INSERT INTO cyber_question (
    question,
    stage_num,
    option_1,
    option_2,
    option_3,
    option_4,
    answer
  )
  VALUES (
  '{$item["question"]}',
  3,
  '{$item["options"][0]}', 
  '{$item["options"][1]}', 
  '{$item["options"][2]}', 
  '{$item["options"][3]}',
  '{$item["correct_answer"]}'
  );";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


// Select all from cyber questions table
$sql = "SELECT * FROM cyber_question";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - stage: " . 
        $row["stage_num"] . " - Question: " . $row["question"] . " " . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
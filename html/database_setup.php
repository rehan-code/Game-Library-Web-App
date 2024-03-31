<?php

/**
 * Setup database for local dev
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

require 'database_cred.php';

// // Create connection
// $conn = mysqli_connect($servername, $username, $password);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// echo "Connection successful\n";

// // Create database
// $sql = "CREATE DATABASE teamDB";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully\n";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

// mysqli_close($conn);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//#################### Cyber LeaderBoard Setup ####################
// Drop table cyber_leaderboard
$sql = "DROP TABLE cyber_leaderboard;";
if (mysqli_query($conn, $sql)) {
    echo "Table cyber_leaderboard dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error;
}

// sql to create cyber_leaderboard table
$sql = "CREATE TABLE cyber_leaderboard (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
points INT(4) UNSIGNED NOT NULL
);";

if (mysqli_query($conn, $sql)) {
    echo "Table cyber_leaderboard created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

//Delete all data
$sql = "DELETE FROM cyber_leaderboard;";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully\n";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

//Add dummy data
$sql = "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Joe', 123);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Bob', 234);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Brad', 456);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Hari', 2);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Yes', 1000);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Greg', 23);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('John', 4556);";
$sql .= "INSERT INTO cyber_leaderboard (name, points)
VALUES ('Jason', 9900);";


if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// query to get top 5 elements
$sql = "SELECT * FROM cyber_leaderboard 
ORDER BY points
LIMIT 5;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["points"]. "<br>";
    }
} else {
    echo "0 results";
}

//#################### Cyber Question Setup ####################
// Drop table cyber_question
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
    ],
    [
        "question" => "What does API stand for?",
        "options" => [
            "Application Programming Interface",
            "Application Protocol Interface",
            "Advanced Programming Interface",
            "Automated Programming Interface"
        ],
        "correct_answer" => "Application Programming Interface"
    ],
    [
        "question" => "Which of the following is a NoSQL database?",
        "options" => ["PostgreSQL", "MongoDB", "Oracle", "SQL Server"],
        "correct_answer" => "MongoDB"
    ],
    [
        "question" => "What is the main purpose of the HTTP protocol?",
        "options" => [
            "Data encryption",
            "File transfer",
            "Web browsing",
            "Email exchange"
        ],
        "correct_answer" => "Web browsing"
    ],
    [
        "question" => "Which language is primarily used for styling web pages?",
        "options" => ["JavaScript", "Python", "CSS", "HTML"],
        "correct_answer" => "CSS"
    ],
    [
        "question" => "What is a feature of Object-Oriented Programming?",
        "options" => ["Inheritance", "Recursion", "Pointers", "Threading"],
        "correct_answer" => "Inheritance"
    ],
    [
        "question" => "Which of these is not a valid IP address?",
        "options" => ["192.168.1.1", "255.255.255.255", "256.0.0.0", "127.0.0.1"],
        "correct_answer" => "256.0.0.0"
    ],
    [
        "question" => "What is Git primarily used for?",
        "options" => [
            "Version control",
            "Machine learning",
            "Text editing",
            "Graphic design"
        ],
        "correct_answer" => "Version control"
    ],
    [
        "question" => "Which of the following is a cloud computing platform?",
        "options" => ["GitHub", "WordPress", "Azure", "MySQL"],
        "correct_answer" => "Azure"
    ],
    [
        "question" => "What does LAN stand for?",
        "options" => [
            "Local Area Network",
            "Large Area Network",
            "Long Area Network",
            "Linked Area Network"
        ],
        "correct_answer" => "Local Area Network"
    ],
    [
        "question" => "Which of these is a logic gate?",
        "options" => ["AND", "NOR", "XOR", "All of the other"],
        "correct_answer" => "All of the other"
    ],
    [
        "question" => "What does \'public static void main(String[] args)\' signify in Java?",
        "options" => [
            "A method declaration",
            "A class declaration",
            "A variable declaration",
            "An interface declaration"
        ],
        "correct_answer" => "A method declaration"
    ],
    [
        "question" => "What is the primary use of AJAX in web development?",
        "options" => [
            "Page styling",
            "Asynchronous web requests",
            "Server-side scripting",
            "Data serialization"
        ],
        "correct_answer" => "Asynchronous web requests"
    ],
    [
        "question" => "Which of the following is a statically typed language?",
        "options" => ["Python", "JavaScript", "C++", "Ruby"],
        "correct_answer" => "C++"
    ],
    [
        "question" => "What does SSD stand for in computer hardware?",
        "options" => [
            "Solid State Drive",
            "Static State Drive",
            "Solid State Disk",
            "Secure Storage Device"
        ],
        "correct_answer" => "Solid State Drive"
    ],
    [
        "question" => "What is the main purpose of a compiler?",
        "options" => [
            "To convert high-level language to machine language",
            "To increase the speed of the computer",
            "To manage the computer\'s resources",
            "To protect the computer from viruses"
        ],
        "correct_answer" => "To convert high-level language to machine language"
    ],
    [
        "question" => "Which of these is a key feature of Agile software development?",
        "options" => [
            "Comprehensive documentation",
            "Contract negotiation",
            "Following a plan",
            "Responding to change"
        ],
        "correct_answer" => "Responding to change"
    ],
    [
        "question" => "What is encapsulation in Object-Oriented Programming?",
        "options" => [
            "A class-based inheritance model",
            "The bundling of data with methods that operate on that data",
            "A programming paradigm based on the concept of \'objects\'",
            "A specific type of data structure"
        ],
        "correct_answer" => "The bundling of data with methods that operate on that data"
    ],
    [
        "question" => "Which of the following is an example of a markup language?",
        "options" => ["Python", "HTML", "C++", "Java"],
        "correct_answer" => "HTML"
    ],
    [
        "question" => "Which HTTP status code indicates \'Not Found\'?",
        "options" => ["200", "404", "500", "302"],
        "correct_answer" => "404"
    ],
    [
        "question" => "Which programming paradigm emphasizes functions without side effects?",
        "options" => [
            "Object-Oriented Programming",
            "Procedural Programming",
            "Functional Programming",
            "Imperative Programming"
        ],
        "correct_answer" => "Functional Programming"
    ]
];
$questions_2 = [
    [
        "question" => "What is the name of Nintendo\'s flagship, red Italian plumber?",
        "options" => [
            "Luigi",
            "Toad",
            "Mario",
            "Bowser"
        ],
        "correct_answer" => "Mario"
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
        "question" => "Which gaming franchise features titles like \'Skyrim\'?",
        "options" => [
            "Elder Scrolls",
            "Doom",
            "BioShock",
            "Fallout"
        ],
        "correct_answer" => "Elder Scrolls"
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
        "question" => "Which game franchise spawned popular titles such
      such as \'Vice City\' and \'San Andreas\'?",
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
            "The Sims 4",
            "Stardew Valley",
            "No Man\'s Sky"
        ],
        "correct_answer" => "Terraria"
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
    ],
    [
        "question" => "In the game \'Portal,\' what is the name
        of the AI that guides the player through the test chambers?",
        "options" => [
            "GLaDOS",
            "Chell",
            "ATLAS",
            "Wheatley"
        ],
        "correct_answer" => "GLaDOS"
    ],
    [
        "question" => "Which popular video game franchise features characters
        like \'Solid Snake\' and \'Big Boss\'?",
        "options" => [
            "Metal Gear",
            "Assassin\'s Creed",
            "Dark Souls",
            "Elder Scrolls"
        ],
        "correct_answer" => "Metal Gear"
    ],
    [
        "question" => "In the game \'Bioshock,\' what is the name of the
        underwater city where the game takes place?",
        "options" => [
            "Rapture",
            "Atlantic Express",
            "The Lighthouse",
            "Dionysus Park"
        ],
        "correct_answer" => "Rapture"
    ],
    [
        "question" => "Which video game company is known for creating the
        \'Sonic the Hedgehog\' series?",
        "options" => [
            "Sega",
            "Nintendo",
            "Valve",
            "Bethesda"
        ],
        "correct_answer" => "Sega"
    ],
    [
        "question" => "In the game \'The Last of Us,\' what is the name of the
        fungal infection that has taken over the world?",
        "options" => [
            "Cordyceps",
            "Alien",
            "Carnage",
            "Flood"
        ],
        "correct_answer" => "Cordyceps"
    ],
    [
        "question" => "Which popular video game franchise features a character named
        \'Lara Croft\'?",
        "options" => [
            "Tomb Raider",
            "Hitman",
            "Grand Theft Auto",
            "Metal Gear"
        ],
        "correct_answer" => "Tomb Raider"
    ],
    [
        "question" => "In the game \'Fallout,\' what is the name of the post-apocalyptic
        currency used by survivors?",
        "options" => [
            "Bottle Caps",
            "Souls",
            "Bells",
            "Gold"
        ],
        "correct_answer" => "Bottle Caps"
    ],
    [
        "question" => "Which video game company is known for creating the
        \'Final Fantasy\' series?",
        "options" => [
            "Square Enix",
            "Capcom",
            "Bethesda",
            "Nintendo"
        ],
        "correct_answer" => "Square Enix"
    ],
    [
        "question" => "In the game \'Red Dead Redemption 2,\' what is the name of
        the gang that the main character, Arthur Morgan, is a part of?",
        "options" => [
            "Van der Linde",
            "Del Lobo",
            "Laramie",
            "O\'Driscoll Boys"
        ],
        "correct_answer" => "Van der Linde"
    ],
    [
        "question" => "Which popular video game franchise features a character named
        \'Globox\'?",
        "options" => [
            "Rayman",
            "Crash Bandicoot",
            "Spyro",
            "Ratchet & Clank"
        ],
        "correct_answer" => "Rayman"
    ],
    [
        "question" => "In the game \'The Elder Scrolls V: Skyrim,\' what is the name
        of the dragon that appears at the beginning of the game?",
        "options" => [
            "Alduin",
            "Mirmulnir",
            "Durnehviir",
            "Vulthuryol"
        ],
        "correct_answer" => "Alduin"
    ],
    [
        "question" => "Who developed the first game in the \'Civilization\' series?",
        "options" => [
            "Sid Meier",
            "Hidetaka Miyazaki",
            "Tarn Adams",
            "Will Wright"
        ],
        "correct_answer" => "Sid Meier"
    ],
    [
        "question" => "In the game \'The Witcher 3: Wild Hunt,\' what
        is the name of the kingdom where the game primarily takes place?",
        "options" => [
            "Temeria",
            "Redania",
            "Kerack",
            "Kaedwen"
        ],
        "correct_answer" => "Temeria"
    ],
    [
        "question" => "Which popular video game franchise features a
        protagonist named \'Kratos\'?",
        "options" => [
            "God of War",
            "Borderlands",
            "Elder Scrolls",
            "Mortal Kombat"
        ],
        "correct_answer" => "God of War"
    ],
    [
        "question" => "In the game \'Borderlands,\' what is the name of the planet where
        the game takes place?",
        "options" => [
            "Pandora",
            "Kerwan",
            "Requiem",
            "Tuchanka"
        ],
        "correct_answer" => "Pandora"
    ],
    [
        "question" => "In the game \'Outer Wilds,\' what is the name of the planet where
        the player begins?",
        "options" => [
            "Timber Hearth",
            "Brittle Hollow",
            "Hourglass Twins",
            "The Interloper"
        ],
        "correct_answer" => "Timber Hearth"
    ],
    [
        "question" => "In the game \'Mass Effect,\' what is the name of the ancient
        machine race that threatens the galaxy?",
        "options" => [
            "Reapers",
            "Assaultrons",
            "Reploids",
            "Synthetics"
        ],
        "correct_answer" => "Reapers"
    ],
    [
        "question" => "In the game \'Resident Evil,\' what is the name of the
        pharmaceutical company responsible for the zombie outbreak?",
        "options" => [
            "Umbrella Corporation",
            "Murkoff Corporation",
            "Abstergo Industries",
            "Vale Corporation"
        ],
        "correct_answer" => "Umbrella Corporation"
    ],
    [
        "question" => "Which video game company is known for creating the
        \'Gears of War\' series?",
        "options" => [
            "Epic Games",
            "Bethesda",
            "Blizzard Entertainment",
            "Capcom"
        ],
        "correct_answer" => "Epic Games"
    ],
    [
        "question" => "In the game \'Stardew Valley,\' what is the
        name of the town where the player\'s farm is located?",
        "options" => [
            "Pelican Town",
            "Portia",
            "Stardew Villa",
            "Sandrock"
        ],
        "correct_answer" => "Pelican Town"
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
    [
        "question" => "Which film features a giant great white shark?",
        "options" => [
            "Deep Blue Sea",
            "Jaws",
            "The Meg",
            "Sharknado"
        ],
        "correct_answer" => "Jaws"
    ],
    [
        "question" => "Who starred as the titular character in the 1984 film \'The Terminator\'?",
        "options" => [
            "Sylvester Stallone",
            "Arnold Schwarzenegger",
            "Bruce Willis",
            "Jean-Claude Van Damme"
        ],
        "correct_answer" => "Arnold Schwarzenegger"
    ],
    [
        "question" => "What year was the first \'Star Wars\' film released?",
        "options" => [
            "1975",
            "1977",
            "1979",
            "1981"
        ],
        "correct_answer" => "1977"
    ],
    [
        "question" => "What is the name of the princess in \'The Princess Bride\'?",
        "options" => [
            "Princess Buttercup",
            "Princess Aurora",
            "Princess Daisy",
            "Princess Zelda"
        ],
        "correct_answer" => "Princess Buttercup"
    ],
    [
        "question" => "In \'The Godfather\', who was the head of the Corleone family before Michael?",
        "options" => [
            "Sonny Corleone",
            "Vito Corleone",
            "Fredo Corleone",
            "Tom Hagen"
        ],
        "correct_answer" => "Vito Corleone"
    ],
    [
        "question" => "What fictional city is the setting of \'Batman Begins\'?",
        "options" => [
            "Metropolis",
            "Gotham City",
            "Central City",
            "Star City"
        ],
        "correct_answer" => "Gotham City"
    ],
    [
        "question" => "Who directed \'Pulp Fiction\'?",
        "options" => [
            "Martin Scorsese",
            "Quentin Tarantino",
            "Steven Spielberg",
            "Coen Brothers"
        ],
        "correct_answer" => "Quentin Tarantino"
    ],
    [
        "question" => "What is the main theme of \'Avatar\'?",
        "options" => [
            "Time travel",
            "Virtual reality",
            "Space exploration",
            "Environmental conservation"
        ],
        "correct_answer" => "Environmental conservation"
    ],
    [
        "question" => "Who composed the score for \'Interstellar\'?",
        "options" => [
            "John Williams",
            "Hans Zimmer",
            "Danny Elfman",
            "Howard Shore"
        ],
        "correct_answer" => "Hans Zimmer"
    ],
    [
        "question" => "What is the highest-grossing film of all time?",
        "options" => [
            "Avatar",
            "Titanic",
            "Avengers: Endgame",
            "Star Wars: The Force Awakens"
        ],
        "correct_answer" => "Avatar"
    ],
    [
        "question" => "Which movie is known for the quote, \'Here\'s looking at you, kid\'?",
        "options" => [
            "Casablanca",
            "Gone with the Wind",
            "The Maltese Falcon",
            "Citizen Kane"
        ],
        "correct_answer" => "Casablanca"
    ],
    [
        "question" => "Who plays the lead role in \'Mad Max: Fury Road\'?",
        "options" => [
            "Mel Gibson",
            "Tom Hardy",
            "Christian Bale",
            "Russell Crowe"
        ],
        "correct_answer" => "Tom Hardy"
    ],
    [
        "question" => "In which movie does the character Andy Dufresne appear?",
        "options" => [
            "The Shawshank Redemption",
            "The Green Mile",
            "Forrest Gump",
            "Catch Me If You Can"
        ],
        "correct_answer" => "The Shawshank Redemption"
    ],
    [
        "question" => "What is the name of the virtual reality world in \'Ready Player One\'?",
        "options" => [
            "The Grid",
            "The Oasis",
            "Cyberspace",
            "Metaverse"
        ],
        "correct_answer" => "The Oasis"
    ],
    [
        "question" => "Who played the role of Jack Dawson in \'Titanic\'?",
        "options" => [
            "Leonardo DiCaprio",
            "Matt Damon",
            "Brad Pitt",
            "Johnny Depp"
        ],
        "correct_answer" => "Leonardo DiCaprio"
    ],
    [
        "question" => "In \'The Lord of the Rings\', what is the name of Frodo\'s hometown?",
        "options" => [
            "Rivendell",
            "Rohan",
            "The Shire",
            "Mordor"
        ],
        "correct_answer" => "The Shire"
    ],
    [
        "question" => "Which movie features a fight club as a central element?",
        "options" => [
            "Rocky",
            "Fight Club",
            "Raging Bull",
            "Warrior"
        ],
        "correct_answer" => "Fight Club"
    ],
    [
        "question" => "Who directed \'The Grand Budapest Hotel\'?",
        "options" => [
            "Wes Anderson",
            "Steven Spielberg",
            "Tim Burton",
            "David Fincher"
        ],
        "correct_answer" => "Wes Anderson"
    ],
    [
        "question" => "Who won the Academy Award for Best Actress for her role in \'La La Land\'?",
        "options" => [
            "Emma Stone",
            "Anne Hathaway",
            "Jennifer Lawrence",
            "Natalie Portman"
        ],
        "correct_answer" => "Emma Stone"
    ],
    [
        "question" => "What is the fictional African country featured in \'Black Panther\'?",
        "options" => [
            "Wakanda",
            "Zamunda",
            "Latveria",
            "Genosha"
        ],
        "correct_answer" => "Wakanda"
    ]


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
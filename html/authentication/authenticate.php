<?php

/**
 * Authenticate
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

header('Content-Type: application/json');

$password = "cash cow";
$isAuthenticated = false;

$input = json_decode(stripslashes(file_get_contents("php://input")));
// $v = json_decode(stripslashes($_GET["data"])); // for GET requests
$result = [];

switch ($input->functionname) {
  case 'authenticate':
    $isAuthenticated = authenticate($input, $password);
    $result = $isAuthenticated;
    break;
  case 'auth_check':
    $result['result'] = $isAuthenticated;
    break;
  case 'get_words':
    $result = getHiddenWords();
    break;
  case 'decrypt':
    $result['result'] = decrypt($input->word);
    break;
  case 'decrypt_words':
    $result['result'] = decryptWords($input->words);
    break;
  case 'get_cyber_question':
    $result['result'] = getCyberQuestion($input->index, $input->stageId);
    break;
  default:
    $result['error'] = 'Function ' . $input->functionname . ' not found!';
    break;
}

echo json_encode($result);

/**
 * Authenticates the user-entered password.
 * 
 * @param object $input    Object containing user-inputted password
 * @param string $password The valid password
 * 
 * @return array
 */
function authenticate($input, $password)
{
  $result = [];

  if (!isset($input->arguments)) {
    $result['error'] = 'Error in arguments!';
  } else {
    $result['result'] = $input->arguments == $password;
  }

  return $result;
}

/**
 * Generates and returns the three words to hide throughout
 * the website.
 * 
 * @return array
 */
function getHiddenWords()
{
  $result = [];
  $word_pool = [
    "ceiling", "radio", "protect", "profit", "redeem",
    "sketch", "engine", "treaty", "entitlement", "auction",
    "spend", "knowledge", "trainer", "medieval", "shame",
    "exclude", "embryo", "captivate", "attractive", "sculpture",
    "profession", "quarrel", "tablet", "fault", "right",
    "business", "indoor", "wagon", "environment", "formulate",
    "paradox", "offense", "behavior", "clearance", "feedback",
    "impound", "support", "graphic", "smash", "mobile",
    "applied", "assembly", "source", "sensitive", "dismiss",
    "yearn", "occupy", "sickness", "hardship", "stand"
  ];

  $result['result'] = [];

  for ($i = 0; $i < 3; $i++) {
    while (count($result['result']) < 3) {
      $randIndex = rand(0, count($word_pool) - 1);
      $randWord = strtoupper($word_pool[$randIndex]);

      if (!in_array($randWord, $result['result'])) {
        array_push($result['result'], $randWord);
      }
    }
  }

  //encrypt the words
  for ($i = 0; $i < count($result['result']); $i++) {
    $result['result'][$i] = encrypt($result['result'][$i]);
  }
  return $result;
}

/**
 * Encrypts a given string
 * 
 * @param string $string The string to encrypt
 * 
 * @return string
 */
function encrypt($string)
{
  // Store the cipher method
  $ciphering = "AES-128-CTR";

  // Use OpenSSl Encryption method
  $options = 0;

  // Non-NULL Initialization Vector for encryption
  $encryptionIV = '1234567891011121';

  // Store the encryption key
  $encryptionKey = "Greg Klotz";

  // Use openssl_encrypt() function to encrypt the data
  $encryption = openssl_encrypt(
    $string,
    $ciphering,
    $encryptionKey,
    $options,
    $encryptionIV
  );

  return $encryption;
}

/**
 * Decrypts a given string
 * 
 * @param string $string The string to decrypt
 * 
 * @return string
 */
function decrypt($string)
{
  $ciphering = "AES-128-CTR";
  $decryptionIV = '1234567891011121';
  $decryptionKey = "Greg Klotz";
  $options = 0;

  $decryption = openssl_decrypt(
    $string,
    $ciphering,
    $decryptionKey,
    $options,
    $decryptionIV
  );

  return $decryption;
}

/**
 * Decrypts multiple given string
 * 
 * @param array $strings The array of strings to decrypt
 * 
 * @return array
 */
function decryptWords($strings)
{
  $decryptions = [];

  for ($i = 0; $i < count($strings); $i++) {
    array_push($decryptions, decrypt($strings[$i]));
  }

  return $decryptions;
}

function getCyberQuestion($index, $stageId)
{

  if ($stageId == 1) {
    $questions_1 = [
      [
        "question" => "What does HTML stand for?",
        "options" => ["Hyper Text Markup Language", "Hyperlinks and Text Markup Language", "Home Tool Markup Language", "Hyperlink and Text Markup Language"],
        "correct_answer" => "Hyper Text Markup Language"
      ],
      [
        "question" => "Which of the following is not a programming language?",
        "options" => ["Java", "Python", "HTML", "C++"],
        "correct_answer" => "HTML"
      ],
      [
        "question" => "What does CSS stand for?",
        "options" => ["Cascading Style Sheets", "Creative Style Sheets", "Computer Style Sheets", "Colorful Style Sheets"],
        "correct_answer" => "Cascading Style Sheets"
      ],
      [
        "question" => "Which of the following is a front-end framework for building user interfaces?",
        "options" => ["Node.js", "React", "Express", "Django"],
        "correct_answer" => "React"
      ],
      [
        "question" => "Which of the following is an example of a relational database management system?",
        "options" => ["MongoDB", "MySQL", "Redis", "SQLite"],
        "correct_answer" => "MySQL"
      ],
      [
        "question" => "What does CPU stand for?",
        "options" => ["Central Processing Unit", "Computer Processing Unit", "Control Processing Unit", "Core Processing Unit"],
        "correct_answer" => "Central Processing Unit"
      ],
      [
        "question" => "Which programming language is known as the 'father' of all programming languages?",
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
        "options" => ["Structured Query Language", "Sequential Query Language", "Structured Question Language", "Sequential Question Language"],
        "correct_answer" => "Structured Query Language"
      ],
      [
        "question" => "Which company developed the Python programming language?",
        "options" => ["Microsoft", "Google", "Apple", "Facebook"],
        "correct_answer" => "Google"
      ],
      [
        "question" => "What is the main purpose of JavaScript?",
        "options" => ["Styling web pages", "Creating dynamic content", "Database management", "Server-side scripting"],
        "correct_answer" => "Creating dynamic content"
      ],
      [
        "question" => "What is the name of the algorithm used to sort elements in ascending or descending order?",
        "options" => ["Insertion Sort", "Merge Sort", "Quick Sort", "All of the other"],
        "correct_answer" => "All of the other"
      ],
      [
        "question" => "Which protocol is used for secure communication over a computer network?",
        "options" => ["HTTP", "FTP", "SSH", "SMTP"],
        "correct_answer" => "SSH"
      ],
      [
        "question" => "Which data structure uses a Last-In-First-Out (LIFO) approach?",
        "options" => ["Queue", "Stack", "Tree", "Linked List"],
        "correct_answer" => "Stack"
      ],
      [
        "question" => "What does URL stand for?",
        "options" => ["Uniform Resource Locator", "Universal Record Locator", "Uniform Resource Link", "Universal Resource Link"],
        "correct_answer" => "Uniform Resource Locator"
      ],
      [
        "question" => "What is the primary function of a firewall?",
        "options" => ["Protecting against viruses", "Filtering network traffic", "Encrypting data", "Managing user authentication"],
        "correct_answer" => "Filtering network traffic"
      ],
      [
        "question" => "Which of the following is not a type of network topology?",
        "options" => ["Star", "Ring", "Cube", "Mesh"],
        "correct_answer" => "Cube"
      ],
      [
        "question" => "What is the maximum value that can be represented with a single byte?",
        "options" => ["255", "256", "127", "-128"],
        "correct_answer" => "255"
      ],
      [
        "question" => "What is the primary function of an operating system?",
        "options" => ["Managing hardware resources", "Executing application software", "Handling user input", "Providing internet connectivity"],
        "correct_answer" => "Managing hardware resources"
      ],
      [
        "question" => "Which of the following is not a programming paradigm?",
        "options" => ["Object-Oriented Programming", "Procedural Programming", "Functional Programming", "Logical Programming"],
        "correct_answer" => "Logical Programming"
      ]
    ];
    return $questions_1[$index];
  } elseif ($stageId == 2) {
    $questions_2 = [
      [
        "question" => "Which popular video game franchise features a protagonist named 'Mario'?",
        "options" => ["The Legend of Zelda", "Final Fantasy", "Super Mario", "Pokemon"],
        "correct_answer" => "Super Mario"
      ],
      [
        "question" => "In the game 'The Legend of Zelda: Breath of the Wild', what is the name of the protagonist?",
        "options" => ["Link", "Zelda", "Ganondorf", "Sheik"],
        "correct_answer" => "Link"
      ],
      [
        "question" => "Which of the following is a popular battle royale game developed by Epic Games?",
        "options" => ["Fortnite", "Apex Legends", "PUBG", "Call of Duty: Warzone"],
        "correct_answer" => "Fortnite"
      ],
      [
        "question" => "What is the main objective in the game 'Minecraft'?",
        "options" => ["Survive", "Defeat the Ender Dragon", "Build structures", "Explore"],
        "correct_answer" => "Survive"
      ],
      [
        "question" => "Which popular video game series features a character named 'Master Chief'?",
        "options" => ["Halo", "Call of Duty", "Gears of War", "Destiny"],
        "correct_answer" => "Halo"
      ],
      [
        "question" => "Which gaming console is known for franchises like 'God of War' and 'Uncharted'?",
        "options" => ["PlayStation", "Xbox", "Nintendo Switch", "PC"],
        "correct_answer" => "PlayStation"
      ],
      [
        "question" => "What is the best-selling video game of all time as of 2022?",
        "options" => ["Minecraft", "Tetris", "Grand Theft Auto V", "Wii Sports"],
        "correct_answer" => "Minecraft"
      ],
      [
        "question" => "In the game 'The Witcher 3: Wild Hunt', what is the name of the main character?",
        "options" => ["Geralt", "Ciri", "Yennefer", "Triss"],
        "correct_answer" => "Geralt"
      ],
      [
        "question" => "Which company developed the game 'Overwatch'?",
        "options" => ["Blizzard Entertainment", "Electronic Arts", "Valve Corporation", "Ubisoft"],
        "correct_answer" => "Blizzard Entertainment"
      ],
      [
        "question" => "What genre of game is 'League of Legends'?",
        "options" => ["MOBA (Multiplayer Online Battle Arena)", "MMORPG (Massively Multiplayer Online Role-Playing Game)", "FPS (First-Person Shooter)", "RPG (Role-Playing Game)"],
        "correct_answer" => "MOBA (Multiplayer Online Battle Arena)"
      ],
      [
        "question" => "Which gaming franchise features a post-apocalyptic setting and includes titles like 'Fallout 4'?",
        "options" => ["Elder Scrolls", "Doom", "BioShock", "Fallout"],
        "correct_answer" => "Fallout"
      ],
      [
        "question" => "What is the name of the main character in the 'Assassin's Creed' series?",
        "options" => ["Ezio Auditore", "Altair Ibn-La'Ahad", "Connor Kenway", "Desmond Miles"],
        "correct_answer" => "Altair Ibn-La'Ahad"
      ],
      [
        "question" => "Which game features a battle between terrorists and counter-terrorists and includes maps like 'Dust II' and 'Mirage'?",
        "options" => ["Call of Duty", "Counter-Strike: Global Offensive", "Rainbow Six Siege", "Valorant"],
        "correct_answer" => "Counter-Strike: Global Offensive"
      ],
      [
        "question" => "What is the main mechanic in the game 'Among Us'?",
        "options" => ["Solving puzzles", "Building structures", "Survival", "Identifying impostors"],
        "correct_answer" => "Identifying impostors"
      ],
      [
        "question" => "Which game features a battle between two teams of five players each, with the objective of destroying the opposing team's base?",
        "options" => ["Dota 2", "Rocket League", "Team Fortress 2", "Starcraft II"],
        "correct_answer" => "Dota 2"
      ],
      [
        "question" => "In the game 'Pokémon', what is the name of the main character that players control?",
        "options" => ["Pikachu", "Ash Ketchum", "Red", "Charmander"],
        "correct_answer" => "Red"
      ],
      [
        "question" => "Which game franchise is known for its open-world crime action games, such as 'Grand Theft Auto V'?",
        "options" => ["Watch Dogs", "Saints Row", "Red Dead Redemption", "Grand Theft Auto"],
        "correct_answer" => "Grand Theft Auto"
      ],
      [
        "question" => "What is the primary objective in the game 'Dark Souls'?",
        "options" => ["Defeat bosses", "Solve puzzles", "Explore dungeons", "Build structures"],
        "correct_answer" => "Defeat bosses"
      ],
      [
        "question" => "Which game features a blocky, procedurally-generated 3D world that allows players to explore and create?",
        "options" => ["Terraria", "Roblox", "Stardew Valley", "No Man's Sky"],
        "correct_answer" => "Minecraft"
      ],
      [
        "question" => "What is the name of the character players control in the game 'Half-Life'?",
        "options" => ["Gordon Freeman", "Alyx Vance", "Barney Calhoun", "Adrian Shephard"],
        "correct_answer" => "Gordon Freeman"
      ]
    ];
    return $questions_2[$index];
  } elseif ($stageId == 3) {
    $questions_3 = [
      [
        "question" => "Who directed the movie 'Titanic'?",
        "options" => ["Steven Spielberg", "James Cameron", "Martin Scorsese", "Christopher Nolan"],
        "correct_answer" => "James Cameron"
      ],
      [
        "question" => "What is the name of the fictional British spy in the movie series created by Ian Fleming?",
        "options" => ["Jason Bourne", "Ethan Hunt", "Jack Ryan", "James Bond"],
        "correct_answer" => "James Bond"
      ],
      [
        "question" => "Which movie features the song 'Hakuna Matata'?",
        "options" => ["Frozen", "The Lion King", "Aladdin", "Beauty and the Beast"],
        "correct_answer" => "The Lion King"
      ],
      [
        "question" => "In which movie does the character Harry Potter first appear?",
        "options" => ["Harry Potter and the Chamber of Secrets", "Harry Potter and the Sorcerer's Stone", "Harry Potter and the Goblet of Fire
        ", "Harry Potter and the Prisoner of Azkaban"],
        "correct_answer" => "Harry Potter and the Sorcerer's Stone"
      ],
      [
        "question" => "What is the name of the island in 'Jurassic Park'",
        "options" => ["Skull Island", "Monster Island", "Isla Nublar", "Isla Sorna"],
        "correct_answer" => "Isla Nublar"
      ],
      [
        "question" => "Who played the Joker in 'The Dark Knight'?",
        "options" => ["Jack Nicholson", "Jared Leto", "Heath Ledger", "Joaquin Phoenix"],
        "correct_answer" => "Heath Ledger"
      ],
      [
        "question" => "Which movie did Forrest Gump star in?",
        "options" => ["Catch Me If You Can", "Forrest Gump", "Big", "The Green Mile"],
        "correct_answer" => "Forrest Gump"
      ],
      [
        "question" => "What is the main character's name in 'The Matrix'?",
        "options" => ["Morpheus", "Neo", "Trinity", "Agent Smith"],
        "correct_answer" => "Neo"
      ],
      [
        "question" => "In 'Finding Nemo', what type of fish is Nemo?",
        "options" => ["Clownfish", "Goldfish", "Beta Fish", "Guppy"],
        "correct_answer" => "Clownfish"
      ],
      [
        "question" => "Who is the famous British secret agent in movies?",
        "options" => ["Jason Bourne", "Ethan Hunt", "Jack Ryan", "James Bond"],
        "correct_answer" => "James Bond"
      ],
      [
        "question" => "What is Indiana Jones' profession?",
        "options" => ["Doctor", "Archaeologist", "Lawyer", "Spy"],
        "correct_answer" => "Archaeologist"
      ],
      [
        "question" => "Who directed 'Schindler's List'?",
        "options" => ["Quentin Tarantino", "Ridley Scott", "Steven Spielberg", "George Lucas"],
        "correct_answer" => "Steven Spielberg"
      ],
      [
        "question" => "In which movie series is the fictional character 'Rocky Balboa' the main character?",
        "options" => ["Rocky", "Rambo", "Terminator", "Die Hard"],
        "correct_answer" => "Rocky"
      ],
      [
        "question" => "What is the name of the kingdom in 'Frozen'?",
        "options" => ["Arendelle", "Genovia", "Corona", "Aldovia"],
        "correct_answer" => "Arendelle"
      ],
      [
        "question" => "Who played the main character in the 1994 film 'Forrest Gump'?",
        "options" => ["Tom Hanks", "Brad Pitt", "Johnny Depp", "Leonardo DiCaprio"],
        "correct_answer" => "Tom Hanks"
      ],
      [
        "question" => "What year was the original 'Jurassic Park' movie released?",
        "options" => ["1990", "1993", "1996", "1999"],
        "correct_answer" => "1993"
      ], 
      [
        "question" => "In 'Back to the Future', what makes time travel possible?",
        "options" => ["A black hole", "A magic spell", "A flux capacitor", "A quantum leap"],
        "correct_answer" => "A flux capacitor"
      ], 
      [
        "question" => "What is the name of the spacecraft in 'Alien'?",
        "options" => ["Nostromo", "Enterprise", "Millennium Falcon", "Serenity"],
        "correct_answer" => "Nostromo"
      ], 
      [
        "question" => "Who directed 'Inception'?",
        "options" => ["Steven Spielberg", "Christopher Nolan", "Ridley Scott", "James Cameron"],
        "correct_answer" => "Christopher Nolan"
      ], 
      [
        "question" => "What color is the pill that Neo takes in 'The Matrix'?",
        "options" => ["Red", "Blue", "Green", "Yellow"],
        "correct_answer" => "Red"
      ],

    ];
    return $questions_3[$index];
  }
}

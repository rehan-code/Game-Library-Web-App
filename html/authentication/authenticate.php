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
    for ($i=0; $i < count($result['result']); $i++) { 
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

function getCyberQuestion($index, $stageId) {

   if ($stageId == 1) {
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
    return $questions_1[$index];

  } elseif ($stageId == 2) {
    $questions_2 = [
        [
            "question" => "Which of the following is the most popular mobile operating system globally?",
            "options" => ["iOS", "Android", "Windows Phone", "BlackBerry OS"],
            "correct_answer" => "Android"
        ],
        [
            "question" => "What does 'iOS' stand for?",
            "options" => ["iPhone Operating System", "Internet Operating System", "Integrated Operating System", "Interactive Operating System"],
            "correct_answer" => "iPhone Operating System"
        ],
        [
            "question" => "Which company developed the Android operating system?",
            "options" => ["Apple", "Google", "Microsoft", "Samsung"],
            "correct_answer" => "Google"
        ],
        [
            "question" => "What programming language is primarily used for Android app development?",
            "options" => ["Java", "Swift", "C#", "Kotlin"],
            "correct_answer" => "Kotlin"
        ],
        [
            "question" => "Which framework is commonly used for developing cross-platform mobile apps?",
            "options" => ["React Native", "Vue.js", "Angular", "Flutter"],
            "correct_answer" => "Flutter"
        ],
        [
            "question" => "Which architecture pattern is commonly used in Android app development to separate the application logic from the user interface?",
            "options" => ["MVC (Model-View-Controller)", "MVP (Model-View-Presenter)", "MVVM (Model-View-ViewModel)", "Singleton"],
            "correct_answer" => "MVVM (Model-View-ViewModel)"
        ],
        [
            "question" => "Which technology is primarily used for short-range wireless communication between mobile devices?",
            "options" => ["Wi-Fi", "NFC", "Bluetooth", "LTE"],
            "correct_answer" => "Bluetooth"
        ],
        [
            "question" => "What does the acronym 'SDK' stand for, which is essential in mobile app development?",
            "options" => ["Software Development Kit", "System Deployment Knowledge", "Server Database Kit", "Software Design Key"],
            "correct_answer" => "Software Development Kit"
        ],
        [
            "question" => "What is the primary IDE used for developing iOS apps?",
            "options" => ["Visual Studio", "Xcode", "Android Studio", "Eclipse"],
            "correct_answer" => "Xcode"
        ],
        [
            "question" => "In mobile app development, what is the purpose of using an emulator?",
            "options" => ["To compress app files", "To test apps on different devices without needing the actual devices", "To enhance the graphics of the app", "To deploy apps directly to the app store"],
            "correct_answer" => "To test apps on different devices without needing the actual devices"
        ],
        [
          "question" => "What is the primary programming language used for iOS app development?",
          "options" => ["Java", "Swift", "Objective-C", "C++"],
          "correct_answer" => "Swift"
        ],
        [
            "question" => "Which version control system is commonly used in mobile app development?",
            "options" => ["Git", "SVN", "Mercurial", "Perforce"],
            "correct_answer" => "Git"
        ],
        [
            "question" => "What is the purpose of using CocoaPods in iOS development?",
            "options" => ["To manage dependencies", "To design user interfaces", "To write backend code", "To debug applications"],
            "correct_answer" => "To manage dependencies"
        ],
        [
            "question" => "Which mobile app distribution platform is managed by Apple for iOS apps?",
            "options" => ["Google Play Store", "Amazon Appstore", "App Store", "Windows Store"],
            "correct_answer" => "App Store"
        ],
        [
            "question" => "What is the purpose of a provisioning profile in iOS development?",
            "options" => ["To optimize app performance", "To distribute apps internally within an organization", "To test apps on different devices", "To secure app distribution and installation"],
            "correct_answer" => "To secure app distribution and installation"
        ],
        [
            "question" => "Which design pattern is commonly used in iOS development for handling communication between objects?",
            "options" => ["Singleton", "Observer", "Decorator", "Factory"],
            "correct_answer" => "Observer"
        ],
        [
            "question" => "What is the purpose of Interface Builder in iOS development?",
            "options" => ["To write code", "To design user interfaces visually", "To debug applications", "To manage dependencies"],
            "correct_answer" => "To design user interfaces visually"
        ],
        [
            "question" => "Which type of database is commonly used in mobile app development?",
            "options" => ["Relational Database", "NoSQL Database", "Graph Database", "Object-Oriented Database"],
            "correct_answer" => "NoSQL Database"
        ],
        [
            "question" => "What does the term 'APK' stand for in Android app development?",
            "options" => ["Android Package Kit", "Application Program Kit", "Application Package Kit", "Android Program Kit"],
            "correct_answer" => "Android Package Kit"
        ],
        [
            "question" => "Which tool is commonly used for performance monitoring and debugging in Android development?",
            "options" => ["Logcat", "Xcode", "Android Studio", "Visual Studio"],
            "correct_answer" => "Logcat"
        ]  
      ];
      return $questions_2[$index];
    }
  }
?>
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
$mosaic_order = [];

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
case 'get_mosaic_order':
    $mosaic_order = getMosaicOrder($input->difficulty);
    $result['result'] = $mosaic_order;
    break;
case 'check_mosaic_solution':
    $result['result'] = checkMosaicSolution($input->order, $mosaic_order);
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

/**
 * Retrieves the cyber coin questions 
 * 
 * @param string $index     The array of index to decrypt
 * @param string $stage_num The id of the stage
 * 
 * @return array
 */
function getCyberQuestion($index, $stage_num) 
{
    include "../database.php";
    //add if empty check
    $result = getCyberQuestions($stage_num)[$index];
    return [
      "question"=> $result["question"],
      "options"=> [
        $result["option_1"], 
        $result["option_2"], 
        $result["option_3"], 
        $result["option_4"]
      ],
      "correct_answer"=> $result["answer"],
    ];
}

function getMosaicOrder($difficulty) {
    $mosaic_order = [];
    switch ($difficulty) {
        case 'easy':
            $mosaic_order = ["1","2","3","4","5","6","7","8","9"];
            break;
        case 'medium':
            $mosaic_order = ["1","2","3","4","5","6","7","8","9","10",
                "11","12","13","14","15","16"];
            break;
        case 'hard':
            $mosaic_order = ["1","2","3","4","5","6","7","8","9","10",
                "11","12","13","14","15","16","17","18","19","20",
                "21","22","23","24","25"];  
            break;
        default:
            break;
    }
    shuffle($mosaic_order);
    return $mosaic_order;
}

function checkMosaicSolution($order, $mosaic_order) {
    if ($order == $mosaic_order) {
        return true;
    }
    return false;
}
?>
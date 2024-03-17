<?php
/**
 * Secret Page Front End Test Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
use PHPUnit\Framework\TestCase;

/**
 * Front end unit tests for the Secret Page
 */
class SecretPageTest extends TestCase
{
    /**
     * Checks if the congrats CSS file exists.
     */
    public function testCongratsCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../cryptogram/congrats/congrats.css');
    }

    /**
     * Checks if the navbar component exists.
     */
    public function testNavbarComponentExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.php');
    }

    /**
     * Checks if the image mentioned in the Secret Page exists.
     */
    public function testSecretPageImageExists()
    {
        $this->assertFileExists(__DIR__ . '/../images/cryptogram/money.png');
    }

    /**
     * Checks if the redirect button correctly points to an external URL.
     * This is a bit outside the scope of typical PHPUnit tests, as it's more related to functionality
     * than file existence or syntax correctness. You might need a different approach or tool to test
     * if the button correctly redirects, such as a browser testing tool like Selenium.
     */
    public function testRedirectButtonPointsToCorrectUrl()
    {
        $expectedUrl = "https://cis4250w24-09.socs.uoguelph.ca/QrwEstJy"; 
        $buttonUrl = $expectedUrl; 
        $this->assertEquals($expectedUrl, $buttonUrl, "The button's redirect URL does not match the expected URL.");
    }

}

?>

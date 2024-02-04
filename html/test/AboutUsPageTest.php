<?php
/**
 * About Us Page Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<?php

use PHPUnit\Framework\TestCase;
/**
 * Front end unit tests for About Us Page
 */
class AboutUsPageTest extends TestCase
{
    private $_aboutUsPhpContent;
    /**
     * Reads in all the content for the About Us Page
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Load the contents of the about_us.php file into a string 
        // to be used in each test below
        $this->_aboutUsPhpContent = file_get_contents(
            __DIR__ . '/../about_us/about_us.php'
        );
    }

    /**
     * Integration Tests
     * Is this PHP script correctly integrated with external 
     * resources (ex: CSS files, components and snippets for 
     * each team member)?
     */
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../about_us/about_us.css');
    }
    
    /**
     * Checks if all the required PHP files exist
     */
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../about_us/about_us.php');
    }

    /**
     * Checks if the page is integrated/found into the navbar
     */
    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString(
            'navbar/navbar.php', 
            $this->_aboutUsPhpContent
        );
    }

    /**
     * Checks if all team member's profiles are included
     */
    public function testProfilesExist()
    {
        $teamMemberNames = ['Hari', 'Ivan', 'Rehan', 'Thulasi', 'Harir', 'Nour'];

        foreach ($teamMemberNames as $memberName) {
            $expectedSnippetFileName = strtolower($memberName) . "_snippet.php";
            $this->assertFileExists(
                __DIR__ . "/../about_us/snippets/" . $expectedSnippetFileName
            );
        }
    }
    
    /**
     * Checks if all team member's about us snippets are included
     */
    public function testProfileSnippetsIncluded()
    {
        $teamMemberNames = [
            'Harikrishan',
            'Ivan',
            'Rehan', 
            'Thulasi',
            'Harir',
            'Nour'
        ];

        foreach ($teamMemberNames as $memberName) {
  
            $expectedSnippetFileName = strtolower($memberName);

            // Testing that the expected snippet file name is present 
            // within the about_us.php content
            $this->assertStringContainsString(
                $expectedSnippetFileName, 
                $this->_aboutUsPhpContent
            );
        }
    }

    /**
     * Functional test to simulate a user accessing the about_us.php page; 
     * test is intended to verify that all components render as expected
     */
    public function testPageRendersCorrectly()
    {
        $_SERVER['DOCUMENT_ROOT'] = '/path/to/your/document/root';

        $this->assertStringContainsString(
            '<title>About Us</title>', $this->_aboutUsPhpContent
        );
        $this->assertStringContainsString('Who We Are', $this->_aboutUsPhpContent);
        $this->assertMatchesRegularExpression(
            '<div class="profile-details">', $this->_aboutUsPhpContent
        );
    }
}

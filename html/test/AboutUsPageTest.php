<?php

use PHPUnit\Framework\TestCase;

class AboutUsPageTest extends TestCase
{
    private $aboutUsPhpContent;

    protected function setUp(): void
    {
        parent::setUp();
        // Load the contents of the about_us.php file into a string to be used in each test below
        $this->aboutUsPhpContent = file_get_contents(__DIR__ . '/../about_us/about_us.php');
    }

    // Integration Tests -- Is this PHP script correctly integrated with external resources (ex: CSS files, components and snippets for each team member)?
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../about_us/about_us.css');
    }

    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../about_us/about_us.php');
    }

    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString('navbar/navbar.php', $this->aboutUsPhpContent);
    }

    public function testProfileSnippetsIncluded()
    {
        $teamMemberNames = ['Harikrishan', 'Ivan', 'Rehan', 'Thulasi', 'Harir', 'Nour'];

        foreach ($teamMemberNames as $memberName) {
  
            $expectedSnippetFileName = strtolower($memberName);

            // Testing that the expected snippet file name is present within the about_us.php content
            $this->assertStringContainsString($expectedSnippetFileName, $this->aboutUsPhpContent);
        }
    }

    // Functional test to simulate a user accessing the about_us.php page; test is intended to verify that all components render as expected
    public function testPageRendersCorrectly()
    {
        $_SERVER['DOCUMENT_ROOT'] = '/path/to/your/document/root';

        $this->assertStringContainsString('<title>About Us</title>', $this->aboutUsPhpContent);
        $this->assertStringContainsString('Who We Are', $this->aboutUsPhpContent);
        $this->assertMatchesRegularExpression('/<img src="..\/images\/.+?" alt=".+? Profile Picture">/', $this->aboutUsPhpContent);
    }
}

<?php

use PHPUnit\Framework\TestCase;

class IndexPageTest extends TestCase
{
    private $indexPhpContent;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indexPhpContent = file_get_contents(__DIR__ . '/../index.php');
    }

    // Test if dependent CSS files exist
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../style.css');
    }

    // Verify the index.php file itself exists (sanity check)
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../index.php');
    }

    // Verify the index page includes the required navbar component
    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString('navbar/navbar.php', $this->indexPhpContent);
    }

}

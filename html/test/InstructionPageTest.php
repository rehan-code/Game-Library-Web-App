<?php
/**
 * Instruction page test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

use PHPUnit\Framework\TestCase;

/**
 * Front end tests for instruction page
 */
class InstructionPageTest extends TestCase
{
    private $_instructionPhpContent;

    /**
     * Loads content of About Us page
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->_instructionPhpContent = file_get_contents(
            __DIR__ . '/../instruction/instruction.php'
        );
    }

    /**
     * Test if dependent CSS files exist
     */
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../instruction/instruction.css');
    }

    /**
     * Verify the instruction.php file itself exists (sanity check)
     */
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../instruction/instruction.php');
    }

    /**
     * Verify the instruction page includes the navbar component
     */
    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString(
            'navbar/navbar.php', $this->_instructionPhpContent
        );
    }

    /**
     * Functional test to verify the page renders expected content
     */
    public function testPageRendersCorrectly()
    {
        // Check for instruction page elements
        $this->assertStringContainsString(
            '<h2 class="heading">Overview</h2>', $this->_instructionPhpContent
        );
        $this->assertStringContainsString(
            '<h2 class="heading">Instructions</h2>', $this->_instructionPhpContent
        );
    }
}

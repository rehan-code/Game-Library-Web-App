<?php

use PHPUnit\Framework\TestCase;

class IndexPageTest extends TestCase
{
    public function testNavbarFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.php');
    }

    // Add tests for dynamic content or logic can be added here
}


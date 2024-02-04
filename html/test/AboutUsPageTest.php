<?php

use PHPUnit\Framework\TestCase;

class AboutUsPageTest extends TestCase
{
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../about_us/about_us.css');
    }

    // Add tests for any specific PHP logic in about_us.php
}

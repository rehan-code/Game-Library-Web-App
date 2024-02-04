<?php

use PHPUnit\Framework\TestCase;

class WaldoStageTest extends TestCase
{
    protected $stageFilePath = '';

    public function testStageCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/stages/waldo_game.css');
    }
}

<?php

namespace TelegramLogger\Tests\Message;

use PHPUnit\Framework\TestCase;
use TelegramLogger\Message\InfoMessage;

/**
 * Class MessageTest
 * @package TelegramLogger\Tests\Message
 */
class MessageTest extends TestCase
{
    public function testGetFormattedPost(): void
    {
        $testText = 'Test text test text';
        $testParamsAsString = "param_1: value_1\r\nparam_2: 2\r\n";
        $testParamsAsArray = [
            'param_1' => 'value_1',
            'param_2' => 2
        ];

        $infoMessage = new InfoMessage();
        $actualResult = $infoMessage->getFormattedPost($testText, $testParamsAsArray);

        $expected = "ℹ️<b>INFO</b>ℹ️\r\n\r\n$testText\r\n\r\n<b>--- Extra parameters</b>\r\n\r\n$testParamsAsString\r\n\r\n<b>--- Tags</b>\r\n\r\n#info\r\n\r\nℹ️";

        $this->assertEquals($expected, $actualResult);
    }
}


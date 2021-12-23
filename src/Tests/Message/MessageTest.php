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
        $testParamsAsArray = [
            'param_1' => 'value_1',
            'param_2' => 2
        ];

        $infoMessage = new InfoMessage();
        $actualResult = $infoMessage->getFormattedPost($testText, $testParamsAsArray);

        $expected = "  ℹ️<b>INFO</b>
 <pre>Test text test text</pre> 
<i>- Params</i>
 <pre>param_1: value_1
param_2: 2
</pre>
 <i>- Tags</i>
 #info ";

        $this->assertEquals($expected, $actualResult);
    }
}

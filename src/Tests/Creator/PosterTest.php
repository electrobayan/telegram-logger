<?php

namespace TelegramLogger\Tests\Creator;

use PHPUnit\Framework\TestCase;
use TelegramLogger\Creator\InfoPoster;

/**
 * Class PosterTest
 * @package TelegramLogger\Tests\Creator
 */
class PosterTest extends TestCase
{
    public function testPost(): void
    {
        $testToken = 'test';
        $testChannelId = '@test';
        $testText = 'Some test text';
        $testParams = [
            'key_1' => 'value_1',
            'key_2' => 'value_2'
        ];
        $testTags = ['tag1', 'tag2'];

        $infoPoster = new InfoPoster($testToken, $testChannelId);
        $actualResult = $infoPoster->post($testText, $testParams, $testTags);

        $this->assertIsBool($actualResult);
    }
}

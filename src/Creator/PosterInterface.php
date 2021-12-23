<?php

namespace TelegramLogger\Creator;

use TelegramLogger\Message\MessageInterface;

/**
 * Interface PosterInterface
 * @package TelegramLogger\Creator
 */
interface PosterInterface
{
    const HTML_TELEGRAM_MODE = 'HTML';

    /**
     * @return MessageInterface
     */
    public function getMessageObject(): MessageInterface;

    /**
     * @param string $text
     * @param array $params
     * @param array $tags
     * @return bool
     */
    public function post(string $text, array $params = [], array $tags = []): bool;
}

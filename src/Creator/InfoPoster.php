<?php

namespace TelegramLogger\Creator;

use TelegramLogger\Message\InfoMessage;
use TelegramLogger\Message\MessageInterface;

/**
 * Class InfoPoster
 * @package TelegramLogger\Creator
 */
class InfoPoster extends AbstractPoster
{
    /**
     * @return MessageInterface
     */
    public function getMessageObject(): MessageInterface
    {
        return new InfoMessage();
    }
}

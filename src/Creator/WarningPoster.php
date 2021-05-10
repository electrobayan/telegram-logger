<?php

namespace TelegramLogger\Creator;

use TelegramLogger\Message\MessageInterface;
use TelegramLogger\Message\WarningMessage;

/**
 * Class WarningPoster
 * @package TelegramLogger\Creator
 */
class WarningPoster extends AbstractPoster
{
    public function getMessageObject(): MessageInterface
    {
        return new WarningMessage();
    }
}

<?php

namespace TelegramLogger\Creator;

use TelegramLogger\Message\ErrorMessage;
use TelegramLogger\Message\MessageInterface;

/**
 * Class ErrorPoster
 * @package TelegramLogger\Creator
 */
class ErrorPoster extends AbstractPoster
{
    /**
     * @return MessageInterface
     */
    public function getMessageObject(): MessageInterface
    {
        return new ErrorMessage();
    }
}

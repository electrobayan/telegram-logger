<?php

namespace TelegramLogger\Message;

/**
 * Class ErrorMessage
 * @package TelegramLogger\Message
 */
class ErrorMessage extends AbstractMessage
{
    /**
     * Icon showing in the message
     * @const string
     */
    public const INFO_ICON = '⛔️';

    /**
     * Log title
     * @const string
     */
    public const TITLE = "<b>ERROR</b>";

    /**
     * Log message tag
     * @const string
     */
    public const TAG = '#error';
}

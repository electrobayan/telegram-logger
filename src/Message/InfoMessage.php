<?php

namespace TelegramLogger\Message;

/**
 * Class InfoMessage
 * @package TelegramLogger\Message
 */
class InfoMessage extends AbstractMessage
{
    /**
     * Icon showing in the message
     * @const string
     */
    public const INFO_ICON = 'ℹ️';

    /**
     * Log title
     * @const string
     */
    public const TITLE = "<b>INFO</b>";

    /**
     * Log message tag
     * @const string
     */
    public const TAG = '#info';
}

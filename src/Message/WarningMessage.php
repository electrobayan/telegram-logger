<?php

namespace TelegramLogger\Message;

/**
 * Class WarningMessage
 * @package TelegramLogger\Message
 */
class WarningMessage extends AbstractMessage
{
    /**
     * Icon showing in the message
     * @const string
     */
    public const INFO_ICON = '⚠️';

    /**
     * Log title
     * @const string
     */
    public const TITLE = "<b>WARNING</b>";

    /**
     * Log message tag
     * @const string
     */
    public const TAG = '#warning';
}

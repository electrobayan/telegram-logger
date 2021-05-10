<?php

namespace TelegramLogger\Message;

/**
 * Interface MessageInterface
 * @package TelegramLogger\Message
 */
interface MessageInterface
{
    /**
     * Divides pieces of data
     * @const string
     */
    public const NEW_LINE_DIVIDER = "\r\n";
    public const PARAMS_DIVIDER = ': ';
    public const EXTRA_PARAMS_KEY = '<b>--- Extra parameters</b>';
    public const TAGS_KEY = '<b>--- Tags</b>';

    /**
     * Icon showing in the message
     * @const string
     */
    public const INFO_ICON = '';

    /**
     * Log title
     * @const string
     */
    public const TITLE = '';

    /**
     * Log message tag
     * @const string
     */
    public const TAG = '';

    /**
     * @param string $text
     * @param array $params
     * @return string
     */
    public function getFormattedPost(string $text, array $params = []): string;
}

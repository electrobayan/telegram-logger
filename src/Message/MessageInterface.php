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
    public const DIVIDER = ' ';
    public const PARAMS_DIVIDER = ':' . self::DIVIDER;
    public const EXTRA_PARAMS_KEY = '<i>- Params</i>';
    public const TAGS_KEY = '<i>- Tags</i>';
    public const TAG_PREFIX = '#';

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
     * @param array $tags
     * @return string
     */
    public function getFormattedPost(string $text, array $params = [], array $tags = []): string;
}

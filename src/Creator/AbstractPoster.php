<?php

namespace TelegramLogger\Creator;

use Exception;
use TelegramLogger\Message\MessageInterface;
use TelegramBot\Api\BotApi as TelegramConnector;

/**
 * Class AbstractPoster
 * @package TelegramLogger\Creator
 */
abstract class AbstractPoster implements PosterInterface
{
    /**
     * @var TelegramConnector
     */
    protected $telegramConnector;

    /**
     * @var string
     */
    private $telegramAccessToken;

    /**
     * @var string
     */
    private $channelId;

    /**
     * AbstractPoster constructor.
     * @param string $telegramAccessToken
     * @param string $channelId
     */
    public function __construct(
        string $telegramAccessToken,
        string $channelId
    ) {
        $this->telegramAccessToken = $telegramAccessToken;
        $this->channelId = $channelId;
        $this->telegramConnector = new TelegramConnector($this->telegramAccessToken);
    }

    /**
     * @return MessageInterface
     */
    abstract public function getMessageObject(): MessageInterface;

    /**
     * @param string $text
     * @param array $params
     * @param array $tags
     * @return bool
     */
    public function post(string $text, array $params = [], array $tags = []): bool
    {
        $result = true;

        $formattedPost = $this
            ->getMessageObject()
            ->getFormattedPost($text, $params, $tags);

        try {
            $this->telegramConnector->sendMessage($this->channelId, $formattedPost, self::HTML_TELEGRAM_MODE);
        } catch (Exception $exception) {
            echo $exception->getMessage() . MessageInterface::NEW_LINE_DIVIDER;
            $result = false;
        }

        return $result;
    }
}

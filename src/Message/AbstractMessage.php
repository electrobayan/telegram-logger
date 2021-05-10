<?php

namespace TelegramLogger\Message;

/**
 * Class AbstractMessage
 * @package TelegramLogger\Message
 */
abstract class AbstractMessage implements MessageInterface
{
    /**
     * @return string
     */
    protected function getLogTitle(): string
    {
        return static::INFO_ICON . static::TITLE . static::INFO_ICON;
    }

    /**
     * @return string
     */
    protected function getLogTag(): string
    {
        return static::TAG;
    }

    /**
     * @param string $text
     * @param array $params
     * @return string
     */
    public function getFormattedPost(string $text, array $params = []): string
    {
        $postFrame = $this->prepareFrame();
        $formattedParams = $this->prepareParams($params);

        return sprintf($postFrame, $text, $formattedParams);
    }

    /**
     * @return string
     */
    protected function prepareFrame(): string
    {
        return
            $this->getLogTitle() . self::NEW_LINE_DIVIDER . self::NEW_LINE_DIVIDER
            . '%s' . self::NEW_LINE_DIVIDER . self::NEW_LINE_DIVIDER
            . self::EXTRA_PARAMS_KEY . self::NEW_LINE_DIVIDER . self::NEW_LINE_DIVIDER
            . '%s' . self::NEW_LINE_DIVIDER . self::NEW_LINE_DIVIDER
            . self::TAGS_KEY . self::NEW_LINE_DIVIDER . self::NEW_LINE_DIVIDER
            . $this->getLogTag() . self::NEW_LINE_DIVIDER . self::NEW_LINE_DIVIDER
            . static::INFO_ICON;
    }

    /**
     * @param array $params
     * @return string
     */
    protected function prepareParams(array $params): string
    {
        $result = '';

        foreach ($params as $paramKey => $paramValue) {
            $result .= $paramKey . self::PARAMS_DIVIDER . $paramValue . self::NEW_LINE_DIVIDER;
        }

        return $result;
    }
}

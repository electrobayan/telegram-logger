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
        return static::INFO_ICON . static::TITLE;
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
        $title = $this->getLogTitle();
        $extraParamsKey = self::EXTRA_PARAMS_KEY;
        $tagsKey = self::TAGS_KEY;
        $tags = $this->getLogTag();

        return <<<FRAME
                $title
                <pre>%s</pre>
                
                $extraParamsKey
                <pre>%s</pre>
                
                $tagsKey
                $tags
                FRAME;
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

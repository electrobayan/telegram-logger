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
     * @param array $tags
     * @return string
     */
    public function getFormattedPost(string $text, array $params = [], array $tags = []): string
    {
        $postFrame = $this->prepareFrame($params);
        $formattedParams = $this->prepareParams($params);
        $formattedTags = $this->prepareTags($tags);

        return sprintf($postFrame, $text, $formattedParams, $formattedTags);
    }

    /**
     * @param array $params
     * @return string
     */
    protected function prepareFrame(array $params): string
    {
        $titleBlock = $this->prepareTitleBlock();
        $paramsBlock = $this->prepareParamsBlock($params);
        $tagsBlock = $this->prepareTagsBlock();

        return $titleBlock . $paramsBlock . $tagsBlock;
    }

    /**
     * @return string
     */
    protected function prepareTitleBlock(): string
    {
        $title = $this->getLogTitle();
        return <<<TITLE
                 $title
                <pre>%s</pre>
               TITLE;
    }

    /**
     * @param array $params
     * @return string
     */
    protected function prepareParamsBlock(array $params): string
    {
        $extraParamsKey = $params ? self::NEW_LINE_DIVIDER . self::EXTRA_PARAMS_KEY : '';
        $extraParamsValue = $params ? '<pre>%s</pre>' . self::NEW_LINE_DIVIDER  : '';

        return <<<PARAMS
                $extraParamsKey
                $extraParamsValue
               PARAMS;
    }

    /**
     * @return string
     */
    protected function prepareTagsBlock(): string
    {
        $tagsKey = self::TAGS_KEY;
        $tags = $this->getLogTag();

        return <<<TAGS
                $tagsKey
                $tags %s
               TAGS;
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

    /**
     * @param array $tags
     * @return string
     */
    protected function prepareTags(array $tags): string
    {
        $result = '';

        if ($tags) {
            $result = self::TAG_PREFIX . implode(self::DIVIDER . self::TAG_PREFIX, $tags);
        }
        return $result;
    }
}

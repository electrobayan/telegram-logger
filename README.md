# Telegram Logger
[![Latest Version on Packagist](https://img.shields.io/badge/packagist-v1.0.2-green)](https://packagist.org/packages/electrobayan/telegram-logger)
<p>
This extension allows you to see your project logs in real time using Telegram app.
</p>

## How To Install
<b>via Composer require command (composer 2 is required):</b>

Just type into the CLI in your project root:
<pre>composer require electrobayan/telegram-logger</pre>

<b>via updating composer.json:</b>
<pre>
{
    "require": {
        "electrobayan/telegram-logger": "^1.0"
    }
}
</pre>
Then run in you CLI:
<pre>
composer install
</pre>

## How To Use
### Quick example:
You will have to create a Telegram bot and a channel. Check the user guide <a href="https://core.telegram.org/bots">here</a>.
Then just do the following:
<pre>
$infoLogger = new \TelegramLogger\Creator\InfoPoster('Telegram Key Goes here', '@your_telegram_channel_name');
$infoLogger->post('test', ['key_1' => 'value_1', 'key_2' => 'value_2'], ['tag1', 'tag2']);
</pre>

### Details
There 3 types of log messages:
<ul>
    <li>Info</li>
    <li>Warning</li>
    <li>Error</li>
</ul>
You are free to create new if needed.
Each of these types of messages has their own icons, frame and titles. Depending on what type you need you should use an appropriate Poster: `InfoPoster`, `ErrorPoster` or `WarningPoster`.

<pre>
$errorLogger = new \TelegramLogger\Creator\ErrorPoster('Telegram Key Goes here', '@your_telegram_channel_name');
$warningLogger = new \TelegramLogger\Creator\WarningPoster('Telegram Key Goes here', '@your_telegram_channel_name');
$infoLogger = new \TelegramLogger\Creator\InfoPoster('Telegram Key Goes here', '@your_telegram_channel_name');
</pre>

After the poster created all is left is just to call `post` method.
<pre>
$errorLogger->post('Error Message', ['key_1' => 'value_1', 'key_2' => 'value_2'], ['tag1', 'tag2']);
$warningLogger->post('Warning Message', ['key_1' => 'value_1', 'key_2' => 'value_2'], ['tag1', 'tag2']);
$infoLogger->post('Info Message', ['key_1' => 'value_1', 'key_2' => 'value_2'], ['tag1', 'tag2']);
</pre>

Also, you can pass <b>optional</b> extra params if needed as an array `key => value`. Both key and value will be posted into the channel.
You can pass <b>optional</b> tags if needed as an array `key => value`. Only values will be posted into the channel.

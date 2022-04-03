<?php

/**
 * This file is part of the PHP Telegram Bot example-bot package.
 * https://github.com/php-telegram-bot/example-bot/
 *
 * (c) PHP Telegram Bot Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * User "/echo" command
 *
 * Simply echo the input back to the user.
 */

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\InlineKeyboard;
// Using Medoo namespace
use Medoo\Medoo;

class historyCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'history';

    /**
     * @var string
     */
    protected $description = '最近发起活动的群组';

    /**
     * @var string
     */
    protected $usage = '/history <text>';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * Main command execution
     *
     * @return ServerResponse
     * @throws TelegramException
     */
    public function execute(): ServerResponse
    {
    
$config = require __DIR__ . '/../../config.php';

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => ($config['database']['database']),
    'server' => ($config['database']['host']),
    'username' => ($config['database']['user']),
    'password' => ($config['database']['password'])
]);
  


$history1 = $database->select("dp_tgbot_lottery","chat_url",[
	"chat_url[!]" => null,
		"ORDER" => [
		// Order by column with descending sorting
		"id" => "DESC",
	]
]);
$history11 = (array_unique($history1));

$key1 = array_keys($history11);


$chat_title = $database->select("dp_tgbot_lottery", "chat_title", [
	//"status" => 1,
	"chat_url[!]" => null ,
			"ORDER" => [
		// Order by column with descending sorting
		"id" => "DESC",
	]
]);

$title = $database->select("dp_tgbot_lottery", "title", [
	"chat_url[!]" => null,
			"ORDER" => [
		// Order by column with descending sorting
		"id" => "DESC",
	]
]);



        
        
        $page = 1;
        
        $inline_keyboard = new InlineKeyboard([
            ['text' => '上一页', 'callback_data' => '-1'],
            ['text' => ($page), 'callback_data' => '10'],
            ['text' => '下一页', 'callback_data' => '1'],
        ]);
        
        
        
        $message = $this->getMessage();
        //$text    = $message->getText(true);
        
        $date1 =
        "history :
------------------------------------------
👥<a href=\"{$history11[$key1[0]]}\">{$chat_title[$key1[0]]}</a>||奖品：{$title[$key1[0]]}
👥<a href=\"{$history11[$key1[1]]}\">{$chat_title[$key1[1]]}</a>||奖品：{$title[$key1[1]]}
👥<a href=\"{$history11[$key1[2]]}\">{$chat_title[$key1[2]]}</a>||奖品：{$title[$key1[2]]}
👥<a href=\"{$history11[$key1[3]]}\">{$chat_title[$key1[3]]}</a>||奖品：{$title[$key1[3]]}
👥<a href=\"{$history11[$key1[4]]}\">{$chat_title[$key1[4]]}</a>||奖品：{$title[$key1[4]]}
👥<a href=\"{$history11[$key1[5]]}\">{$chat_title[$key1[5]]}</a>||奖品：{$title[$key1[5]]}
👥<a href=\"{$history11[$key1[6]]}\">{$chat_title[$key1[6]]}</a>||奖品：{$title[$key1[6]]}
👥<a href=\"{$history11[$key1[7]]}\">{$chat_title[$key1[7]]}</a>||奖品：{$title[$key1[7]]}
👥<a href=\"{$history11[$key1[8]]}\">{$chat_title[$key1[8]]}</a>||奖品：{$title[$key1[8]]}
👥<a href=\"{$history11[$key1[9]]}\">{$chat_title[$key1[9]]}</a>||奖品：{$title[$key1[9]]}
------------------------------------------
" 
        ;
        



        /*if ($text === '') {
            return $this->replyToChat('Command usage: ' . $this->getUsage());
        }*/

        return $this->replyToChat($date1,['parse_mode' => 'html','disable_web_page_preview' => true,'reply_markup' => $inline_keyboard]);
    }
}

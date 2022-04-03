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
 * Callback query command
 *
 * This command handles all callback queries sent via inline keyboard buttons.
 *
 * @see InlinekeyboardCommand.php
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;


use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;


// Using Medoo namespace
use Medoo\Medoo;

class CallbackqueryCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'callbackquery';

    /**
     * @var string
     */
    protected $description = 'Handle the callback query';

    /**
     * @var string
     */
    protected $version = '1.2.0';

    /**
     * Main command execution
     *
     * @return ServerResponse
     * @throws \Exception
     */
    public function execute(): ServerResponse
    {
        // Callback query data can be fetched and handled accordingly.
        $callback_query = $this->getCallbackQuery();
        $callback_data  = $callback_query->getData();
        
        
        
        
        
        $text22 = $callback_query->getMessage();
        
        $text33 = $text22->getText();
        
        $newab = substr($text33,0,stripos($text33,' '));
        

        if ($newab == 'search') {
        
        
        $newa = substr($text33,7,(stripos($text33,':'))-7);
        
        
        
        
$config = require __DIR__ . '/../../config.php';

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => ($config['database']['database']),
    'server' => ($config['database']['host']),
    'username' => ($config['database']['user']),
    'password' => ($config['database']['password'])
]);

        
    $serach = $database->select("dp_tgbot_lottery", "chat_url", [
    "chat_url[!]" => null,
    "AND" => [
	"OR" => [
		"chat_title[~]" => "$newa",
		"title[~]" => "$newa",
	]
	]
]);

//shuffle($serach);       
$serach1 = (array_unique($serach));
$key1 = array_keys($serach1);

    $chat_title = $database->select("dp_tgbot_lottery", "chat_title", [
    "chat_url[!]" => null,
    "AND" => [
	"OR" => [
		"chat_title[~]" => "$newa",
		"title[~]" => "$newa",
	]
	]
]);
        
        
        
        
        $page11 = $callback_query->getMessage();
        $page22 = $page11->getReplyMarkup()->getInlineKeyboard();
        list($page33) = $page22;
        list($pagea,$pageb,$pagec) = $page33;
        //list($pageaa,$pagebb,$pagecc,$pagedd) = $pageb;
        $page44 = substr($pageb,9,stripos($pageb,'","')-9);
        //$page44 = substr($pageb,0,20);
        
        
        if ($callback_data == 1) {
            $nowpage = $page44 + 1;
        }
        elseif ($callback_data == -1) {
            $nowpage = $page44 - 1;
        }
        else {
            $nowpage = 1;
        }
        
        
        $page = ($nowpage - 1)*10;
        
        

        $aa = count($key1) -1;
        $aa1 = $aa - ($aa%10);
        $last_page = ($aa1 / 10) + 1;
        
        
        
        if ($nowpage < 1) {
            return $callback_query->answer([
            'text'       => '已经是第一页了',
            //'show_alert' => (bool) random_int(0, 1), // Randomly show (or not) as an alert.
            //'cache_time' => 5,
        ]);
        }
        
        if ($last_page < $nowpage) {
            return $callback_query->answer([
            'text'       => '已经是最后一页了',
            //'show_alert' => (bool) random_int(0, 1), // Randomly show (or not) as an alert.
            //'cache_time' => 5,
        ]);
        }
        
        
        
        
        
if ($chat_title[$key1[1+$page]]!=null) $g1 = "👥";
if ($chat_title[$key1[2+$page]]!=null) $g2 = "👥";
if ($chat_title[$key1[3+$page]]!=null) $g3 = "👥";
if ($chat_title[$key1[4+$page]]!=null) $g4 = "👥";
if ($chat_title[$key1[5+$page]]!=null) $g5 = "👥";
if ($chat_title[$key1[6+$page]]!=null) $g6 = "👥";
if ($chat_title[$key1[7+$page]]!=null) $g7 = "👥";
if ($chat_title[$key1[8+$page]]!=null) $g8 = "👥";
if ($chat_title[$key1[9+$page]]!=null) $g9 = "👥";




if ($chat_title[$key1[1+$page]]!=null) $n1 = "\n";
if ($chat_title[$key1[2+$page]]!=null) $n2 = "\n";
if ($chat_title[$key1[3+$page]]!=null) $n3 = "\n";
if ($chat_title[$key1[4+$page]]!=null) $n4 = "\n";
if ($chat_title[$key1[5+$page]]!=null) $n5 = "\n";
if ($chat_title[$key1[6+$page]]!=null) $n6 = "\n";
if ($chat_title[$key1[7+$page]]!=null) $n7 = "\n";
if ($chat_title[$key1[8+$page]]!=null) $n8 = "\n";
if ($chat_title[$key1[9+$page]]!=null) $n9 = "\n";
        
        
        
        
        
        
        $callback_query_id = $callback_query->getId();
        
        $message_id = $callback_query->getMessage()->getMessageId();

        $user_id = $callback_query->getMessage()->getChat()->getId();
        $text    = "search $newa:
------------------------------------------
👥<a href=\"{$serach1[$key1[0+$page]]}\">{$chat_title[$key1[0+$page]]}</a>$n1$g1<a href=\"{$serach1[$key1[1+$page]]}\">{$chat_title[$key1[1+$page]]}</a>$n2$g2<a href=\"{$serach1[$key1[2+$page]]}\">{$chat_title[$key1[2+$page]]}</a>$n3$g3<a href=\"{$serach1[$key1[3+$page]]}\">{$chat_title[$key1[3+$page]]}</a>$n4$g4<a href=\"{$serach1[$key1[4+$page]]}\">{$chat_title[$key1[4+$page]]}</a>$n5$g5<a href=\"{$serach1[$key1[5+$page]]}\">{$chat_title[$key1[5+$page]]}</a>$n6$g6<a href=\"{$serach1[$key1[6+$page]]}\">{$chat_title[$key1[6+$page]]}</a>$n7$g7<a href=\"{$serach1[$key1[7+$page]]}\">{$chat_title[$key1[7+$page]]}</a>$n8$g8<a href=\"{$serach1[$key1[8+$page]]}\">{$chat_title[$key1[8+$page]]}</a>$n9$g9<a href=\"{$serach1[$key1[9+$page]]}\">{$chat_title[$key1[9+$page]]}</a>
------------------------------------------
" 
        ;

                $inline_keyboard = new InlineKeyboard([
            ['text' => '上一页', 'callback_data' => '-1'],
            ['text' => "$nowpage", 'callback_data' => $newa],
            ['text' => '下一页', 'callback_data' => '1'],
        ]);

                $data = [
                    'chat_id'      => $user_id,
                    'text'         => $text,
                    'reply_markup' => $inline_keyboard,
                    'message_id'   => $message_id,
                    'parse_mode' => 'html',
                    'disable_web_page_preview' => true,
                ];
                
                
                /*$data = [
                    'chat_id'      => $user_id,
                    'text'         => $text,
                    'message_id'   => $message_id,
                ];*/
}elseif ($newab == 'history') {
    
    
    
    
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
//$key = array_search(end($history11),$history11);
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





        $page11 = $callback_query->getMessage();
        $page22 = $page11->getReplyMarkup()->getInlineKeyboard();
        list($page33) = $page22;
        list($pagea,$pageb,$pagec) = $page33;
        //list($pageaa,$pagebb,$pagecc,$pagedd) = $pageb;
        $page44 = substr($pageb,9,stripos($pageb,'","')-9);
        //$page44 = substr($pageb,0,20);
        
        
        if ($callback_data == 1) {
            $nowpage = $page44 + 1;
        }
        elseif ($callback_data == -1) {
            $nowpage = $page44 - 1;
        }
        else {
            $nowpage = 1;
        }
        
        
        $page = ($nowpage - 1)*10;
        
        

        $aa = count($key1) -1;
        $aa1 = $aa - ($aa%10);
        $last_page = ($aa1 / 10) + 1;
        // 获取最后一个键名 之后用键名减去与10的模 再除以10
        
        
        if ($nowpage < 1) {
            return $callback_query->answer([
            'text'       => '已经是第一页了',
            //'show_alert' => (bool) random_int(0, 1), // Randomly show (or not) as an alert.
            //'cache_time' => 5,
        ]);
        }
        
        if ($last_page < $nowpage) {
            return $callback_query->answer([
            'text'       => '已经是最后一页了',
            //'show_alert' => (bool) random_int(0, 1), // Randomly show (or not) as an alert.
            //'cache_time' => 5,
        ]);
        }
        




        
        
        
        
        $callback_query_id = $callback_query->getId();
        
        $message_id = $callback_query->getMessage()->getMessageId();
          //$message_id = $callback_query->getId();
          //$message_id = 639;
        $user_id = $callback_query->getMessage()->getChat()->getId();
        
        //$message = $this->getMessage();
        //$text    = $message->getText(true);
        
        $text =
        "history :
------------------------------------------
👥<a href=\"{$history11[$key1[0+$page]]}\">{$chat_title[$key1[0+$page]]}</a>||奖品：{$title[$key1[0+$page]]}
👥<a href=\"{$history11[$key1[1+$page]]}\">{$chat_title[$key1[1+$page]]}</a>||奖品：{$title[$key1[1+$page]]}
👥<a href=\"{$history11[$key1[2+$page]]}\">{$chat_title[$key1[2+$page]]}</a>||奖品：{$title[$key1[2+$page]]}
👥<a href=\"{$history11[$key1[3+$page]]}\">{$chat_title[$key1[3+$page]]}</a>||奖品：{$title[$key1[3+$page]]}
👥<a href=\"{$history11[$key1[4+$page]]}\">{$chat_title[$key1[4+$page]]}</a>||奖品：{$title[$key1[4+$page]]}
👥<a href=\"{$history11[$key1[5+$page]]}\">{$chat_title[$key1[5+$page]]}</a>||奖品：{$title[$key1[5+$page]]}
👥<a href=\"{$history11[$key1[6+$page]]}\">{$chat_title[$key1[6+$page]]}</a>||奖品：{$title[$key1[6+$page]]}
👥<a href=\"{$history11[$key1[7+$page]]}\">{$chat_title[$key1[7+$page]]}</a>||奖品：{$title[$key1[7+$page]]}
👥<a href=\"{$history11[$key1[8+$page]]}\">{$chat_title[$key1[8+$page]]}</a>||奖品：{$title[$key1[8+$page]]}
👥<a href=\"{$history11[$key1[9+$page]]}\">{$chat_title[$key1[9+$page]]}</a>||奖品：{$title[$key1[9+$page]]}
------------------------------------------
" 
        ;
    
    
    
        
        $inline_keyboard = new InlineKeyboard([
            ['text' => '上一页', 'callback_data' => '-1'],
            ['text' => ($nowpage), 'callback_data' => '10'],
            ['text' => '下一页', 'callback_data' => '1'],
        ]);

                $data = [
                    'chat_id'      => $user_id,
                    'text'         => $text,
                    'reply_markup' => $inline_keyboard,
                    'message_id'   => $message_id,
                    'parse_mode' => 'html',
                    'disable_web_page_preview' => true,
                ];
    
    
    
};












return Request::editMessageText($data);
//return Request::sendMessage($data);
        

        /*return $callback_query->answer([
            'text'       => 'Content of the callback data: ' . $callback_data,
            'show_alert' => (bool) random_int(0, 1), // Randomly show (or not) as an alert.
            'cache_time' => 5,
        ]);*/
    }
}

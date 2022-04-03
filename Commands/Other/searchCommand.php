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
//namespace Longman\TelegramBot\Commands\SystemCommands;


use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

// Using Medoo namespace
use Medoo\Medoo;


class searchCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'search';

    /**
     * @var string
     */
    protected $description = '关键字搜索';

    /**
     * @var string
     */
    protected $usage = '/search 要搜索的内容。示例：/search vps 搜索vps相关内容';

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
        


    
        $message = $this->getMessage();
        //$text    = $message->getText(true);
        $text1 = $message->getText(true);
        //$text    = 近期上线;
        
        if ($text1 === '') {
            return $this->replyToChat('命令用法: ' . $this->getUsage());
        }
        
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
		"chat_title[~]" => "$text1",
		"title[~]" => "$text1",
	]
	]
]);

    
$serach1 = (array_unique($serach));
$key1 = array_keys($serach1);

    $chat_title = $database->select("dp_tgbot_lottery", "chat_title", [
    "chat_url[!]" => null,
    "AND" => [
	"OR" => [
		"chat_title[~]" => "$text1",
		"title[~]" => "$text1",
	]
	]
]);


        if ($serach1 == null) {
            return $this->replyToChat('没有找到相关结果 :( ');
        }



          $page = 1;

       
       $inline_keyboard = new InlineKeyboard([
            ['text' => '上一页', 'callback_data' => '-1'],
            ['text' => ($page), 'callback_data' => $text1],
            ['text' => '下一页', 'callback_data' => '1'],
        ]);



$date11 = aaa;



if ($chat_title[$key1[1]]!=null) $g1 = "👥";
if ($chat_title[$key1[2]]!=null) $g2 = "👥";
if ($chat_title[$key1[3]]!=null) $g3 = "👥";
if ($chat_title[$key1[4]]!=null) $g4 = "👥";
if ($chat_title[$key1[5]]!=null) $g5 = "👥";
if ($chat_title[$key1[6]]!=null) $g6 = "👥";
if ($chat_title[$key1[7]]!=null) $g7 = "👥";
if ($chat_title[$key1[8]]!=null) $g8 = "👥";
if ($chat_title[$key1[9]]!=null) $g9 = "👥";




if ($chat_title[$key1[1]]!=null) $n1 = "\n";
if ($chat_title[$key1[2]]!=null) $n2 = "\n";
if ($chat_title[$key1[3]]!=null) $n3 = "\n";
if ($chat_title[$key1[4]]!=null) $n4 = "\n";
if ($chat_title[$key1[5]]!=null) $n5 = "\n";
if ($chat_title[$key1[6]]!=null) $n6 = "\n";
if ($chat_title[$key1[7]]!=null) $n7 = "\n";
if ($chat_title[$key1[8]]!=null) $n8 = "\n";
if ($chat_title[$key1[9]]!=null) $n9 = "\n";






        $date1 =
        "search $text1:
------------------------------------------
👥<a href=\"{$serach1[$key1[0]]}\">{$chat_title[$key1[0]]}</a>$n1$g1<a href=\"{$serach1[$key1[1]]}\">{$chat_title[$key1[1]]}</a>$n2$g2<a href=\"{$serach1[$key1[2]]}\">{$chat_title[$key1[2]]}</a>$n3$g3<a href=\"{$serach1[$key1[3]]}\">{$chat_title[$key1[3]]}</a>$n4$g4<a href=\"{$serach1[$key1[4]]}\">{$chat_title[$key1[4]]}</a>$n5$g5<a href=\"{$serach1[$key1[5]]}\">{$chat_title[$key1[5]]}</a>$n6$g6<a href=\"{$serach1[$key1[6]]}\">{$chat_title[$key1[6]]}</a>$n7$g7<a href=\"{$serach1[$key1[7]]}\">{$chat_title[$key1[7]]}</a>$n8$g8<a href=\"{$serach1[$key1[8]]}\">{$chat_title[$key1[8]]}</a>$n9$g9<a href=\"{$serach1[$key1[9]]}\">{$chat_title[$key1[9]]}</a>
------------------------------------------
" 
        ;


        
        

        
        


        return $this->replyToChat($date1,['parse_mode' => 'html','disable_web_page_preview' => true,'reply_markup' => $inline_keyboard]);
        
        /*return $this->replyToChat('Inline Keyboard',[
            'reply_markup' => $inline_keyboard,
        ]);*/
        
    }
}

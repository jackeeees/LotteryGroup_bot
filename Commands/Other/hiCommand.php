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


// Using Medoo namespace
use Medoo\Medoo;





class hiCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'hi';

    /**
     * @var string
     */
    protected $description = '随便看看';

    /**
     * @var string
     */
    protected $usage = '/hi <text>';

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
     
     
    protected $need_mysql = true;

    /**
     * Command execute method if MySQL is required but not available
     *
     * @return ServerResponse
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




 $chat_url = $database->select("dp_tgbot_lottery", "chat_url", [
	//"status" => 1,
	"chat_url[!]" => null 
]);


$chat_title = $database->select("dp_tgbot_lottery", "chat_title", [
	//"status" => 1,
	"chat_url[!]" => null 
]);

$title = $database->select("dp_tgbot_lottery", "title", [
	"chat_url[!]" => null 
]);

$status = $database->select("dp_tgbot_lottery", "status", [
	"chat_url[!]" => null 
]);

$chat_url1 = (array_unique($chat_url));
$chat_title1 = (array_unique($chat_title));
$chat_url1_key = array_keys($chat_url1);
$chat_title1_key = array_keys($chat_title1);

        $status_code = [
            '-1'=> '已关闭',
            '0' => '已开奖',
            '1' => '待开奖',
        ];

$rand_n = array_rand($chat_url1,10);


$data3 = 
"
------------------------------------------
👥<a href=\"{$chat_url1[$rand_n[0]]}\">{$chat_title[$rand_n[0]]}</a>||奖品：{$title[$rand_n[0]]}||状态：{$status_code[$status[$rand_n[0]]]}
👥<a href=\"{$chat_url1[$rand_n[1]]}\">{$chat_title[$rand_n[1]]}</a>||奖品：{$title[$rand_n[1]]}||状态：{$status_code[$status[$rand_n[1]]]}
👥<a href=\"{$chat_url1[$rand_n[2]]}\">{$chat_title[$rand_n[2]]}</a>||奖品：{$title[$rand_n[2]]}||状态：{$status_code[$status[$rand_n[2]]]}
👥<a href=\"{$chat_url1[$rand_n[3]]}\">{$chat_title[$rand_n[3]]}</a>||奖品：{$title[$rand_n[3]]}||状态：{$status_code[$status[$rand_n[3]]]}
👥<a href=\"{$chat_url1[$rand_n[3]]}\">{$chat_title[$rand_n[4]]}</a>||奖品：{$title[$rand_n[4]]}||状态：{$status_code[$status[$rand_n[4]]]}
👥<a href=\"{$chat_url1[$rand_n[5]]}\">{$chat_title[$rand_n[5]]}</a>||奖品：{$title[$rand_n[5]]}||状态：{$status_code[$status[$rand_n[5]]]}
👥<a href=\"{$chat_url1[$rand_n[6]]}\">{$chat_title[$rand_n[6]]}</a>||奖品：{$title[$rand_n[6]]}||状态：{$status_code[$status[$rand_n[6]]]}
👥<a href=\"{$chat_url1[$rand_n[7]]}\">{$chat_title[$rand_n[7]]}</a>||奖品：{$title[$rand_n[7]]}||状态：{$status_code[$status[$rand_n[7]]]}
👥<a href=\"{$chat_url1[$rand_n[8]]}\">{$chat_title[$rand_n[8]]}</a>||奖品：{$title[$rand_n[8]]}||状态：{$status_code[$status[$rand_n[8]]]}
👥<a href=\"{$chat_url1[$rand_n[9]]}\">{$chat_title[$rand_n[9]]}</a>||奖品：{$title[$rand_n[9]]}||状态：{$status_code[$status[$rand_n[9]]]}
------------------------------------------
" 
;    

    
 

                    
    	//$data1 = 111111;

    	
    	
        $message = $this->getMessage();
        $text    = $message->getText(true);

        /*if ($text === '') {
            return $this->replyToChat('Command usage: ' . $this->getUsage());
        }*/

        return $this->replyToChat($data3,['parse_mode' => 'html','disable_web_page_preview' => true]);
    }
}
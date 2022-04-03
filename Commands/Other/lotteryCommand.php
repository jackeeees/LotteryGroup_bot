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


// Using Medoo namespace
use Medoo\Medoo;



class lotteryCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'lottery';

    /**
     * @var string
     */
    protected $description = '随机列出即将开奖的群组';

    /**
     * @var string
     */
    protected $usage = '/lottery <text>';

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




$hot11 = $database->query("create TEMPORARY TABLE aaa as SELECT id,chat_url,chat_title,title,ban,hot, ifnull(condition_hot,0)-ifnull(hot,0)AS bbb FROM dp_tgbot_lottery")->fetchAll();
$hot111 = $database->query("SELECT * FROM aaa WHERE bbb > 0 and bbb <=100 and chat_url!='null' and ban = 0 and hot!=0")->fetchAll();
shuffle($hot111);
$hot1111 = $database->query("DROP TABLE aaa")->fetchAll();

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

$timeaa = time()+604800;

$time = $database->select("dp_tgbot_lottery", "*", [
    "AND" => [
	"chat_url[!]" => null,
	"condition_time[>=]" => time(),
	"condition_time[<=]" => $timeaa,
	]
]);



shuffle($time);



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


if ($time[0][title]!=null) $g0 = "👥";
if ($time[1][title]!=null) $g1 = "👥";
if ($time[2][title]!=null) $g2 = "👥";
if ($time[3][title]!=null) $g3 = "👥";
if ($time[4][title]!=null) $g4 = "👥";

if ($hot111[0][title]!=null) $g5 = "👥";
if ($hot111[1][title]!=null) $g6 = "👥";
if ($hot111[2][title]!=null) $g7 = "👥";
if ($hot111[3][title]!=null) $g8 = "👥";
if ($hot111[4][title]!=null) $g9 = "👥";
if ($hot111[5][title]!=null) $g10 = "👥";
if ($hot111[6][title]!=null) $g11 = "👥";
if ($hot111[7][title]!=null) $g12 = "👥";
if ($hot111[8][title]!=null) $g13 = "👥";
if ($hot111[9][title]!=null) $g14 = "👥";

    
if ($time[0][title]!=null) $t0 = "||奖品：";
if ($time[1][title]!=null) $t1 = "||奖品：";
if ($time[2][title]!=null) $t2 = "||奖品：";
if ($time[3][title]!=null) $t3 = "||奖品：";
if ($time[4][title]!=null) $t4 = "||奖品：";
if ($hot111[0][title]!=null) $t5 = "||奖品：";
if ($hot111[1][title]!=null) $t6 = "||奖品：";
if ($hot111[2][title]!=null) $t7 = "||奖品：";
if ($hot111[3][title]!=null) $t8 = "||奖品：";
if ($hot111[4][title]!=null) $t9 = "||奖品：";

if ($time[0][title]!=null) $n0 = "\n";
if ($time[1][title]!=null) $n1 = "\n";
if ($time[2][title]!=null) $n2 = "\n";
if ($time[3][title]!=null) $n3 = "\n";
if ($time[4][title]!=null) $n4 = "\n";


if ($time[0][title]==null) $h0 = "{$g5}<a href=\"{$hot111[5][chat_url]}\">{$hot111[5][chat_title]}</a>$t6{$hot111[5][title]}";
if ($time[1][title]==null) $h1 = "{$g6}<a href=\"{$hot111[6][chat_url]}\">{$hot111[6][chat_title]}</a>$t6{$hot111[6][title]}";
if ($time[2][title]==null) $h2 = "{$g7}<a href=\"{$hot111[7][chat_url]}\">{$hot111[7][chat_title]}</a>$t6{$hot111[7][title]}";
if ($time[3][title]==null) $h3 = "{$g8}<a href=\"{$hot111[8][chat_url]}\">{$hot111[8][chat_title]}</a>$t6{$hot111[8][title]}";
if ($time[4][title]==null) $h4 = "{$g9}<a href=\"{$hot111[9][chat_url]}\">{$hot111[9][chat_title]}</a>$t6{$hot111[9][title]}";


$data3 = 
"lottery :
------------------------------------------
{$g0}<a href=\"{$time[0][chat_url]}\">{$time[0][chat_title]}</a>$t0{$time[0][title]}{$n0}{$g1}<a href=\"{$time[1][chat_url]}\">{$time[1][chat_title]}</a>$t1{$time[1][title]}{$n1}{$g2}<a href=\"{$time[2][chat_url]}\">{$time[2][chat_title]}</a>$t2{$time[2][title]}{$n2}{$g3}<a href=\"{$time[3][chat_url]}\">{$time[3][chat_title]}</a>$t3{$time[3][title]}{$n3}{$g4}<a href=\"{$time[4][chat_url]}\">{$time[4][chat_title]}</a>$t4{$time[4][title]}{$n4}
{$g5}<a href=\"{$hot111[0][chat_url]}\">{$hot111[0][chat_title]}</a>$t5{$hot111[0][title]}
{$g6}<a href=\"{$hot111[1][chat_url]}\">{$hot111[1][chat_title]}</a>$t6{$hot111[1][title]}
{$g7}<a href=\"{$hot111[2][chat_url]}\">{$hot111[2][chat_title]}</a>$t7{$hot111[2][title]}
{$g8}<a href=\"{$hot111[3][chat_url]}\">{$hot111[3][chat_title]}</a>$t8{$hot111[3][title]}
{$g9}<a href=\"{$hot111[4][chat_url]}\">{$hot111[4][chat_title]}</a>$t9{$hot111[4][title]}{$h0}{$h1}{$h2}{$h3}{$h4}
------------------------------------------
" 
;    

    
 

    	//$data1 = ($config['database']['user']);

    	
        $message = $this->getMessage();
        $text    = $message->getText(true);

        /*if ($text === '') {
            return $this->replyToChat('Command usage: ' . $this->getUsage());
        }*/

        return $this->replyToChat($data3,['parse_mode' => 'html','disable_web_page_preview' => true]);
    }
}
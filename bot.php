<?php

$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = '2iyR1ZsfHcaoakB6yPNgg3x3dxbVx/1aW/c9qjLl+GijxhTzNKB2jvGW6gJjXFMXPT9WyUp4zEY1vPoELYrbuKbYOAoOXcpMXz/glQZ2PQv/0tkswxzeQlZPLe3ErSNB+4o9Rdb+QYGAaOF+lhmwuAdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'b804ccf0489232ead1578568bd45b8af';

$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

if ( sizeof($request_array['events']) > 0 ) 
{

    foreach ($request_array['events'] as $event) 
    {

        $reply_message = '';
        $reply_token = $event['replyToken'];
###########################################
        
        
       /// $text = $event['message']['text'];
        
if( $event['message']['type'] == 'text' ) {
/////////////////////////////////////////
if( $event['message']['text'] == 'บอท' ) {
$text = 'บอทอยู่นี่ มีอะไรให้บอทรับใช้เหรอ';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }

else if( $event['message']['text'] == 'สวัสดี' ) {
$text = 'สวัสดีค่ะ :)';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }

else if( $event['message']['text'] == 'สอบถาม' ) {
$text = 'อยากทราบข้อมูลอะไรคะ?';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }

else if( $event['message']['text'] == 'ข้อมูลการอบรม' ) {
$text = 'ท่านสามารถดูหลักสูตรการอบรมได้จากลิงค์ด้านล่างนี้
https://drive.google.com/file/d/197qJTqLWqK9xsR7sV1ZzEBygtep2PDeN/view?usp=sharing';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text , $text2 ]]
];
    }

else if( $event['message']['text'] == 'วันที่' ) {
$text = 'https://drive.google.com/file/d/1sZZkl78nfFnL3xQg-RMtLRNkZT0q7xB5/view?usp=sharing';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }

else if( $event['message']['text'] == 'วิธีเข้าใช้งาน Web Mail TMT Steel จากภายนอก' ) {
$text = 'https://drive.google.com/file/d/1udeYpsVJ_wBF-oV6TcOaynkPlh7xc3Uh/view?usp=sharing';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }

else if( $event['message']['text'] == 'ติดต่อเจ้าหน้าที่' ) {
$text = '
0879218255 = คุณเพชราภา (ออม)
0987101382 = คุณอรวรา (หมิว)

';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }

else if( $event['message']['text'] == 'Email' ) {
$text = '
petcharapa_t@TMT.COM = คุณเพชราภา (ออม)
onwara_k@TMT.COM = คุณอรวรา (หมิว)

';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
];
    }


////////////////////////////////////////
else
$text = 'ดิฉันขออภัยที่ยังไม่ค่อยเข้าใจในคำถาม กรุณาเปลี่ยนคำถามหรือใช้คำที่ใกล้เคียง ดิฉันขอแนะนำ อย่างเช่น

- ข้อมูลการอบรม
- ติดต่อเจ้าหน้าที่ 
';
$data = [
'replyToken' => $reply_token,
'messages' => [['type' => 'text', 'text' => $text ]]
         ];
}
        
        
###########################################    
      // $data = [
       //     'replyToken' => $reply_token,
            // 'messages' => [['type' => 'text', 'text' => json_encode($request_array) ]]  Debug Detail message
       //    'messages' => [['type' => 'text', 'text' => $text ]]
       //];
       $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

      $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
    }
}
 
// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
// include composer autoload
require "vendor/autoload.php";
 
// การตั้งเกี่ยวกับ bot
require_once 'bot_settings.php';
 
// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");
 
///////////// ส่วนของการเรียกใช้งาน class ผ่าน namespace
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
 
// เชื่อมต่อกับ LINE Messaging API
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
 
// คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');
 
// แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $typeMessage = $events['events'][0]['message']['type'];
    $userMessage = $events['events'][0]['message']['text'];
    $userMessage = strtolower($userMessage);
    switch ($typeMessage){
        case 'text':
            switch ($userMessage) {
                case "t":
                    $textReplyMessage = "Bot ตอบกลับคุณเป็นข้อความ";
                    $replyData = new TextMessageBuilder($textReplyMessage);
                    break;
                case "i":
                    $picFullSize = 'https://sv1.picz.in.th/images/2021/02/15/oQ57aW.md.jpg';
                    $picThumbnail = 'https://sv1.picz.in.th/images/2021/02/15/oQ57aW.md.jpg';
                    $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
                    break;
                case "v":
                    $picThumbnail = 'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/240';
                    $videoUrl = "https://www.mywebsite.com/simplevideo.mp4";                
                    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
                    break;
                case "a":
                    $audioUrl = "https://www.mywebsite.com/simpleaudio.mp3";
                    $replyData = new AudioMessageBuilder($audioUrl,27000);
                    break;
                case "l":
                    $placeName = "ที่ตั้งร้าน";
                    $placeAddress = "แขวง พลับพลา เขต วังทองหลาง กรุงเทพมหานคร ประเทศไทย";
                    $latitude = 13.780401863217657;
                    $longitude = 100.61141967773438;
                    $replyData = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);              
                    break;
                case "s":
                    $stickerID = 22;
                    $packageID = 2;
                    $replyData = new StickerMessageBuilder($packageID,$stickerID);
                    break;      
                case "im":
                    $imageMapUrl = 'https://www.mywebsite.com/imgsrc/photos/w/sampleimagemap';
                    $replyData = new ImagemapMessageBuilder(
                        $imageMapUrl,
                        'This is Title',
                        new BaseSizeBuilder(699,1040),
                        array(
                            new ImagemapMessageActionBuilder(
                                'test image map',
                                new AreaBuilder(0,0,520,699)
                                ),
                            new ImagemapUriActionBuilder(
                                'http://www.ninenik.com',
                                new AreaBuilder(520,0,520,699)
                                )
                        )); 
                    break;          
                case "tm":
                    $replyData = new TemplateMessageBuilder('Confirm Template',
                        new ConfirmTemplateBuilder(
                                'Confirm template builder',
                                array(
                                    new MessageTemplateActionBuilder(
                                        'Yes',
                                        'Text Yes'
                                    ),
                                    new MessageTemplateActionBuilder(
                                        'No',
                                        'Text NO'
                                    )
                                )
                        )
                    );
                    break;                                                                                                                          
                default:
                    $textReplyMessage = " คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                    $replyData = new TextMessageBuilder($textReplyMessage);         
                    break;                                      
            }
            break;
        default:
            $textReplyMessage = json_encode($events);
            $replyData = new TextMessageBuilder($textReplyMessage);         
            break;  
    }
}
 
//l ส่วนของคำสั่งตอบกลับข้อความ
$response = $bot->replyMessage($replyToken,$replyData);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}
 
// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();


echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>

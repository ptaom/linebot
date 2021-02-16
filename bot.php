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

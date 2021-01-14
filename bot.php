<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'pD9O8KOQ9ZyPLuRTGJ2hNqgAXjRf3701Xxuxpv974cufmEJvgpRjJdo1zyABFsBwn0wDE1oh+m1Pb78jzc3uRkJbhHvjVM4mI9US1uRLUGd4GZcHzKk631K/bBFO1ZO/+B5cBidnNKIcvkjbW/7OJgdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'bfa7391654f98b45b26929b39afdeb63';


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
if( $event['message']['text'] == 'บอทจ๋า' ) {
$text = 'บอทจ๋าอยู่นี่ มีอะไรให้บอทจ๋ารับใช้เหรอ';
}
else if( $event['message']['text'] == 'สวัสดี' ) {
$text = 'ซาหวาดดีคร๊าบบท่านสมาชิกชมรม....';
    }
else if( $event['message']['text'] == 'ทดสอบ' ) {
$text = 'สอบใหญ่ หรือ สอบย่อย';
    }
else if( $event['message']['text'] == 'เทส' ) {
$text = 'https://drive.google.com/file/d/197qJTqLWqK9xsR7sV1ZzEBygtep2PDeN/view?usp=sharing';
    }
else if( $event['message']['text'] == 'IT REQUEST' ) {
$text = 'T:\TMTWANGNOI\Information Technology\Documents\1. DocumentS List\S-FM-IT-02  R03 IT SERVICE FORM.xls';
    }
else if( $event['message']['text'] == 'แบบฟอร์มขอใช้ USB' ) {
$text = '<a href="T:\TMTWANGNOI\Information Technology\Documents\1. DocumentS List\REQUEST FORM PERIPHERAI.pdf">REQUEST</a>';
    }
else if( $event['message']['text'] == 'เบอร์โทร IT' ) {
$text = '
4280 = คุณปราโมทย์ (พี่โมทย์)
4281 = คุณถนัดกิจ (น้องนัด)
4282 = คุณนพดล (พี่นัด)
4283 = คุณปริญญารัตน์ (น้องฟิล์ม)
4284 = คุณเฉลิมศักดิ์ (พี่ซีเค)
4285 = คุณเอนกแสงนาค (น้องไอ๊ซ์)
';
    }
else if( $event['message']['text'] == 'Email IT' ) {
$text = '
pramote@TMT.COM = คุณปราโมทย์ (พี่โมทย์)
tanadkij@TMT.COM = คุณถนัดกิจ (น้องนัด)
noppadon@TMT.COM = คุณนพดล (พี่นัด)
parinyarat@TMT.COM = คุณปริญญารัตน์ (น้องฟิล์ม)
chalermsak@TMT.COM = คุณเฉลิมศักดิ์ (พี่ซีเค)
anake@TMT.COM = คุณเอนกแสงนาค (น้องไอ๊ซ์)
';
    }
////////////////////////////////////////
else
$text = 'ดิฉันขออภัยที่ยังไม่ค่อยเข้าใจในคำถาม กรุณาเปลี่ยนคำถามหรือใช้คำที่ใกล้เคียง
ดำฉันขอแนะนำ อย่าเช่น
- IT REQUEST
- แบบฟอร์มขอใช้ USB
- เบอร์โทร IT
- Email IT
';
    
}
        
        
###########################################    
       $data = [
            'replyToken' => $reply_token,
            // 'messages' => [['type' => 'text', 'text' => json_encode($request_array) ]]  Debug Detail message
           'messages' => [['type' => 'text', 'text' => $text ]]
       ];
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

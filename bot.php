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
$text = 'เกิดมาเพิ่งรู้ว่าหวัดดี';
    }
else if( $event['message']['text'] == 'ทดสอบ' ) {
$text = 'สอบใหญ่ หรือ สอบย่อย';
    }
else if( $event['message']['text'] == 'เทส' ) {
$text = 'เทสสสส';
    }   
////////////////////////////////////////
else
$text = 'ประวิท : ไม่รู้! ไม่รู้! ไม่รู้!';       
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

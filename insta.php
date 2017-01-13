<?php
//neveshteh shode tvasatoe #elyas #galikeshi @sudo_avenger
ob_start();
//token ro inja vared konid
define('API_KEY','[TOKEN]');
$admin = "[ADMIN]";
$admin2 = "125858918";
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$fname = $message->chat->first_name;
$uname = $message->chat->username;
$text1 = $message->text;
$fadmin = $message->from->id;
$chatid = $update->callback_query->message->chat->id;
if($text1=="/start"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"با سلام به ربات اینستا دانلودر خوش آمدید\n\nلطفا لینک پست اینستاگرامتون رو بفرستید تا براتون دانش کنم و بفرستمش😘"
	]);
	}	
		elseif($text1=="/creator"){
			bot('sendmessage',[
			'chat_id'=>$chat_id,
			'text'=>"این ڔبات توسط @phpfun_bot ساخته شده است",
			]);
			}
		
			
				else{
		$instalink="http://down-roid.ir/vip8.php?url=$text1";
		$insta=json_decode(file_get_contents($instalink),trur);
		$ok=$insta['ok'];
		$photo=$insta['aks'];
		$video=$insta['video'];
		if($ok=="false"){
			bot('sendmessage',[
			'chat_id'=>$chat_id,
			'text'=>"لینک شما نامبعتر و غلط میباشد⛔",
			]);
			}elseif($photo=="false")
{
bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>$video,
'caption'=>"فیلم شما دانلود شد✅",
]);

}		else{
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>"عکس شما دانلود شد✅",
]);

}
		}
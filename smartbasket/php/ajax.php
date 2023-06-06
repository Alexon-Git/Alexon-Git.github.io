<?php
// Токен телеграм бота
$tg_bot_token = "6291208582:AAHVvvncY75WQX2iZ1rJYHT1B7Iwrj9fRQE";
// ID Чата
$chat_id = "-1001915292500";

$text = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['userName']) ) {
		if(empty($_POST['userName'])) {
			echo 'notName';
		} else {
			$name = "Имя: " . strip_tags($_POST['userName']) . "; ";
		}
	}
	if (isset($_POST['userTel']) ) {
		if(empty($_POST['userTel'])) {
			echo 'notTel';
		} else {
			$tel = "Телефон: " . strip_tags($_POST['userTel']) . "; ";
		}
	}

	if (isset($_POST['userEmail']) ) {
		if(empty($_POST['userEmail'])) {
			echo 'notEmail';
		} else {
			$email = "Email: " . strip_tags($_POST['userEmail']) . "; ";
		}
	}

//			if (isset($_POST['agreement']) ) {
//					echo 'agreement';
//					if(empty($_POST['agreement'])) {
//							echo 'agreement';
//					} else {
//							$agreement = "Соглашение: " . strip_tags($_POST['agreement']) . "<br>";
//					}
//			}

			if (isset($_POST['finalPrice']) ) {
					$finalPrice = "Общая стоимость: " . strip_tags($_POST['finalPrice']) . "; ";
			}



	$productArr=[];
	$counter = 0;
	$body;
	
	$body .= $name . "\n". $tel . "\n". $email . "\n".'';
	
	foreach ($_POST as $key =>  $value) {
		$body.= '';
		if (is_array($value) || $value instanceof Traversable) {
			foreach ($value as $k => $v) {

				if($k == 'productName'){
					$body.="\n". $v ;
				}
				if($k == 'productSize'){
					if(!empty($v)){
						$body.="\n".'Размер: '. $v ;
					} else {
						$body.=
							'Размер отстутствует ';
					}
				}
				if($k == 'productPrice'){
					$body.="\n".'Цена: '. $v ;
				}
				if($k == 'productQuantity'){
					$body.="\n".'Кол-во: '. $v ;
				}

				if($k == 'productPriceCommon'){
					$body.="\n".'Цена:'. $v ."\n";
				}

			}

			$body.= '';
		}

	};
	$bodybottom = '</>';
	$body .= "\n". $finalPrice. "\n"; 
}


$param = [
    "chat_id" => $chat_id,
    "text" => $body
		
];

$url = "https://api.telegram.org/bot" . $tg_bot_token . "/sendMessage?" . http_build_query($param);

var_dump( $body);

file_get_contents($url);

foreach ( $_FILES as $file ) {

    $url = "https://api.telegram.org/bot" . $tg_bot_token . "/sendDocument";

    move_uploaded_file($file['tmp_name'], $file['name']);

		
    $document = new \CURLFile($file['name']);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id" => $chat_id, "document" => $document]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $out = curl_exec($ch);

    curl_close($ch);

    unlink($file['name']);
}

die('1');

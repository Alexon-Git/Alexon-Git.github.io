<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/phpmailer.php');

		

		 require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/smtp.php');
		 const HOST = 'ssl://smtp.mail.ru';
		 const LOGIN = 'wizzardhtt@gmail.com';
		 const PASS = 'Myblu1285';
		 const PORT = '465';

	
   
    const SENDER = 'wizzardhtt@gmail.com';
    const CATCHER = 'petrdepersmidt497@gmail.com';
    const SUBJECT = 'Заявка с сайта';
    const CHARSET = 'UTF-8';
    
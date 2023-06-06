<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/phpmailer.php');

		

		 require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/smtp.php');
		 const HOST = 'ssl://smtp.mail.ru';
		 const LOGIN = 's_vysochenko@mail.ru';
		 const PASS = 'Gelshtrut_4576_ma';
		 const PORT = '465';

	
   
    const SENDER = 's_vysochenko@mail.ru';
    const CATCHER = 's_vysochenko@mail.ru;
    const SUBJECT = 'Заявка с сайта';
    const CHARSET = 'UTF-8';
    
<?php
$message = new \Anax\Message\CMessage();

$message->addInfoMessage('Detta �r ett infomeddelande');
$message->addErrorMessage('Detta �r ett felmeddelande');
$message->addSuccessMessage('Detta �r ett meddelande om att allt gick bra');

$message->printMessage(); 
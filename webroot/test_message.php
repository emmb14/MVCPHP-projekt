<?php
$message = new \Anax\Message\CMessage();

$message->addInfoMessage('Detta är ett infomeddelande');
$message->addErrorMessage('Detta är ett felmeddelande');
$message->addSuccessMessage('Detta är ett meddelande om att allt gick bra');

$message->printMessage(); 
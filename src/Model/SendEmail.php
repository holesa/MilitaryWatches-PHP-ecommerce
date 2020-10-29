<?php
class SendEmail 
{

    public function send($to, $subject, $message, $from) {
        $header = "From: " . $from
        . "\nMIME-Version: 1.0\n"
        . "Content-Type: text/html; charset=\"utf-8\"\n";
        return mb_send_mail($to, $subject, $message, $header);
    }

}
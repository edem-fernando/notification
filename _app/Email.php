<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;

    public function __construct($smptDebug, $host, $user, $pass, $smptSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smptDebug;
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->Username = $user;
        $this->mail->Password = $pass;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = $smptSecure;
        $this->mail->Port = $port;
        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromEmail, $setFromName);
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
    {
        $this->mail->Subject    = (string)$subject;
        $this->mail->Body       = $body;

        $this->mail->addReplyTo($replyEmail,$replyName);
        $this->mail->addAddress($addressEmail,$addressName);

        try {
            $this->mail->send();
        } catch(\Exception $e) {
            echo "Error : {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}

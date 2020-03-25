<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host = 'mail.gustavoweb.me';
        $this->mail->Username = 'sender@gustavoweb.me';
        $this->mail->Password = 'teste@123';
        $this->mail->SMTPAuth = false;
        $this->mail->SMTPSecure = false;
        $this->mail ->Port = 587;
        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML(true);
        $this->mail->setFrom("gustavo@gustavoweb.me","Equipe GustavoWeb");
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

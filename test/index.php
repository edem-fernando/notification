<?php

/*
 * eis a sua biblioteca para manipular envio de e-mail
*/

require __DIR__ . "/../lib_ext/autoload.php";

use Notification\Email;

$newEmail = new Email("Assunto teste","<p>E-mail á ãode <b>teste</b> com o phpmailer</p>","edem.fbc@gmail.com","Edem Fernando","edem.bastos@acad.ifma.edu.br","Edem");

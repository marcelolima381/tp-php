<?php

namespace Helper;

/**
 * Description of Mailer
 *
 * @author asantos07
 */
class Mailer {

    const mailfiles = "../mail_templates/";

    public static function registrationConfirm($user) {
        $mailer = new \PHPMailer;
        $email = $user->email;
        $id = $user->getId();
        $name = $user->name;
        switch ($user->getExt()) {
	        case ".user":
		        $type = "user";
                break;
	        case ".company":
		        $type = "company";
        }
        $registration_route = \HOST . "/verify/" . $type . $id;

        // Set PHPMailer to use the sendmail transport
        $mailer->isSendmail();
        $mailer->addAddress($email, $name);
        $mailer->Subject = 'Trabalha Brasil: Verificação de Email';
        $message = \preg_replace("/target/", $registration_route, \file_get_contents(Mailer::mailfiles . "registration.html"));
        $mailer->msgHTML($message, Mailer::mailfiles);
        if (!$mailer->send()) {
            return 0;
        } else {
            return -1;
        }
    }

}

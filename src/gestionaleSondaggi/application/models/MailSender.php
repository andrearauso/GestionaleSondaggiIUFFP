<?php
/**
 * This class is used for sending email to the user
 * It send email when a user is created or when the user lost is password
 */

namespace Models;


class MailSender
{
    public static function userPasswordSender($email, $pass, $name)
    {
        // The receiver
        $to = $email;
        // The subject of the email
        $subject = "Invio Password";
        /* The header of the email including the sender and the program
           that send the email*/
        $headers = 'From: fwebmaster@samtinfo.ch' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $message = 'Buongiorno signor/signora '.$name. ', in questa mail troverà la password'. "\r\n" .
            'per accedere al gestionale dei sondaggi' . "\r\n" .
            'La sua mail per l\'accesso é: '. $email  . "\r\n" .
            'La sua password provvisoria è: '. $pass . "\r\n" .
            'Dopo aver fatto il primo login le verrà chiesto di immettere una password che diventerà' . "\r\n" .
            'la sua nuova password di accesso.';

        mail($to, $subject, $message, $headers);
    }

    public static function lostPasswordSender($email, $pass, $name)
    {
        // The receiver
        $to = $email;
        // The subject of the email
        $subject = "Invio Password";
        /* The header of the email including the sender and the program
           that send the email*/
        $headers = 'From: fwebmaster@samtinfo.ch' . "\r\n" .
            'X-Mailer: PHP/' . phpversion() . "\r\n" .
            'Content-Type: text/html; charset=UTF-8';
        $message = 'Buongiorno signor/signora '.$name. ', lei ha richiesto una nuova password '. "\r\n" .
            'per accedere al gestionale dei sondaggi' . "\r\n" .
            'La sua mail per l\'accesso é: '. $email  . "\r\n" .
            'La sua password provvisoria è: '. $pass . "\r\n" .
            'Appena avrà fatto il login le verrà chiesto di immettere una password che diventerà' . "\r\n" .
            'la sua nuova password di accesso.';

        mail($to, $subject, $message, $headers);
    }
}
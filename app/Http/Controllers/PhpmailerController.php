<?php

namespace App\Http\Controllers;

use Request;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailerException;

class PhpmailerController extends Controller {


	public function sendEmail (Request $request) {
  	// is method a POST ?
  	if(Request::isMethod('post')) {
        require 'vendor/autoload.php';							// load Composer's autoloader

        $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

        try {
                // Server settings
            $mail->SMTPDebug = 0;                                	// Enable verbose debug output
            $mail->isSMTP();                                     	// Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';						    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                              	// Enable SMTP authentication
            $mail->Username = 'pandorasurvey2019@gmail.com';        // SMTP username
            $mail->Password = 'test@1234';              // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('pandorasurvey2019@gmail.com', 'Pandora');
            $mail->addAddress('dnaz09.dn@gmail.com', 'Daniel Naz');	// Add a recipient, Name is optional
            $mail->addReplyTo('your-email@gmail.com', 'Mailer');
            $mail->addCC('his-her-email@gmail.com');
            $mail->addBCC('his-her-email@gmail.com');

            //Attachments (optional)
            // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

            //Content
            $mail->isHTML(true);
            $mail->Subject = Request::input('subject');
            $mail->Body    = Request::input('message');
            // $mail->Subject = 'Survey';
            // $mail->Body    =  'Thank you';

            $mail->send();
            return back()->with('success','Message has been sent!');
        }
        catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
    }
    return view('phpmailer');
    }
}

<?php 
namespace App\Custom;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
* 
*/
class Mailer
{
	
	function __construct()
	{
		

	}

	public function instance()
	{
		$mail = new PHPMailer();                              // Passing `true` enables exceptions

	    //Server settings
	    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    // $mail->isSMTP();                                      // Set mailer to use SMTP
	    // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
	    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    // $mail->Username = 'user@example.com';                 // SMTP username
	    // $mail->Password = 'secret';                           // SMTP password
	    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    // $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('support@counter.linkingphase.com', 'Supports');

	    return $mail;
	}

}
?>
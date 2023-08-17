<?PHP
require_once '/PHPMailer-master/src/PHPMailer.php';
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
$mail = new PHPMailer();

$body = "ทดสอบ";

$mail->CharSet = "utf-8";
$mail->isSMTP(); 
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'false'; 
$mail->Host = "mail.yourdomain.com"; 
$mail->Port = 25; // พอร์ท SMTP 25 /
$mail->Username = "potogasmix@gmail.com"; 
$mail->Password = "MynameisBOB631992"; 

$mail->SetFrom("email@yourdomain.com", "yourname");
$mail->AddReplyTo("email@yourdomain.com", "yourname");
$mail->Subject = "ทดสอบ PHPMailer.";

$mail->MsgHTML($body);

$mail->AddAddress("iwannadie1891@gmail.com", "recipient1"); // 1
$mail->AddAddress("iwannadie1891@gmail.com", "recipient2"); // 2

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}
?>
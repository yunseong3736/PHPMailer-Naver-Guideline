<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP feature test</title>
</head>

<body>
  <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    // 한글 사용을 위한 설정
    $mail->ContentType = "text/html";
    $mail->CharSet = "UTF-8";

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.naver.com';
      $mail->SMTPAuth = true;
      $mail->Username = '[본인 네이버 계정]@naver.com';
      $mail->Password = '[네이버 애플리케이션 비밀번호]';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port = 465;

      $mail->setFrom('[본인 네이버 계정]@naver.com', '이름');
      $mail->addAddress('[목적지 주소]');

      // 제목 (예시)
      $mail->Subject = 'Think about PHP Mailer Naver';
      // 내용 (예시)
      $mail->Body = 'PHP Mailer 네이버 SMTP 연동';

      $mail->send();

      echo '네이버 메일 전송 성공';
    } catch (Exception $e){
      echo $e;
    }
  ?>
</body>

</html>

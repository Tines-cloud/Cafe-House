<?php
  if(isset($_POST['submit']))
  {
    $conn=mysqli_connect("localhost","root","","cafe_house");

    $name=$_POST['firstname'];
    $email=$_POST['email_cus'];
    $comment=$_POST['comment'];
    
    $r1=$_POST['r1'];
    $r2=$_POST['r2'];
    $r3=$_POST['r3'];
    $r4=$_POST['r4'];
    $r5=$_POST['r5'];

    $last_rate=($r1+$r2+$r3+$r4+$r5)/5;

    $sql="insert into feedback (name,Email,Comment,r1,r2,r3,r4,r5,last_rate) values ('$name','$email','$comment','$r1','$r2','$r3','$r4','$r5','$last_rate')";

    mysqli_query($conn,$sql); 
     
      $name=ucfirst($name);
      require('phpmailer/class.phpmailer.php');
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug = 0;
      $mail->SMTPAuth = TRUE;
      $mail->SMTPSecure = "ssl";
      $mail->Port     = 465;  
      $mail->Username = "cafehouse.g5@gmail.com";
      $mail->Password = "Group5@Project";
      $mail->Host     = "smtp.gmail.com";
      $mail->Mailer   = "smtp";
      $mail->SetFrom("cafehouse.g5@gmail.com", "Cafe House");
      $mail->AddReplyTo("cafehouse.g5@gmail.com", "Cafe House");

      $mail->AddAddress($email);
      $mail->Subject = "Feedback";
      $mail->WordWrap   = 80;
      $mail->Body = "<h2>Dear $name,</h2><p>Thanks for the feedback on your experience with our customer support team. We sincerely appreciate your insight because it helps us to build a better customer experience...!</p>
      <p>If you have any more questions, comments, or concerns or compliments, please feel welcome to reach back out as we would be more than happy to assist.
      </p>Best,<br> <h3>Cafe House</h3>";
      $mail->IsHTML(true);
      $mail->Send();

  }
  //ALTER TABLE feedback AUTO_INCREMENT=1
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cafe House</title>

  <link href="css/fonts1.css" rel='stylesheet' type='text/css'>
  <link href="css/fonts2.css" rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <section class="tm-welcome-section">
      <div class="container tm-position-relative">
        <div class="tm-lights-container">
          <img src="img/light.png" alt="Light" class="light light-1">
          <img src="img/light.png" alt="Light" class="light light-2">
          <img src="img/light.png" alt="Light" class="light light-3">  
        </div>        
        <div class="row tm-welcome-content">
         <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Feedback &nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
          <h2 class="tm-handwriting-font tm-welcome-header" style="color: white; text-transform: capitalize;">Thank You......!</h2>

          <div class="jumbotron text-center">
            <h1 class="display-3"></h1>
            <p class="lead white-text"> Thanks for the awesome review, <strong style="text-transform: capitalize;"><?php echo $name ?> !</strong> we hope you to join us very soon.</p>
          </div>
             
        </div>
      </div>      
    </section>

    <span id="counter" hidden="">20</span>
      <script type="text/javascript">
        function countdown() {
          var i = document.getElementById('counter');
          i.innerHTML = parseInt(i.innerHTML)-1;
          if (parseInt(i.innerHTML)<=0) {
           window.open('index.html','_self');
          }
      }
      setInterval(function(){ countdown(); },200);
    </script>
   <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> 
   <script type="text/javascript" src="js/script.js"></script>
 </body>
 </html>
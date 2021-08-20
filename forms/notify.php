<?php


if($_POST) {
  $namenotify = "";
  $emailnotify = "";
  $subject = "Nova prijava za newsletter";
  $email_body = "<div>
Poštovani,

imate novu prijavu za newsletter sa sajta <strong>amargarcevic.com</strong>.
<p></p>\n 
";

  $recipient = "web@amargarcevic.com";
    
  if(isset($_POST['name-notify'])) {
      $namenotify = filter_var($_POST['name-notify'], FILTER_SANITIZE_STRING);
      $email_body .= "
      <div>
                         <label><b>Ime:</b></label>&nbsp;<span>".$namenotify."</span>
                      </div>";
  }

  if(isset($_POST['email-notify'])) {
      $emailnotify = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email-notify']);
      $emailnotify = filter_var($emailnotify, FILTER_VALIDATE_EMAIL);
      $email_body .= "<div>
                         <label><b>E-mail:</b></label>&nbsp;<span>".$emailnotify."</span>
                      </div>";
  }
    
  $email_body .= "</div><div></div><p></p>\n <div>S poštovanjem,
</div>
<div>
  Web Podrška</div>
  <div>
  amargarcevic.com</div>";

  $headers  = 'MIME-Version: 1.0' . "\r\n"
  .'Content-type: text/html; charset=utf-8' . "\r\n"
  .'From: ' . 'Web Podrška<webpodrska@amargarcevic.com>' . "\r\n";
    
  if(mail($recipient, $subject, $email_body, $headers)) {
      echo "<p>Hvala Vam što ste se prijavili za redovno primanje obavijesti, $namenotify.</p>";
  } else {
      echo '<p>Žao mi je! Vaša prijava se nije uspjela poslati. Molim Vas da me kontaktirate na e-mail web@amargarcevic.com.</p>';
  }
    
} else {
  echo '<p>Nemoguće je poslati Vašu prijavu. Molim Vas da me kontaktirate na e-mail web@amargarcevic.com.</p>';
}
?>

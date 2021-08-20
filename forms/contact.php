<?php


if($_POST) {
  $name = "";
  $email = "";
  $subject = "Nova poruka:";
  $message = "";
  $email_body = "<div>
Poštovani,

imate novu poruku sa sajta <strong>amargarcevic.com</strong>.
<p></p>\n 
";

  $recipient = "web@amargarcevic.com";
    
  if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $email_body .= "
      <div>
                         <label><b>Ime:</b></label>&nbsp;<span>".$name."</span>
                      </div>";
  }

  if(isset($_POST['email'])) {
      $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      $email_body .= "<div>
                         <label><b>E-mail:</b></label>&nbsp;<span>".$email."</span>
                      </div>";
  }
    
  if(isset($_POST['subject'])) {
      $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
      $email_body .= "<div>
                         <label><b>Predmet:</b></label>&nbsp;<span>".$subject."</span>
                      </div>";
  }
  
    
  if(isset($_POST['message'])) {
      $message = htmlspecialchars($_POST['message']);
      $email_body .= "<div>
                         <label><b>Poruka:</b></label>
                         <div>".$message."</div>
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
      echo "<p>Hvala Vam što ste me kontaktirali, $name. Odgovorit ću Vam u najkraćem mogućem roku.</p>";
  } else {
      echo '<p>Žao mi je! Vaša poruka se nije uspjela poslati. Molim Vas da me kontaktirate na e-mail web@amargarcevic.com.</p>';
  }
    
} else {
  echo '<p>Nemoguće je poslati Vašu poruku. Molim Vas da me kontaktirate na e-mail web@amargarcevic.com.</p>';
}
?>

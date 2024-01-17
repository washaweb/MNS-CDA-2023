<?php 
  include('header.php');
?>

<h2>Formulaire de contact</h2>

<!-- <form action="send_mail.php" method="POST"> -->
<form action="send_php_mailer.php" method="POST">
  <p>
    <label for="subject">Sujet</label>
    <input type="text" name="subject" id="subject" />
  </p>
  <p>
    <label for="email">Votre email</label>
    <input type="text" name="email" id="email" />
  </p>
  <p>
    <label for="message">Votre message</label>
    <textarea type="text" name="message" id="message"></textarea>
  </p>
  <p>
    <button type="submit">Envoyer</button>
  </p>
</form>


<?php 
  include('footer.php');
?>
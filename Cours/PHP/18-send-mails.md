# Envoyer des emails avec PHP

La fonction `mail()` de PHP est utilisée pour envoyer des e-mails directement depuis un script PHP. C'est une fonction simple, mais pour des besoins de production, il est souvent recommandé d'utiliser des bibliothèques plus avancées comme **PHPMailer**, car elles offrent plus de flexibilité et de meilleures options pour gérer les envois d'e-mails (comme SMTP, authentification, HTML, pièces jointes, etc.).

Voici un exemple de base utilisant la fonction `mail()` de PHP pour envoyer un e-mail. Cet exemple suppose que vous avez un formulaire HTML qui envoie des données (`subject`, `emailto`, `message`) à un script PHP via la méthode POST.

## Formulaire HTML (exemple)

```html
<form action="send_mail.php" method="post">
    <input type="text" name="subject" placeholder="Sujet">
    <input type="email" name="emailto" placeholder="Email destinataire">
    <textarea name="message" placeholder="Votre message"></textarea>
    <input type="submit" value="Envoyer">
</form>
```

## Script PHP (`send_mail.php`)

```php
<?php
// Vérification si les données POST existent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assignation des données POST à des variables
    $subject = $_POST['subject'];
    $emailTo = $_POST['emailto'];
    $message = $_POST['message'];

    // Adresse e-mail de l'expéditeur
    $headers = 'From: webmaster@example.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Envoi de l'email
    if (mail($emailTo, $subject, $message, $headers)) {
        echo "Email envoyé avec succès à $emailTo";
    } else {
        echo "Échec de l'envoi de l'email";
    }
} else {
    echo "Données du formulaire non reçues";
}
?>
```

## Explications

1. **Vérification de la Méthode POST** : Le script commence par vérifier si les données ont été envoyées via POST. Cela aide à prévenir l'exécution du script par des requêtes non désirées.

2. **Récupération des Données POST** : Les données envoyées par le formulaire (`subject`, `emailto`, `message`) sont récupérées et stockées dans des variables.

3. **Définition des En-têtes** : Les en-têtes sont importants pour fournir des informations supplémentaires comme l'adresse de l'expéditeur, la réponse, etc.

4. **Envoi de l'E-mail** : La fonction `mail()` est utilisée pour envoyer l'e-mail. Elle prend quatre paramètres : le destinataire, le sujet, le message et les en-têtes. 

5. **Gestion des Réponses** : Le script affiche un message pour indiquer si l'e-mail a été envoyé ou non.

## Points à Noter

- Assurez-vous que la fonction `mail()` est correctement configurée sur votre serveur. Sur un serveur local (comme XAMPP ou WAMP), des configurations supplémentaires sont souvent nécessaires pour que l'envoi de mails fonctionne.

- Pour des raisons de sécurité, il est important de valider et de nettoyer les données reçues du formulaire avant de les utiliser. Des fonctions comme `filter_var()` ou des expressions régulières peuvent être utilisées pour cela.

- **Environnement de production :** Sur un serveur de production, il est recommandé d'utiliser SMTP pour envoyer des e-mails, car cela offre une meilleure délivrabilité. La fonction `mail()` peut ne pas être suffisante pour les besoins de production en raison de diverses restrictions de serveurs et de problèmes de configuration.

- Gestion des erreurs : La fonction `mail()` ne fournit pas beaucoup de détails en cas d'échec d'envoi. Pour un meilleur contrôle des erreurs, envisagez d'utiliser une bibliothèque comme PHPMailer.

- Sécurité : Faites attention à la sécurité, notamment pour éviter l'envoi de spams et les injections dans les en-têtes. Validez toujours et nettoyez les données entrantes.

En suivant ces directives, vous pouvez créer un script de base pour envoyer des e-mails en PHP. Pour des fonctionnalités plus avancées et une meilleure gestion des erreurs, il est conseillé d'utiliser des bibliothèques de messagerie tierces.

> Aide pour envoyer des emails depuis son localhost avec wamp https://grafikart.fr/blog/mail-local-wamp
> Aide pour configuer XAMPP pour envoyer des emails https://www.journaldunet.fr/developpeur/developpement/1202761-comment-configurer-xampp-pour-envoyer-des-mails-depuis-un-localhost/

## Utiliser PHPMailer

PHPMailer est une bibliothèque populaire pour envoyer des e-mails en PHP. Elle offre une grande flexibilité et de nombreuses fonctionnalités telles que l'envoi via SMTP, l'ajout de pièces jointes, la création d'e-mails HTML, et une meilleure gestion des erreurs par rapport à la fonction `mail()` de PHP. Voici comment vous pouvez utiliser PHPMailer pour envoyer un e-mail :

### Étape 1: Installer PHPMailer

Si vous utilisez Composer, vous pouvez installer PHPMailer avec la commande suivante :

```bash
composer require phpmailer/phpmailer
```

Sinon, vous pouvez télécharger PHPMailer depuis GitHub (https://github.com/PHPMailer/PHPMailer) et l'inclure manuellement dans votre projet.

### Étape 2: Préparer le Script d'Envoi d'E-Mail

Voici un exemple de base pour envoyer un e-mail avec PHPMailer :

```php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // important de fixer l'encodage du mail
    $mail->SetLanguage( "fr", "phpmailer/language" );
    $mail->Encoding = "base64"; 
    // Configuration du serveur
    $mail->SMTPDebug = 2;                                       // Activer le débogage détaillé
    $mail->isSMTP();                                            // Utiliser SMTP
    $mail->Host       = 'smtp.exemple.com';                     // Serveur SMTP
    $mail->SMTPAuth   = true;                                   // Activer l'authentification SMTP
    $mail->Username   = 'votre_email@exemple.com';              // SMTP username
    $mail->Password   = 'votre_mot_de_passe';                   // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Activer le cryptage TLS
    $mail->Port       = 587;                                    // Port TCP pour se connecter

    // Destinataires
    $mail->setFrom('de_votre_email@exemple.com', 'Expéditeur');
    $mail->addAddress('a_email@exemple.com', 'Nom du Destinataire');     // Ajouter un destinataire

    // Contenu de l'email
    $mail->isHTML(true);                                  // Définir le format de l'email en HTML
    $mail->Subject = 'Sujet de l\'email';
    $mail->Body    = 'Ceci est le corps de l\'email en <b>HTML</b>';
    $mail->AltBody = 'Ceci est le corps de l\'email en texte brut pour les clients non-HTML';

    $mail->send();
    echo 'Message envoyé';
} catch (Exception $e) {
    echo "Message non envoyé. Mailer Error: {$mail->ErrorInfo}";
}
?>
```

### Explications

- **Chargement de PHPMailer** : Commencez par inclure les fichiers nécessaires de PHPMailer.

- **Configuration SMTP** : Configurez les détails de votre serveur SMTP. Vous devrez remplacer les valeurs par les informations de votre serveur de messagerie ou de votre fournisseur de services de messagerie (comme Gmail, Outlook, etc.).

- **Rédaction de l'E-Mail** : Définissez l'expéditeur, le destinataire, le sujet et le corps de l'e-mail. PHPMailer permet d'envoyer des e-mails au format HTML et texte brut.

- **Envoi et Gestion des Erreurs** : Envoyez l'e-mail et gérez les éventuelles exceptions.

### Points Importants

- **Sécurité** : Gardez vos identifiants SMTP sécurisés et ne les exposez pas dans votre code.

- **Configuration du serveur** : Selon le serveur SMTP que vous utilisez, les détails de configuration (host, port, cryptage) peuvent varier.

- **Gestion des erreurs** : Utilisez des blocs `try` et `catch` pour une meilleure gestion des erreurs. PHPMailer lance des exceptions en cas d'échec, ce qui rend la détection et le débogage des problèmes plus simples.

- **Dépendances** : Si vous n'utilisez pas Composer, assurez-vous que toutes les dépendances de PHPMailer sont correctement incluses dans votre projet.

- **Envois en masse et taux de limite** : Lors de l'envoi d'e-mails en grand nombre, soyez conscient des limites de taux imposées par votre fournisseur SMTP pour éviter d'être bloqué ou listé comme spam.

- **E-mails HTML** : Lors de la création de messages HTML, assurez-vous qu'ils sont bien formatés et testez-les sur différents clients de messagerie pour vérifier leur compatibilité.

### Avantages de PHPMailer

- **Flexibilité** : PHPMailer offre une plus grande flexibilité pour personnaliser les e-mails, gérer les pièces jointes, définir des en-têtes personnalisés, etc.

- **Fiabilité** : Meilleure gestion des erreurs et plus grande probabilité que vos e-mails soient correctement livrés et non marqués comme spam.

- **Sécurité** : PHPMailer prend en charge le cryptage SMTP, ce qui est essentiel pour la protection des informations d'identification et la confidentialité des données.

- **Compatibilité** : Prise en charge de différents serveurs et configurations SMTP, ce qui rend PHPMailer adapté à de nombreux environnements et besoins.

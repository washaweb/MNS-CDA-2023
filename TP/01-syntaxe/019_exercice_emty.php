<?php
/*
  1. Ecrivez un script PHP qui indique le nombre de chaines de caractères vides dans le tableau $strings

  2. Indiquez maintenant le nombre de chaines qui contiennent effectivement du texte
 */

$countEmpty = 0;
$countFull = 0;
$strings = array('Bonjour', '', 'Bom dia', 'Hello', 'Guten Tag', '');

foreach ($strings as $string) {
  if( empty($string) ) {
    $countEmpty++;
  } else {
    $countFull++;
  }
}
echo 'Il y a <strong>' . $countEmpty . ' chaine' . ($countEmpty > 1 ? 's' : '') . '</strong> vide' . ($countEmpty > 1 ? 's' : '') . '<br>';

echo 'Il y a <strong>' . $countFull . ' chaine' . ($countFull > 1 ? 's' : '') . '</strong> non vide' . ($countFull > 1 ? 's' : '') . '';
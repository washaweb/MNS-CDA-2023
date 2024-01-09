<?php 
  // Structure d'une conditionnelle en PHP
  $condition = true; // true
  $condition = false; // false
  //  les chaines de caractères sont résolues à des booleans, si le texte est rempli = true
  $condition = 'toto';  // true
  $condition = ''; // false

  //  les chaines de caractères sont résolues à des booleans, si le texte est rempli = true
  $condition = 0;  // false
  $condition = -1; // true
  $condition = 1; // true
  $condition = 234672; // true
  $condition = 0.2345; // true
  

  if($condition) {
    // ce block est exécuté si la condition est TRUE 
    echo $condition;
  }

  // on renverse/inverse le boolean avec !
  if( !$condition){
    // execute le code
  }
  // forcer le type en Boolean
  if( !!$condition) {
    // execute le code
  }

  // si je n'ai qu'une instruction, je peux me passer des {}
  if($condition) echo '<br>toto';

  // syntaxe d'un ternaire :  $var = condition ? true : false;
  //true
  echo '<br>';
  echo $condition ? 'toto' : 'tata';
  
?>

<section>
  <?php
    if($condition) {
      echo '<h1>Affiché</h1>';
    } 
  ?>
</section>

<section>
  <?php if($condition) { ?>
  <h2>exemple 2</h2>
  <?php }; ?>
</section>
<section>
  <?php if($condition) : ?>
  <h2>exemple 2</h2>
  <?php endif; ?>
</section>
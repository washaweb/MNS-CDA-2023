<?php 
  $a = 5;
  $b = '5';
  // opérateurs de comparaison dans les conditions
  if($a == $b) {
    // si a vaut b
  }

  if($a === $b) {
    // si a vaut b et aussi si ils ont le même type
  }
  // différents opérateurs de comparaison

  $a > $b; //strictement plus grand que...
  $a < $b; //strictement plus petit que...
  $a >= $b; //plus grand ou égal que...
  $a <= $b; //plus petit ou égal que...
  $a != $b; //valeur différent de ...
  $a !== $b; //valeur et type différent de ...


  if($a != $b){
    // execute se code si la condition est true
  } else {
    // execute le code si la condition est fausse
  }

  // syntaxe alternative

  if($a != $b):
    // execute se code si la condition est true
  else :
    // execute le code si la condition est fausse
  endif;

  // plusieurs conditions avec if elseif else
  if($a > $b) {
    //condition 1
  } else if($a < $b) {
    //condition 2
  } else if($a == $b) {
    //condition 3
  } else {
    // enfin si rien n'est vrai, execute ce code
  }

  // Exemple d'application
  $population = rand(100, 10000000);

  if($population <= 1000) {
    echo 'Moins de 1000';
  } else if($population <= 10000) {
      echo 'Entre 1000 et 10000';
  } else if($population <= 100000) {
      echo 'Entre 10000 et 100000';
  } else if($population <= 1000000) {
      echo 'Entre 100000 et 1 million';
  } else {
      echo 'Plus d\'1 million';
  }

?>
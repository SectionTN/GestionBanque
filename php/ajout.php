<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$cnx = mysqli_connect("localhost", "root", "wesker", "BD1920") or die(mysqli_error($cnx));


$type = $_POST['type'];
$numero = $_POST['numero'];
$cin = $_POST['cin'];
$solde = $_POST['solde'];


$request_one = "SELECT * FROM `compte` WHERE numero = '$numero'";
$response_one = mysqli_query($cnx, $request_one) or die(mysqli_error($cnx));

if (mysqli_num_rows($response_one) !== 0) {
  echo "Erreur: compte existant";
} else {
  $request_two = "INSERT INTO `compte` VALUES ('$numero', '$cin', '$type', '$solde')";
  $response_two = mysqli_query($cnx, $request_two) or die(mysqli_error($cnx));
  if (mysqli_affected_rows($cnx) == 1) {
    echo "Ajout d’un nouveau compte effectué avec succès";
  } else {
    echo "Erreur: Problemé d'ajout" . mysqli_error($cnx);
  }
}

mysqli_close($cnx);

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cnx = mysqli_connect("localhost", "root", "wesker", "BD1920") or die(mysqli_error($cnx));


$dateOp = date('Y-m-d H:i:s');

$agence = $_POST["agence"];
$numero = $_POST["numero"];
$type = $_POST["type"];
$montant = $_POST["montant"];

$request_one = "SELECT solde FROM `compte` WHERE numero = '$numero'";
$response_one = mysqli_query($cnx, $request_one) or die(mysqli_error($cnx));

if (mysqli_num_rows($response_one) === 0) {
  echo "Erreur: compte unexistant!";
} else {
  $nv_montant = 0;
  $T = mysqli_fetch_array($response_one);
  if ($type === "R") {
    if ($T[0] < $montant) {
      echo "Erreur : Opération refusée";
    } else {
      $nv_montant = floatval($T[0]) - floatval($montant);
      $request_three = "INSERT INTO `operation` VALUES('$agence', '$numero', '$dateOp', '$type', '$montant')";
      $response_three = mysqli_query($cnx, $request_three) or die(mysqli_error($cnx));
      $request_four = "UPDATE `compte` SET solde = $nv_montant WHERE numero = '$numero'";
      $response_four = mysqli_query($cnx, $request_four) or die(mysqli_error($cnx));
      if (mysqli_affected_rows($cnx)) {
        echo "Opération effectuée avec succès";
      } else {
        echo "Erreur: Operation echouéé";
      }
    }
  } else {
    $nv_montant = floatval($T[0]) + floatval($montant);
    $request_five = "INSERT INTO `operation` VALUES('$agence', '$numero', '$dateOp', '$type', '$montant')";
    $response_five = mysqli_query($cnx, $request_five);
    $request_six = "UPDATE `compte` SET solde = '$nv_montant' WHERE numero = '$numero'";
    $response_six = mysqli_query($cnx, $request_six);
    if (mysqli_affected_rows($cnx)) {
      echo "Opération effectuée avec succès";
    } else {
      echo "Erreur: Operation echouéé";
    }
  }
}

mysqli_close($cnx);

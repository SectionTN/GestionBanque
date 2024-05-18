<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cnx = mysqli_connect("localhost", "root", "wesker", "BD1920") or die(mysqli_error($cnx));

$numero = $_POST["numero"];
$datedebut = $_POST["datedebut"];
$datefin = $_POST["datefin"];

$datedebut = $datedebut . ' 00:00:00';
$datefin = $datefin . ' 23:59:59';

$request_one = "SELECT solde FROM `compte` WHERE numero = '$numero'";
$response_one = mysqli_query($cnx, $request_one);

if (mysqli_num_rows($response_one) > 0) {
  $table_response = mysqli_fetch_array($response_one);
  $solde = $table_response[0];

  $request_two = "SELECT * FROM `operation` WHERE numero = '$numero' AND dateOp BETWEEN '$datedebut' AND '$datefin' ORDER BY dateOp DESC";
  $response_two = mysqli_query($cnx, $request_two);

  if (mysqli_num_rows($response_two) > 0) {
    $totalDepot = 0;
    $totalRetrait = 0;

    echo '<h2>Extrait de Compte</h2>';
    echo '<p>Solde du compte: ' . $solde . '</p>';

    while ($T = mysqli_fetch_array($response_two)) {
      $montant = $T[4];
      if ($T[3] === 'D') {
        $totalDepot += $montant;
      } else if ($T[3] === 'R') {
        $totalRetrait += $montant;
      }
    }

    echo '<p>Total Dépôt: ' . $totalDepot . '</p>';
    echo '<p>Total Retrait: ' . $totalRetrait . '</p>';

    echo '<table border=1>';
    echo '<tr><th>Date</th><th>Nature Operation</th><th>Montant</th></tr>';


    $request_three = "SELECT * FROM `operation` WHERE numero = '$numero' AND dateOp BETWEEN '$datedebut' AND '$datefin' ORDER BY dateOp DESC";
    $response_three = mysqli_query($cnx, $request_three);

    while ($D = mysqli_fetch_array($response_three)) {
      $date = $D[2];
      $nature = $D[3];
      $flous = $D[4];

      echo '<tr>';
      echo '<td style="text-align: center">' . $date . '</td>';
      echo '<td style="text-align: center">' . $nature . '</td>';
      echo '<td style="text-align: center">' . $flous . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo '<p>Aucune opération trouvée pour ce compte et cette période.</p>';
  }
} else {
  echo '<p>Le compte numéro ' . $numero . ' est introuvable.</p>';
}


mysqli_close($cnx);

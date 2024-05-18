<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Operation</title>
  <link rel="stylesheet" type="text/css" href="../css/mesStyles.css">
</head>
<body>
<form method="post" action="mouvement.php" onsubmit="return verif2();">
  <fieldset>
    <legend>Operation sur un compte</legend>
    <label for="agence">Agence:</label>
    <select id="agence" name="agence">
      <option value="vide">Selectionner votre agence</option>
      <option value="DJB055">Rue Mohamed Ali Djerba</option>
      <option value="GAB033">Rue de la solidarité Gabes</option>
      <option value="TUN001">Rue de la république Tunisie</option>
    </select>
    <br>
    <br>
    <label for="numero">Numero de compte:</label>
    <input type="text" id="numero" name="numero">
    <br>
    <br>
    <label for="type">Type Operation:</label>
    <input type="radio" id="depot" value="D" name="type">Dépot
    <input type="radio" id="retrait" value="R" name="type">Retrait
    <br>
    <br>
    <label for="montant">Montant:</label>
    <input type="text" id="montant" name="montant">
    <br>
    <br>
    <div style="text-align: center">
      <input type="submit" value="Valider">
      <input type="reset" value="Annuler">
    </div>
  </fieldset>
</form>
<script src="../js/controle.js"></script>
</body>
</html>

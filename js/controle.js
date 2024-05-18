function alpha(ch) {
  ch = ch.toLowerCase();
  for (let i = 0; i < ch.length; i++) {
    if (!("a" <= ch.charAt(i) && ch.charAt(i) <= "z")) {
      return false;
    }
  }
  return true;
}

function numerique(ch) {
  ch = ch.toLowerCase();
  for (let i = 0; i < ch.length; i++) {
    if (!("0" <= ch.charAt(i) && ch.charAt(i) <= "9")) {
      return false;
    }
  }
  return true;
}

function verif1() {
  const epargne = document.getElementById("epargne").checked;
  const courant = document.getElementById("courant").checked;
  const numero = document.getElementById("numero").value;
  const cin = document.getElementById("cin").value;
  const solde = document.getElementById("solde").value;

  let first_part = numero.substr(0, 3)
  let second_part = numero.substr(4, numero.length - 1)

  if (!epargne && !courant) {
    alert("choix de type obligatoire")
    return false;
  } else if (numero === "" || numero.length !== 8 || !alpha(first_part) || !numerique(second_part) || first_part.length !== 3 || second_part.length !== 4) {
    alert("numero invalide, saisir un numero valide")
    return false;
  } else if (cin === "" || cin.length !== 8 || !numerique(cin)) {
    alert("cin invalide")
    return false;
  } else if (solde === "" || isNaN(solde) || !Number(solde) > 0) {
    alert("solde invalide")
    return false;
  }
  return true;
}


function verif2() {
  const depot = document.getElementById("depot").checked;
  const retrait = document.getElementById("retrait").checked;
  const numero = document.getElementById("numero").value;
  const agence = document.getElementById("agence").selectedIndex;
  const montant = document.getElementById("montant").value;

  let first_part = numero.substr(0, 3)
  let second_part = numero.substr(4, numero.length - 1)

  if (agence === 0) {
    alert("choix d'agence obligatoire")
    return false;
  } else if (numero === "" || numero.length !== 8 || !alpha(first_part) || !numerique(second_part) || first_part.length !== 3 || second_part.length !== 4) {
    alert("numero invalide, saisir un numero valide")
    return false;
  } else if (!depot && !retrait) {
    alert("choix de type obligatoire");
    return false;
  } else if (montant === "" || isNaN(montant) || !Number(montant) > 0) {
    alert("solde invalide");
    return false;
  }
  return true;
}

function verif3() {
  const numero = document.getElementById("numero").value;
  const datedebut = document.getElementById("datedebut").value;
  const datefin = document.getElementById("datefin").value;


  let first_part = numero.substr(0, 3)
  let second_part = numero.substr(4, numero.length - 1)

  const startDate = new Date(datedebut);
  const endDate = new Date(datefin);

  const startTimestamp = startDate.getTime();
  const endTimestamp = endDate.getTime();

  if (numero === "" || numero.length !== 8 || !alpha(first_part) || !numerique(second_part) || first_part.length !== 3 || second_part.length !== 4) {
    alert("numero invalide, saisir un numero valide")
    return false;
  } else if (!(endTimestamp >= startTimestamp)) {
    alert("La date de fin est supérieure ou égale à la date de début.")
    return false;
  }
  return true;
}

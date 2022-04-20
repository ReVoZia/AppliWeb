<?php

# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if (isset($_POST['UtilId']) &&
    isset($_POST['NbPersonne']) &&
    isset($_POST['NbAdulte']) &&
    isset($_POST['NbEnfant']) &&
    isset($_POST['Arriver']) &&
    isset($_POST['Depart']) &&
    isset($_POST['NumChambre']) &&
    isset($_POST['NumChambreBase'])) {

    # FICHIER DE CONNEXION À LA BASE DE DONNÉES
    include '../conn.php';

    # RECUPERER LA REQUETE POST
    $utilId = $_POST['UtilId'];
    $nbPersonne = $_POST['NbPersonne'];
    $nbAdulte = $_POST['NbAdulte'];
    $nbEnfant = $_POST['NbEnfant'];
    $arriver = $_POST['Arriver'];
    $depart = $_POST['Depart'];
    $numChambre = $_POST['NumChambre'];
    $numChambreBase = $_POST['NumChambreBase'];

    # VALIDATION
    if (empty($nbPersonne)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Nom est required";
        header("Location: ../../Reserver.php?erreur=$em");
        exit;
    } else if (empty($nbAdulte)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Prénom est required";
        header("Location: ../../Reserver.php?erreur=$em");
        exit;
    } else if (empty($nbEnfant)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une adresse est required";
        header("Location: ../../Reserver.php?erreur=$em");
        exit;
    } else if (empty($arriver)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un numéro de téléphone est required";
        header("Location: ../../Reserver.php?erreur=$em");
        exit;
    } else if (empty($depart)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Password is required";
        header("Location: ../../Reserver.php?erreur=$em");
        exit;
    } else if (empty($numChambre)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Email est required";
        header("Location: ../../Reserver.php?erreur=$em");
        exit;
    } else {

        # CREE UNE NOUVELLE RESERVATION
        $sql = "CALL updateReservation(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$utilId, $nbPersonne, $nbAdulte, $nbEnfant, $arriver, $depart, $numChambre, $numChambreBase]);
        $stmt->closeCursor();
        # MODIFIER DISPONIBILITER DE LA CHAMBRE
        $sql = "CALL updateChambreDispo(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([0, $numChambreBase]);
        $stmt->closeCursor();

        # MODIFIER DISPONIBILITER DE LA CHAMBRE
        $sql = "CALL updateChambreDispo(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([1, $numChambre]);
        $stmt->closeCursor();

        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Chambre modifier !";
        header("Location: ../../Reserver.php?erreur=$sm");

    }

} else {
    $em = "Il manque des informations";
    header("Location: ../../Reserver.php?erreur=$em");
    exit;
}

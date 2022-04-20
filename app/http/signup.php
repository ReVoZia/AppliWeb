<?php  

# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if(isset($_POST['Name']) &&
   isset($_POST['Telephone']) &&
   isset($_POST['Email']) &&
   isset($_POST['Prenom']) &&
   isset($_POST['pass']) ){

   # FICHIER DE CONNEXION À LA BASE DE DONNÉES
   include '../conn.php';
   
   # RECUPERER LA REQUETE POST
   $nom = $_POST['Nom'];
   $prenom = $_POST['Prenom'];
   $adresse = $_POST['Adresse'];
   $telephone = $_POST['Telephone'];
   $email = $_POST['Email'];
   $password = $_POST['pass'];

   # CREE UN FORMAT URL
   $data = 'nom='.$nom.'&prenom='.$prenom;

   # VALIDATION
   if (empty($nom)) {
   	  # MESSAGE ERREUR + REDIRECTION
   	  $em = "Un Nom est required";
   	  header("Location: ../../signup.php?erreur=$em");
   	  exit;
   }else if(empty($prenom)){
       # MESSAGE ERREUR + REDIRECTION
       $em = "Un Prénom est required";
       header("Location: ../../signup.php?erreur=$em&$data");
       exit;
   }else if(empty($adresse)){
      # MESSAGE ERREUR + REDIRECTION
   	  $em = "Une adresse est required";
   	  header("Location: ../../signup.php?erreur=$em&$data");
   	  exit;
   }else if(empty($telephone)){
       # MESSAGE ERREUR + REDIRECTION
       $em = "Un numéro de téléphone est required";
       header("Location: ../../signup.php?erreur=$em&$data");
       exit;
   }else if(empty($password)) {
       # MESSAGE ERREUR + REDIRECTION
       $em = "Password is required";
       header("Location: ../../signup.php?erreur=$em&$data");
       exit;
   }else if(empty($email)){
           # MESSAGE ERREUR + REDIRECTION
           $em = "Un Email est required";
           header("Location: ../../signup.php?erreur=$em&$data");
           exit;
   }else {

       // ON HASH LE MOT DE PASSE
       $password = hash('sha512', $password);

       # CREE UN NOUVELLE UTILISATEUR AVEC UNE IMAGE PAR DEFAUT
       $sql = "CALL addUser(?,?,?,?,?,?)";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$nom, $prenom, $adresse, $telephone, $email, $password]);

       # MESSAGE DE REUSSITE + REDIRECTION
       $sm = "Nouveau Compte Cree";
       header("Location: ../../login.php?success=$sm");

   }

}else {
    $em = "Il manque des informations";
	header("Location: ../../signup.phperreur=$em");
   	exit;
}
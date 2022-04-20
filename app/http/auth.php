<?php  
session_start();

# SI L'EMAIL & LE MOT DE PASSE SONT ENVOYER
if(isset($_POST['Email']) &&
   isset($_POST['Pass'])){

   # FICHIER DE CONNEXION À LA BASE DE DONNÉES
   include '../conn.php';

   # RECUPERER LA REQUETE POST
   $password = $_POST['Pass'];
   $email = $_POST['Email'];
   
   # VALIDATION
   if(empty($email)){
      # MESSAGE ERREUR + REDIRECTION
      $em = "Un Email est requis";
      header("Location: ../../login.php?error=$em");
   }else if(empty($password)){
      # MESSAGE ERREUR + REDIRECTION
      $em = "Un Mot de Passe est requis";
      header("Location: ../../login.php?error=$em");
   } else {

      $sql  = "CALL auth(?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$email]);

       # VERIFIER SI L'EMAIL EXISTE
       if($stmt->rowCount() === 1){
          # RECUPERATION DES DONNÉES UTILISATEUR
          $user = $stmt->fetch();
          $stmt->closeCursor();

          # SI LE NOM D'UTILISATEUR EST STRICTEMENT EGALE
          if ($user['mail'] == $email) {

               # VERIFIER LE MOT DE PASSE ENCRYPTER
              if (hash('sha512', $password) == $user['mdp']) {

                    # CONNECTION REUSSI / CREE LA SESSION
                    $_SESSION['Email'] = $user['mail'];
                    $_SESSION['Nom'] = $user['nom'];
                    $_SESSION['Prenom'] = $user['prenom'];
                    $_SESSION['Adresse'] = $user['adresse'];
                    $_SESSION['Telephone'] = $user['telephone'];
                    $_SESSION['Id'] = $user['id'];
                    $_SESSION['Role'] = $user['role'];

                    # REDIRECTION
                    header("Location: ../../index.php");

              }else {
                # MESSAGE ERREUR + REDIRECTION
                $em = "Mot de Passe Incorecte";
                header("Location: ../../login.php?error=$user");
              }
          }else {
              # MESSAGE ERREUR + REDIRECTION
              $em = "Email ou Mot de Passe Incorecte test";
              header("Location: ../../login.php?error=$em");
          }
       }
   }
}else {
  header("Location: ../../index.php");
  exit;
}
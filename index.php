<!-- traitements -->
<?php
/* Connexion à une base MySQL avec l'invocation de pilote */


    if(isset($_POST["envoyer"])){
      $errors = array();
      if(empty($_POST["firstname"])){
        $errors["firstname"] = "Veuillez saisir un nom";
      }
      if(empty($_POST["lastname"])){
          $errors["lastname"] = "Veuillez saisir un prénom";
      }
      if(empty($_POST["email"])){
          $errors["email"] = "Email Requis";
      }else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors["email"] = "Email Invalide";
      }
       
      if(empty($_POST["montant"])){
        $errors["montant"] = "Montant requis";
      }
      
      if(empty($_POST["montant"]) || strlen($_POST["phonenumber"]) !== 8 ){
        $errors["phonenumber"] = "Vous devez saisir 08 chiffres exactement";
      }

      else if(empty($errors)){
        require "partials/db.php";
        // $sql = "INSERT INTO payer(nom, prenom, email, numero) VALUES(?,?,?)";
            $req = $db->prepare("INSERT INTO payeur(nom, prenom, email, numero)  VALUES(?, ?, ?, ?)");
            $insert = $req->execute([$_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phonenumber"]]);
            $id = $db->lastInsertId();          
            echo $id;
            $req = $db->prepare("INSERT INTO enregistrement(id_payeur, montant)  VALUES(?, ?)");
            $insert = $req->execute([$id, floatval($_POST["montant"])]);

      }

    }
    

    function testInput($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

    

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
      <!-- Default form register -->
    <div class="container">

      <div class="col-lg-6 mx-auto bg-dark tewt-white mt-5">

        <form class="text-left border border-light p-3" action="" method="POST">
          <?php if(!empty($errors)):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul>
                <?php foreach($errors as $error) :?>
                  <li><?= $error ?></li>
                
                <?php endforeach; ?>
              </ul>
            
            </div>
          <?php endif;?>
          

          <p class="h4 mb-4 text-white">Nouvelle participation</p>

          <div class="form-row mb-4">
              <div class="col">
                  <!-- First name -->
                  <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom">
              </div>
              <div class="col">
                  <!-- Last name -->
                  <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Nom">
              </div>
          </div>

          <!-- E-mail -->
          <input type="email" id="email" class="form-control mb-4" name="email" placeholder="E-mail">

          <!-- Password -->
          <div class="form-group">            
          </div>
          

          <!-- Phone number -->
          <div class="form-row mb-4">
              <div class="col">
                <input type="text" id="montant" class="form-control" name="montant" placeholder="Montant participation..." aria-describedby="montant">
              </div>
              <div class="col">
                <input type="text" id="phonenumber" class="form-control" name="phonenumber" placeholder="Numéro de téléphone" aria-describedby="phonenumber">
                  <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                  8 chiffres sont requis *
                  </small>
              </div>
            
          </div>
          

          <!-- Sign up button -->
          <button class="btn btn-info my-4 btn-block" name="envoyer" type="submit">Enregistrer</button>

        </form>
      </div>
    </div>
<!-- Default form register -->

  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>

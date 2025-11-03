<?php
session_start();


if(
    isset($_POST["email"]) && 
    isset($_POST["img"]) && 
     isset($_POST["lastname"])
     &&  isset($_POST["name"])

){
    $database = new PDO("mysql:host=127.0.0.1;dbname=USER","root","root");
    $request = $database->prepare("SELECT * FROM User WHERE email=? AND img=? AND lastname=? AND name=?");
    $request->execute([
        $_POST["email"],
        $_POST["img"],
          $_POST["lastname"],
          $_POST["name"]

    ]);
    $user = $request->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil exos php novembre 2025</title>
</head>

<body>
    <?php
    // // echo "Hello World";
    // $user = [
    //     "email" => "billy@gmail.com",
    //     "name" => "Billy",
    //     "lastname"   => "Joe",
    //     "img"  => "http://unsplash.it/100/100",
    // ];

    // var_dump($user);
    ?>

    <!-- <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>John Doe</h1>
      <p>Architect & Engineer</p>
      <p>We love that guy</p>
    </div>
  </div>
</div> -->


<p>Ce que veut Massi d'après sa maquette
</p>

<section>
    <img src="<?= htmlspecialchars($user['img']) ?>" alt="avatar">
    <div class="user-info">
        <h1 class="name"> <?= htmlspecialchars($user['name']) ?></h1>
        <p class="email">  <?= htmlspecialchars($user['email']) ?></p>
      <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo incidunt delectus officiis. Optio voluptatibus nobis nesciunt facilis. Ea dignissimos id corporis asperiores earum, magnam architecto sint laborum blanditiis enim maiores?</p> 
    </div>
</section>
</body>

</html>



<?php session_start();

if (!isset($_SESSION["email"])) {
    // Si l'utilisateur n'est pas connecté, on récupère son nom d'utilisateur
    header("Location: login.php");
    exit();
}

$email = $_SESSION["email"];
?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <h1>Accueil 31 Juillet 2025</h1>
    <a href="login.php">Se connecter</a>
        <a href="logout.php">Se déconnecter</a>
    <h2>Bienvenue <?= htmlspecialchars($email) ?> sur la page d'administration !!!!!!!!!!!!! </h2>

</body>

</html> -->
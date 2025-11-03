<?php session_start();

if (isset($_SESSION["email"])) {
    // Si l'utilisateur est connecté, on récupère son nom d'utilisateur
    header("Location: index.php");
    exit();
}
function connect_database(): PDO
{
    $database = new PDO("mysql:host=127.0.0.1;dbname=novembre", "root", "root");
    return $database;
}


// Read (login)
function get_user_by_email($email): ?array
{
    $db = connect_database();
    $stmt = $db->prepare("SELECT email, password FROM User WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$error = null;


if (isset($_POST['email'], $_POST['password'])) {
    $user = get_user_by_email($_POST['email']);
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['email'] = $user['email'];
        // $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

?>
<?php if ($error): ?>
    <p><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <input type="text" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>




<?php
session_start();
include("../inc/db.php");

// Redirect if already logged in
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: index.php");
    exit;
}

$error = '';

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username and password are correct
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $baglanti->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password]);

    if ($stmt->rowCount() > 0) {
        // Set session variables
        $user = $stmt->fetch();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['yetki'] = $user['yetki'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Kullanıcı adı veya şifre yanlış!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger"><?= $error ?></div>
                                <?php endif; ?>
                                <form method="post" action="login.php">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Username</label>
                                        <input class="form-control py-4" id="inputEmailAddress" name="username" value="<?= htmlspecialchars($username ?? '') ?>" type="text" placeholder="Enter email username" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" name="remember" />
                                            <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.html">Forgot Password?</a>
                                        <input type="submit" class="btn btn-primary" value="login">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>

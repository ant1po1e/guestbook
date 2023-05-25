<?php
include "db_conn_user.php";

// Init vars
$name = $email = $password = '';
$name_err = $email_err = $password_err = '';

// Process form when post submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Check if registration form is submitted
    if (isset($_POST['register'])) {
        // Put post vars in regular vars
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Validate email
        if (empty($email)) {
            $email_err = 'Please enter email';
        } else {
            // Prepare a select statement
            $sql = 'SELECT id FROM users WHERE email = :email';

            if ($stmt = $pdo->prepare($sql)) {
                // Bind variables
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);

                // Attempt to execute
                if ($stmt->execute()) {
                    // Check if email exists
                    if ($stmt->rowCount() === 1) {
                        $email_err = 'Email is already taken';
                    }
                } else {
                    die('Something went wrong');
                }
            }

            unset($stmt);
        }

        // Validate name
        if (empty($name)) {
            $name_err = 'Please enter name';
        }

        // Validate password
        if (empty($password)) {
            $password_err = 'Please enter password';
        } elseif (strlen($password) < 6) {
            $password_err = 'Password must be at least 6 characters';
        }

        // Make sure errors are empty
        if (empty($name_err) && empty($email_err) && empty($password_err)) {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare insert query
            $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

            if ($stmt = $pdo->prepare($sql)) {
                // Bind params
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

                // Attempt to execute
                if ($stmt->execute()) {
                    // Redirect to login
                    header('location: table.php');
                    exit;
                } else {
                    die('Something went wrong');
                }
            }
            unset($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index-style.css">
</head>

<body>
    <!--  Navbar -->
    <header class="border-bottom border-3">
        <h2 class="logo">Ant1po1e</h2>
        <nav class="navigation">
        <?php
            // Check if user is logged in
            if (isset($_SESSION['email'])) {
                echo '<a href="logout.php" class="btn btn-primary logout-button">Logout</a>';
            } else {
                echo '<button class="btnLogin-popup">Login</button>';
            }
            ?>
        </nav>
    </header>
    <!--  Navbar-END -->


    <!-- Wrapper -->
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" name="login" class="button" href="table.php">Login</button>

                <div class="login-register">
                    <p>Don't have an account?<a href="#" class="register-link"> Register</a></p>
                </div>
                <div class="error-msg justify-content-center d-flex align-items-center">
                    <span class="text-danger"><?php echo $password_err; ?></span>
                    <span
                        class="text-danger"><?php echo $email_err; ?></span>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <span class="text-danger"><?php echo $name_err; ?></span>
                    <input type="text" name="name" value="<?php echo $name; ?>" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" value="<?php echo $email; ?>" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" required> I agree to the terms & conditions</label>
                </div>
                <button type="submit" name="register" class="button">Register</button>
                <div class="login-register">
                    <p>Already have an account?<a href="#" class="login-link"> Login</a></p>
                </div>


                <div class="error-msg justify-content-center d-flex align-items-center"><span
                        class="text-danger"><?php echo $email_err; ?></span>
                    <span class="text-danger"><?php echo $name_err; ?></span></div>

            </form>
        </div>
    </div>
    <!-- Wrapper-END -->


    <!-- Footer -->
    <footer>
        <p>Copyright &copy; 2022 <a href="https://github.com/ant1po1e" class="text-white fw-bold" target="blank">Ant1po1e</a></p>
    </footer>
    <!-- Footer-END -->


    <!-- Javascript -->
    <script src="script.js"></script>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
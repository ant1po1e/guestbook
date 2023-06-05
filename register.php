<?php

@include 'config.php';

if(isset($_POST['submit'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = md5($_POST['password']);

  $select = " SELECT * FROM login WHERE email = '$email' && password = '$password' ";

  $result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist!';
} else{
    $insert = "INSERT INTO login(email, password) VALUES('$email','$password')";
    mysqli_query($conn, $insert);
    header('location:index.php');
}

};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/indexstyle.css" />
    <title>Guesbook</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="gnavbar navbar fw-medium navbar-dark border-bottom border-3 justify-content-evenly fs-1 mb-5 p-3">
        Rosemi Luxury Hotel
    </nav>
    <!-- Navbar-END -->


    <!-- Table -->
    <section class="pb-5" style="margin-top:30px; padding-top:70px;">
        <div class="container pt-4 pb-5 rounded border border border-3 text-white">
            <div class="text-center mb-4">
                <h3 style="padding-top:12px;">Register</h3>
            </div>
            <?php
        if(isset($error)){
          foreach($error as $error){
          echo '<p class="error-msg">'.$error.'</p>';
        }
      }
      ?>
            <div class="container d-flex justify-content-center">
                <form action="" method='post'
                    style="width:270px; min-width:270px; margin-right:30px;">

                    <div class="mb-3">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control border border-gray" name="email" >
                    </div>

                    <div class="mb-3">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control border border-gray" name="password" required>
                    </div>

                    <div class="remember-forgot">
                    <label><input type="checkbox" required> I agree to the terms & conditions</label>
                </div><br>

                    <div>
                        <button type="submit" class="button" name="submit">Register</button>
                    </div>
                    <div class="pt-3 text-center">
                        <p>Already have an account? <a href="index.php"
                                class="register-link text-white fw-bolder">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Table-END -->


    <!-- Footer -->
    <footer class="text-white text-center p-4 border-top border-3">
        <p>Copyright &copy; 2022 <a href="https://github.com/ant1po1e" class="text-white fw-bold"
                target="blank">Ant1po1e</a></p>
    </footer> <!-- Footer-END -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
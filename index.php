<?php
error_reporting(0);
    //User dan Pass untuk login ke aplikasi
        $user = array(
            //ini User dan Passwordnya
                        "user" => "Admin",
                        "pass" => "guestbookadmin"            
                );
if (isset($_POST['submit'])) {
    //Sesion Login
    if ($_POST['username'] == $user['user'] && $_POST['password'] == $user['pass']){
        $_SESSION["username"] = $_POST['username']; 
        header("Location: table.php");
    } else {
        display_login_form();
        //Pesan Error ketika salah user atau password
        echo "<script>alert('Username atau password salah!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    }
}    
else { 
    display_login_form();
}
function display_login_form(){ ?>
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
        <div class="container pt-4 pb-5 rounded border border border-4 text-white">
            <div class="text-center mb-4">
                <h3 style="padding-top:20px;">Login</h3>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'
                    style="width:300px; min-width:300px; margin-right:30px;">
                    <div class="mb-3">
                        <label class="form-label">User</label>
                        <input type="text" class="form-control border border-gray" name="username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control border border-gray" name="password">
                    </div>

                    <div>
                        <button type="submit" class="button" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Table-END -->


    <!-- Footer -->
    <footer class="text-white text-center p-3 border-top border-3">
        <p>Copyright &copy; 2022 <a href="https://github.com/ant1po1e" class="text-white fw-bold"
                target="blank">Ant1po1e</a></p>
    </footer> <!-- Footer-END -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
<?php } ?>
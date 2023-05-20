<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $message = $_POST['message'];

  $sql = "UPDATE `guestbook` SET `name`='$name',`email`='$email',`address`='$address',`message`='$message' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: table.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

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
    <link rel="stylesheet" href="css/style.css" />
    <title>Guestbook</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="gnavbar navbar fw-medium navbar-dark border-bottom border-3 justify-content-center fs-3 mb-5 p-3">
        Guestbook Application
    </nav>
    <!-- Navbar-END -->


    <!-- Table -->
    <section class="pb-5">
        <div class="container bg-light pt-5 pb-5 rounded border border-dark border-4">
            <div class="text-center mb-4">
                <h3>Edit User Information</h3>
                <p class="text-muted">Click update after changing any information</p>
            </div>

            <?php
    $sql = "SELECT * FROM `guestbook` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">

                        <div class="col">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control border border-gray" name="name">
                        </div>

                        <div class="col">
                            <label class="form-label">Email:</label>
                            <input type="text" class="form-control border border-gray" name="email">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <input type="text" class="form-control border border-gray" name="address">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <input type="text" class="form-control border border-gray" name="message">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="table.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Table-END -->


    <!-- Footer -->
    <footer class="text-white text-center p-3 border-top border-3">
        <a id="back-button" class="btn btn-try btn-lg btn-back" href="http://localhost/php_yudha/guestbook/">
            << Back</a> </footer> <!-- Footer-END -->
                <!-- Bootstrap -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                    crossorigin="anonymous">
                </script>

</body>

</html>
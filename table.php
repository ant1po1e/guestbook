<?php
include "db_conn.php";
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
        <div class="container table">
            <?php
    if (isset($_GET["msg"])) {
    $msg = $_GET["msg"];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    ' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
            <a href="add-new.php" id="button" class="btn btn-try btn-lg mb-3">Add New</a>
            <table class="table table-hover text-center bg-light">
                <thead class="table-light border border-dark border-3">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-light border border-dark border-3">
                    <?php
        $sql = "SELECT * FROM `guestbook`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["message"] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i
                                    class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i
                                    class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                    <?php
        }
        ?>
                </tbody>
            </table>
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
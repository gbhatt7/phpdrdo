<?php
require("connect.php");

$connection = new mysqli($servername, $username, $password, $database);

//create variables
$name = "";
$email = "";
$phone = "";
$division = "";
$cader = "";
$post = "";
$postin = "";
$postout = "";
$address = "";
$education = "";

$errorMessage = "";
$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //show data

    if (!isset($_GET["id"])) {
        header("location: /phpdrdo/employee.php");
        exit;
    }

    $id = $_GET["id"];

    //read data
    $sql = "SELECT * FROM employee WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /phpdrdo/employee.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $division = $row["division"];
    $cader = $row["cader"];
    $post = $row["post"];
    $postin = $row["postin"];
    $postout = $row["postout"];
    $address = $row["address"];
    $education = $row["education"];
} else {
    //update data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $division = $_POST["division"];
    $cader = $_POST["cader"];
    $post = $_POST["post"];
    $postin = $_POST["postin"];
    $postout = $_POST["postout"];
    $address = $_POST["address"];
    $education = $_POST["education"];

    do {

        if (empty($name) || empty($email) || empty($phone) || empty($division) || empty($cader) || empty($post) || empty($postin) || empty($address)) {
            $errorMessage = "ALL THE FIELDS ARE REQUIRED !";
            break;
        }

        //add new client to database
        $sql = "UPDATE clients " .
            "SET name='$name', email='$email', phone='$phone', division='$division', cader='$cader', post='$post', postin='$postin', postout='$postout', address='$address', education='$education'" .
            "WHERE id=$id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "UPDATED SUCCESSFULLY";

        header("location: /phpdrdo/employee.php");
        exit;
    } while (true);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRDO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark align-items-center px-5">
        <div class="collapse navbar-collapse align-items-center mx-5 px-5" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item text-center px-4">
                    <a class="nav-link active text-center fw-bold fs-4" aria-current="page" href="/phpdrdo/employee.php">Employee</a>
                </li>
                <li class="nav-item text-center px-4">
                    <a class="nav-link text-center fw-bold fs-4" href="/phpdrdo/event.php">Event</a>
                </li>
                <li class="nav-item text-center px-4">
                    <a class="nav-link text-center fw-bold fs-4" href="/phpdrdo/training.php">Training</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-3">
        <h2>New Employee</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row">
                <div class="col-md-6 pe-5">
                    <div class="form-group">
                        <label for="image">Employee Image</label>
                        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="division" class="col-sm-3 col-form-label">Division</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="division" value="<?php echo $division; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cader" class="col-sm-3 col-form-label">Cader</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cader" value="<?php echo $cader; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="post" class="col-sm-3 col-form-label">Post</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="post" value="<?php echo $post; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="postin" class="col-sm-3 col-form-label">Post In</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="postin" value="<?php echo $postin; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="postout" class="col-sm-3 col-form-label">Post Out</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="postout" value="<?php echo $postout; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="education" class="col-sm-3 col-form-label">Education</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="education" value="<?php echo $education; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3 d-grid'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";
            }
            ?>
            <br />
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-danger" href="/phpdrdo/employee.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRDO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <div class="container">
        <h2>List of Employees</h2>
        <div class="row">
            <div class="sm-3 col-sm-3 d-grid">
                <a class="btn btn-primary" href="/phpdrdo/create/employee.php" role="button">Add Employee</a>
            </div>
            <div class="offset-sm-6 col-sm-3 d-grid">
                <a class="btn btn-success" href="/phpdrdo/export/employee.php" role="button">Export</a>
            </div>
        </div>
        <br>
        <div class="input-group mt-3 mb-3">
            <input type="text" id="search" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="search..">
        </div>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Division</th>
                    <th>Cader</th>
                    <th>Post In</th>
                    <th>Post Out</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                require("connect.php");

                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM employee";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[division]</td>
                    <td>$row[cader]</td>
                    <td>$row[postin]</td>
                    <td>$row[postout]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/phpdrdo/edit/employee.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/phpdrdo/delete/employee.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>


            </tbody>
        </table>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="index.js"></script>

</html>
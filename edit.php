<?php
include 'db_con.php';

$id = $_GET['Uid'];

$sql = "SELECT * FROM users WHERE Uid = '$id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html>
<head>

    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Edit User</h3>

        </div>

        <div class="card-body">

            <form action="update.php" method="POST">

                <input type="hidden"
                       name="Uid"
                       value="<?php echo $row['Uid']; ?>">

                <div class="mb-3">

                    <label>User Name</label>

                    <input
                        type="text"
                        class="form-control"
                        name="Uname"
                        value="<?php echo $row['Uname']; ?>">

                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select
                        class="form-select"
                        name="Status">

                        <option value="Active"
                        <?php if($row['Status']=="Active") echo "selected"; ?>>
                        Active
                        </option>

                        <option value="Inactive"
                        <?php if($row['Status']=="Inactive") echo "selected"; ?>>
                        Inactive
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">
                    Update
                </button>

                <a href="index.php"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>
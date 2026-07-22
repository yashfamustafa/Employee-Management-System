<?php

include 'db_con.php';
$editUser = null;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $sqlEdit = "SELECT * FROM users WHERE Uid='$id'";

    $resultEdit = $conn->query($sqlEdit);

    $editUser = $resultEdit->fetch_assoc();
}
$deleteUser = null;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sqlDelete = "SELECT * FROM users WHERE Uid='$id'";

    $resultDelete = $conn->query($sqlDelete);

    $deleteUser = $resultDelete->fetch_assoc();
}

$sql = "SELECT * FROM users";
// Execute the SQL query
$result = $conn->query($sql);




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css" integrity="sha512-ApSLB1Pd3/bZN8fWB/RG9YhN/7bd9Hkf3AGaE2mPfebjrxagjuBtx2GcgdqIlJkUzwylBo61r9Xa9NmgBI0swA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">



    <link rel="stylesheet" href="style.css">




</head>

<body>



    <div class="container">

        <h1>Employee Management System</h1>

        <!-- Form -->

        <div class="form-container">

            <h2>Add New User</h2>

            <form action="formSubmit.php" method="POST">

                <label>User Name</label>
                <input type="text" placeholder="Enter User Name" name="Uname" required>

                <label>Status</label>

                <select name="Status" required>
                    <option>Select Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>

                <button type="submit">Save User</button>

            </form>

        </div>

        <!-- Table -->

        <div class="table-container">

            <h2>User Records</h2>

            <table>

                <thead>

                    <tr>

                        <th>UID</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody id="tableData">

                </tbody>

            </table>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        fetch("getData.php")

            .then(function(response) {

                return response.json();

            })

            .then(function(data) {
                // console.log(data);
                let output = "";

                data.forEach(function(user) {

                    output += `
        <tr>

            <td>${user.Uid}</td>

            <td>${user.Uname}</td>

            <td>${user.Status}</td>

            <td>${user.CreatedAt}</td>

            <td>

                <a href="index.php?edit=${user.Uid}"
                   class="btn btn-primary btn-sm">

                    <i class="fa-solid fa-pen"></i>

                </a>

                <a href="index.php?delete=${user.Uid}"
                   class="btn btn-danger btn-sm">

                    <i class="fa-solid fa-trash"></i>

                </a>

            </td>

        </tr>
        `;

                });

                document.getElementById("tableData").innerHTML = output;

            })

            .catch(function(error) {

                console.log(error);

            });
    </script>
    <div class="modal fade"
        id="editModal"
        tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="update.php" method="POST">

                    <div class="modal-header">

                        <h5 class="modal-title">
                            Update User
                        </h5>

                        <button class="btn-close"
                            data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <input
                            type="hidden"
                            name="Uid"
                            value="<?php echo $editUser['Uid'] ?? ''; ?>">

                        <label>User Name</label>

                        <input
                            class="form-control"
                            name="Uname"
                            value="<?php echo $editUser['Uname'] ?? ''; ?>">

                        <br>

                        <label>Status</label>

                        <select
                            class="form-select"
                            name="Status">

                            <option value="Active"
                                <?= ($editUser['Status'] ?? '') == "Active" ? "selected" : ""; ?>>
                                Active
                            </option>

                            <option value="Inactive"
                                <?= ($editUser['Status'] ?? '') == "Inactive" ? "selected" : ""; ?>>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="modal-footer">

                        <button
                            class="btn btn-success">
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>





    <?php if (isset($_GET['edit'])) { ?>

        <script>
            var myModal =
                new bootstrap.Modal(document.getElementById('editModal'));

            myModal.show();
        </script>

    <?php } ?>



    <div class="modal fade" id="deleteModal" tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <form action="delete.php" method="POST">

                    <div class="modal-header bg-danger text-white">

                        <h5 class="modal-title">
                            Delete User
                        </h5>

                        <button class="btn-close btn-close-white"
                            data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <input
                            type="hidden"
                            name="Uid"
                            value="<?php echo $deleteUser['Uid'] ?? ''; ?>">

                        <h5 class="text-center">

                            Are you sure you want to delete

                            <br><br>

                            <strong>

                                <?php echo $deleteUser['Uname'] ?? ''; ?>

                            </strong>

                            ?

                        </h5>

                    </div>

                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <button
                            type="submit"
                            class="btn btn-danger">

                            Delete

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
    <?php if (isset($_GET['delete'])) { ?>

        <script>
            var deleteModal =
                new bootstrap.Modal(document.getElementById('deleteModal'));

            deleteModal.show();
        </script>

    <?php } ?>





</body>

</html>
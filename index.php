<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_con.php';

/*=========================
    Edit User
=========================*/

$editUser = null;

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $sqlEdit = "SELECT * FROM users WHERE Uid='$id'";

    $resultEdit = $conn->query($sqlEdit);

    $editUser = $resultEdit->fetch_assoc();
}

/*=========================
    Delete User
=========================*/

$deleteUser = null;

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $sqlDelete = "SELECT * FROM users WHERE Uid='$id'";

    $resultDelete = $conn->query($sqlDelete);

    $deleteUser = $resultDelete->fetch_assoc();
}

/*=========================
    Dashboard Cards
=========================*/

// Total Users
$totalQuery = "SELECT COUNT(*) AS total FROM users";
$totalResult = $conn->query($totalQuery);
$totalUsers = $totalResult->fetch_assoc()['total'];

// Active Users
$activeQuery = "SELECT COUNT(*) AS active FROM users WHERE Status='Active'";
$activeResult = $conn->query($activeQuery);
$activeUsers = $activeResult->fetch_assoc()['active'];

// Inactive Users
$inactiveQuery = "SELECT COUNT(*) AS inactive FROM users WHERE Status='Inactive'";
$inactiveResult = $conn->query($inactiveQuery);
$inactiveUsers = $inactiveResult->fetch_assoc()['inactive'];

/*=========================
    Fetch All Users
=========================*/

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="dashboard.css">

</head>

<body>

<div class="container">

    <!-- ================= HEADER ================= -->

    <div class="dashboard-header">

        <div>

            <h1>

                <i class="fa-solid fa-users"></i>

                Employee Management System

            </h1>

            <p>

                Manage your employees quickly and efficiently.

            </p>

        </div>

        <div class="user-box">

            <div class="user-info">

                <small>Logged in as</small>

                <h5>

                    <?php echo $_SESSION['username']; ?>

                </h5>

            </div>

            <a href="logout.php"
               class="btn btn-danger">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </a>

        </div>

    </div>

    <!-- ================= DASHBOARD CARDS ================= -->

    <div class="dashboard-cards">

        <div class="card-box blue">

            <i class="fa-solid fa-users"></i>

            <h4>Total Users</h4>

            <h2>

                <?php echo $totalUsers; ?>

            </h2>

        </div>

        <div class="card-box green">

            <i class="fa-solid fa-user-check"></i>

            <h4>Active Users</h4>

            <h2>

                <?php echo $activeUsers; ?>

            </h2>

        </div>

        <div class="card-box red">

            <i class="fa-solid fa-user-xmark"></i>

            <h4>Inactive Users</h4>

            <h2>

                <?php echo $inactiveUsers; ?>

            </h2>

        </div>

    </div>

    <!-- ================= ADD EMPLOYEE ================= -->

    <div class="form-container shadow-lg">

        <h2>

            <i class="fa-solid fa-user-plus"></i>

            Add New Employee

        </h2>

        <form action="formSubmit.php" method="POST">

            <label>User Name</label>

            <input type="text"
                   name="Uname"
                   placeholder="Enter User Name"
                   required>

            <label>Status</label>

            <select name="Status" required>

                <option value="">Select Status</option>

                <option value="Active">Active</option>

                <option value="Inactive">Inactive</option>

            </select>

            <button type="submit">

                <i class="fa-solid fa-floppy-disk"></i>

                Save Employee

            </button>

        </form>

    </div>

    <!-- ================= EMPLOYEE TABLE STARTS HERE ================= -->


    <!-- ================= EMPLOYEE TABLE ================= -->

<div class="table-container">

    <div class="table-header">

        <h2>

            <i class="fa-solid fa-table"></i>

            Employee Records

        </h2>

        <input
            type="text"
            id="searchInput"
            placeholder="🔍 Search Employee...">

    </div>

    <table class="table table-hover align-middle">

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

            <!-- Fetch API will load data here -->

        </tbody>

    </table>

</div>

<!-- ================= BOOTSTRAP ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- ================= FETCH API ================= -->

<script>

fetch("getData.php")

.then(function(response){

    return response.json();

})

.then(function(data){

    let output = "";

    data.forEach(function(user){

        output += `

        <tr>

            <td>${user.Uid}</td>

            <td>${user.Uname}</td>

            <td>

                <span class="${
                    user.Status=="Active"
                    ?
                    'status-active'
                    :
                    'status-inactive'
                }">

                    ${user.Status}

                </span>

            </td>

            <td>

                ${new Date(user.CreatedAt).toLocaleString()}

            </td>

            <td>

                <a href="index.php?edit=${user.Uid}"

                   class="btn btn-outline-primary btn-sm">

                    <i class="fa-solid fa-pen"></i>

                </a>

                <a href="index.php?delete=${user.Uid}"

                   class="btn btn-outline-danger btn-sm">

                    <i class="fa-solid fa-trash"></i>

                </a>

            </td>

        </tr>

        `;

    });

    document.getElementById("tableData").innerHTML = output;

    /*=========================
        Search Employee
    =========================*/

    document.getElementById("searchInput")

    .addEventListener("keyup", function(){

        let value = this.value.toLowerCase();

        let rows = document.querySelectorAll("#tableData tr");

        rows.forEach(function(row){

            if(row.innerText.toLowerCase().includes(value)){

                row.style.display = "";

            }

            else{

                row.style.display = "none";

            }

        });

    });

})

.catch(function(error){

    console.log("Error :", error);

});

</script>

<!-- ================= EDIT MODAL STARTS HERE ================= -->



<!-- ================= EDIT MODAL ================= -->

<div class="modal fade"
     id="editModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="update.php" method="POST">

                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="fa-solid fa-pen-to-square"></i>

                        Update Employee

                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <input type="hidden"
                           name="Uid"
                           value="<?php echo $editUser['Uid'] ?? ''; ?>">

                    <label>User Name</label>

                    <input type="text"
                           class="form-control"
                           name="Uname"
                           value="<?php echo $editUser['Uname'] ?? ''; ?>"
                           required>

                    <br>

                    <label>Status</label>

                    <select class="form-select"
                            name="Status"
                            required>

                        <option value="Active"
                        <?= (($editUser['Status'] ?? '')=="Active") ? "selected" : ""; ?>>

                            Active

                        </option>

                        <option value="Inactive"
                        <?= (($editUser['Status'] ?? '')=="Inactive") ? "selected" : ""; ?>>

                            Inactive

                        </option>

                    </select>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Update Employee

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php if(isset($_GET['edit'])){ ?>

<script>

const editModal = new bootstrap.Modal(document.getElementById('editModal'));

editModal.show();

</script>

<?php } ?>



<!-- ================= DELETE MODAL ================= -->

<div class="modal fade"
     id="deleteModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="delete.php"
                  method="POST">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title">

                        <i class="fa-solid fa-trash"></i>

                        Delete Employee

                    </h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body text-center">

                    <input type="hidden"
                           name="Uid"
                           value="<?php echo $deleteUser['Uid'] ?? ''; ?>">

                    <i class="fa-solid fa-circle-exclamation fa-4x text-danger mb-3"></i>

                    <h4>

                        Are you sure?

                    </h4>

                    <p>

                        You are about to permanently delete

                    </p>

                    <h5 class="text-primary">

                        <?php echo $deleteUser['Uname'] ?? ''; ?>

                    </h5>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="submit"
                            class="btn btn-danger">

                        <i class="fa-solid fa-trash"></i>

                        Delete

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php if(isset($_GET['delete'])){ ?>

<script>

const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

deleteModal.show();

</script>

<?php } ?>

</div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include_once("../../config.php");
    if (isset($_SESSION['roleControl']) == null) {
        header("location:../index.php");
    }
    $userControl = $conn->query("Select * from user where userId='" . $_SESSION['roleControl'] . "'");
    $row = mysqli_fetch_array($userControl);
    ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php include_once("../layout/nav.php") ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once("../layout/layoutSidenav_nav.php") ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row">
                        <h2>Role</h2>
                        <?php
                        if ($_GET['role']) {
                            include_once("../../config.php");
                            $role = $conn->query("Select * from role,userrole where userrole.roleId=role.roleId and userrole.userId=" . $_GET['role'] . "");
                            $allrole = $conn->query("Select * from role");
                            while ($row = mysqli_fetch_array($allrole)) {
                                echo ("
                                <div class='input-group mb-3'>
                                <div class='input-group-prepend'>
                                    <div class='input-group-text'>
                                        <input type='checkbox' aria-label='Checkbox for following text input'>
                                    </div>
                                </div>
                                <input readonly class='form-control text-muted' value='" . $row['roleName'] . "'>
                            </div>
                                ");
                            }
                        }
                        ?>
                    </div>

                </div>

            </main>


            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
</body>

</html>
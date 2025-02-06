<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-2.2.2/datatables.min.css" rel="stylesheet">

    <title>live-Ajax-MVC</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#">YouCode</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger">Application Ajax MVC ...</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">All Users</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
                    <i class="fas fa-users"></i> Add User
                </button>
            </div>
        </div>
        <hr class="my-1">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">

                  

                </div>
            </div>
        </div>
    </div>

    <!-- add user -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" id="form-data">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" placeholder="Enter first name" id="first_name" name="fname" required>
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Enter last name" id="last_name" name="lname" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" placeholder="Enter phone number" id="phone" name="phone" required>
                        </div>

                        <button type="submit" name="insert" id="insert" class="btn btn-success">insert</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- edit user -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="edit-form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="ed-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" id="ed-phone" name="phone" required>
                        </div>
                        <button type="submit" name="update" id="update" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-2.2.2/datatables.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="script.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


    <title>Accounts</title>
</head>

<body>

    <?php
    include 'config.php';

    if (isset($_POST['newCust'])) {
        if (isset($_POST['New_customer'])) {
            $name  = $_POST['New_customer'];

            $sql = "INSERT INTO `rojmel` (`Name`, `credit`, `debit`, `Date`) VALUES ('$name', NULL, NULL, CURRENT_DATE());";
            $result = mysqli_query($cont_to_db, $sql);
            if (!$result) {
                echo "Failed!!<br>  :  <br> " . mysqli_error($cont_to_db);
            } else {
                echo "<div id='alert' role='alert' class='alert alert-success alert-dismissible fade show'>Inserted Successfully
                        <button type='button' data-bs-dismiss='alert' aria-label='Close' class='btn-close'>
                                
                        </button>
                            </div>";
                // echo "Inserted successfully.<br>";
                // header('Location: ' ."index1.html");
                // die();
            }
        }
    }
    ?>
    <?php
    if (isset($_POST['Credit_Submit'])) {

        $dt  = $_POST['Credit_date'];
        $name = $_POST['Credit_name'];
        $amount = $_POST['Credit_amount'];


        $sql = "INSERT INTO `rojmel` (`Name`, `credit`, `debit`, `Date`) VALUES ('$name', '$amount', NULL, '$dt');";
        $result = mysqli_query($cont_to_db, $sql);
        if (!$result) {
            echo "Failed!!<br>  :  <br> " . mysqli_error($cont_to_db);
        } else {
            echo "<div id='alert' role='alert' class='alert alert-success alert-dismissible fade show'>Inserted Successfully
                        <button type='button' data-bs-dismiss='alert' aria-label='Close' class='btn-close'>
                                
                        </button>
                            </div>";
        }
    }

    if (isset($_POST['Debit_Submit'])) {
        $dt  = $_POST['Debit_date'];
        $name = $_POST['Debit_name'];
        $amount = $_POST['Debit_amount'];

        $sql = "INSERT INTO `rojmel` (`Name`, `credit`, `debit`, `Date`) VALUES ('$name', NULL, '$amount', '$dt');";
        $result = mysqli_query($cont_to_db, $sql);
        if (!$result) {
            echo "Failed!!<br>  :  <br> " . mysqli_error($cont_to_db);
        } else {
            echo "<div id='alert' role='alert' class='alert alert-success alert-dismissible fade show'>Inserted Successfully
                        <button type='button' data-bs-dismiss='alert' aria-label='Close' class='btn-close'>
                                
                        </button>
                            </div>";
        }
    }

    if (isset($_POST['Edit_Submit'])) {
        $subid = $_POST['Edit_Submit'];
        $dt  = $_POST['edit_date'];
        $name = $_POST['edit_name'];
        $amount = $_POST['edit_amount'];
        // echo $subid."</br>";
        $cd = NULL;
        $db = NULL;
        if ($amount >= 0) {
            $cd = $amount;
        } else {
            $db = 0 - $amount;
        }
        $sql = "UPDATE `rojmel` SET `id`='$subid',`Name`='$name',`credit`='$cd',`debit`='$db',`Date`='$dt' WHERE id = '$subid';";
        $result = mysqli_query($cont_to_db, $sql);
        if (!$result) {
            echo "Failed!!<br>  :  <br> " . mysqli_error($cont_to_db);
        } else {
            echo "<div id='alert' role='alert' class='alert alert-success alert-dismissible fade show'>
                    <strong>Inserted Successfully</strong>
                    <button type='button' data-bs-dismiss='alert' aria-label='Close' class=' btn-close'></button>
                 </div>";
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['id'];

        $sql = "delete from rojmel where id = '$id'";
        $result = mysqli_query($cont_to_db, $sql);
        if (!$result) {
            echo "Failed!!<br>  :  <br> " . mysqli_error($cont_to_db);
        } else {
            echo "<div id='alert' role='alert' class='alert alert-danger alert-dismissible fade show'>
                    <strong>Deleted Successfully</strong>
                    <button type='button' data-bs-dismiss='alert' aria-label='Close' class='btn-close'></button>
                 </div>";
        }
    }



    ?>

    <div class="container text-center mt-3">
        <div class="row">
            <div class=" me-1 border border-2 border-success col-sm p-3">
                <h1 class="bg-secondary border border-4 border-start">Accounts</h1>
                <div class="p-3" id="headingOne">
                    <button type="button" class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">Add
                        Customer</button>
                    <button type=" button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Credit</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#collapseDebit" aria-expanded="false" aria-controls="collapseDebit">Debit</button>

                    <div class="m-4 accordion-collapse collapse" aria-labelledby="headingOne" style="width: 75%;" id="collapseCustomer" data-bs-parent="#headingOne">
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                            <div class="card card-body" id="add_Customer">
                                <div class="input-group">
                                    <input type="text" required class="form-control" name="New_customer" placeholder="Enter Name" aria-label="Recipient's username with two button addons">
                                    <button class="btn btn-outline-success" name="newCust" type="submit">Save</button>
                                    <button class="btn btn-outline-danger" id="cancel" type="reset" data-bs-toggle="collapse" data-bs-target="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="m-auto mt-3 card card-body accordion-collapse collapse" aria-labelledby="abc" style="width: 75%;" id="collapseOne" data-bs-parent="#headingOne">
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <h4>Credit</h4>
                            <div class="form-group">
                                <label class="control-label" for="email" style="display: inline;">Date:</label>
                                <input type="date" required class="w-50 form-control" name="Credit_date" value="" style="display: inline;">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="pwd">Name:</label>

                                <!-- PHP block for distinct name list -->
                                <?php
                                $sql = "SELECT DISTINCT(Name) FROM `rojmel`;";
                                $result =   mysqli_query($cont_to_db, $sql);
                                ?>
                                <!-- End php block -->

                                <select required class="form-select w-50 m-2" name="Credit_name" style="display: inline;">
                                    <?php
                                    while ($list = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $list['Name']; ?>"><?php echo $list['Name']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">Amount:</label>
                                <input required type="text" class="w-50 form-control" name="Credit_amount" value="" style="display: inline;">
                            </div>

                            <div class="form-group mt-3">
                                <div class="">
                                    <button type="submit" name="Credit_Submit" class="btn btn-outline-success">Submit</button>
                                    <button class="btn btn-outline-danger" type="reset" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Cancel</button>
                                </div>
                                <div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="m-auto mt-3 card card-body accordion-collapse collapse" aria-labelledby="abc" style="width: 75%;" id="collapseDebit" data-bs-parent="#headingOne">
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <h4>Debit</h4>
                            <div class="form-group">
                                <label class="control-label" for="email" style="display: inline;">Date:</label>
                                <input type="date" required class="w-50 form-control" name="Debit_date" value="" style="display: inline;">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="pwd">Name:</label>

                                <!-- PHP block for distinct name list -->
                                <?php
                                $sql = "SELECT DISTINCT(Name) FROM `rojmel`;";
                                $result =   mysqli_query($cont_to_db, $sql);
                                ?>
                                <!-- End php block -->

                                <select required class="form-select w-50 m-2" name="Debit_name" style="display: inline;">
                                    <?php
                                    while ($list = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $list['Name']; ?>"><?php echo $list['Name']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">Amount:</label>
                                <input required type="text" class="w-50 form-control" name="Debit_amount" value="" style="display: inline;">
                            </div>


                            <div class="form-group mt-3">
                                <div class="">
                                    <button type="submit" name="Debit_Submit" class="btn btn-outline-success">Submit</button>
                                    <button class="btn btn-outline-danger" type="reset">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button> -->

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Edit Form Begins -->

                                <div class="container ">
                                    <div class="form-group d-flex justify-content-around">
                                        <div class=""><label class="control-label" for="email" style="display: inline;"> Date </label></div>
                                        <div><strong>:</strong></div>
                                        <div class=""><input type="date" required class="form-control" id="edit_date" name="edit_date" style="display: inline;"></div>
                                    </div>

                                    <div class="form-group d-flex justify-content-around">
                                        <div class=""><label class="control-label" for="pwd"> Name </label></div>
                                        <div><strong>:</strong></div>
                                        <div class="">
                                            <!-- PHP block for distinct name list -->
                                            <?php
                                            $sql1 = "SELECT DISTINCT(Name) FROM `rojmel`;";
                                            $result1 =   mysqli_query($cont_to_db, $sql1);
                                            ?>
                                            <!-- End php block -->

                                            <select required name="edit_name" class="form-select m-2" style="display: inline;">

                                                <?php
                                                while ($list1 = mysqli_fetch_assoc($result1)) {
                                                ?>
                                                    <option value="<?php echo $list1['Name']; ?>"><?php echo $list1['Name']; ?></option>
                                                <?php } ?>
                                                <option selected id="edit_name">Name</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-around">
                                        <div class=""><label class="control-label" for="email">Amount</label></div>
                                        <div><strong>:</strong></div>
                                        <div class=""><input required type="text" name="edit_amount" class=" form-control" id="edit_amount" value="" style="display: inline;"></div>
                                    </div>
                                </div>

                                <!-- Edit form Ends -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                <button type="Submit" id="Edit_Submit" name="Edit_Submit" class="btn btn-outline-success">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="test border border-2 border-success col-sm p-3">
                <h1 class="bg-secondary">View</h1>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $sql = "SELECT * FROM `rojmel` ORDER BY id DESC;";
                                $result =   mysqli_query($cont_to_db, $sql);
                                $count = 1;
                                while ($list = mysqli_fetch_assoc($result)) {

                                    $formattedDate = date("d/m/Y",  strtotime($list['Date']));
                                    $net = $list['credit'] - $list['debit'];

                                ?>
                                    <!-- End php block -->
                            <tr class="<?php if ($net >= 0) {
                                            echo 'table-success';
                                        } else {
                                            echo 'table-danger';
                                        } ?>">
                                <th scope="row"><?php echo $count; ?></th>
                                <td id="<?php echo $count; ?>" value="<?php echo $list['Name']; ?>"><?php echo $list['Name']; ?></td>
                                <td id="<?php echo $count; ?>" value="<?php echo $formattedDate ?>"><?php echo $formattedDate ?></td>
                                <td class="p-0" id="<?php echo $count; ?>" name="<?php echo $count; ?>" value="<?php echo $net ?>"><?php echo $net ?></p>
                                </td>
                                <td id="<?php echo $count++; ?>" name="edit">
                                    <button class="btn edit1" onclick="datapass(<?php echo $list['id']; ?>,'<?php echo $list['Name']; ?>',<?php echo $net ?>,'<?php echo $list['Date']; ?>')" id="edit1" value="<?php echo $list['id']; ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <a class="btn" href="index2.php?delete=true&id=<?php echo $list['id']; ?>" name="delete">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                </td>
                            <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="javascript/javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



</body>

</html>
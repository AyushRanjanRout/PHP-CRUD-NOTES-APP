<!doctype html>
<html lang="en">
<?php
$insert = false;
$update = false;
$delete = false;
include('conn.php');
// Delete Function 
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
    $output = mysqli_query($conn, $sql);
    if (!$output) {
        $delete = false;
    } else {
        $delete = true;
        header("Location: index.php");
        exit;
    }
}
// Create Function
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'])) {
        $name = $_POST['title'];
        $des = $_POST['desc'];
        $sql = "INSERT INTO `notes` (`sno`, `title`, `descr`, `date`) VALUES (NULL, '$name', '$des', current_timestamp());";
        $output = mysqli_query($conn, $sql);
        if (!$output) {
            $insert = false;
        } else {
            $insert = true;
            // header("Location: index.php");
            // exit;
        }
    }
}

//Update Function
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sno'])) {
        $sno = $_POST['sno'];
        $name = mysqli_escape_string($conn, $_POST['updatetitle']);
        $des = mysqli_escape_string($conn, $_POST['updatedesc']);
        $sql = "UPDATE `notes` SET `title` = '$name', `descr` = '$des', `date` = current_timestamp() WHERE `notes`.`sno` = $sno;";
        $output = mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn) . " " . $sql);

        if (!$output) {
            $update = false;
        } else {
            $update = true;
            // header("Location: index.php");
            // //exit;
        }

    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Notes - PHP CRUD App</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="post">
                            <input type="hidden" name="sno" id="snoEdit">
                            <div class="form-floating mb-3">
                                <input class="form-control updatetitle" id="updatetitle" name="updatetitle">
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control " style="height: 150px" placeholder="Leave a comment here"
                                    id="updatedesc" name="updatedesc"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="sno_btn">Save changes</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>

        <?php
        if ($delete) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Successfully Deleted</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
        if ($insert) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Successfully Added</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
        if ($update) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Successfully Updated</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
        ?>
        <h1 class="text-center mt-4">My Notes</h1>
        <br>
        <!-- Button trigger modal -->


        <form action="index.php" method="post">
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="title">
                <label for="floatingInput">Title</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" style="height: 150px" placeholder="Leave a comment here"
                    id="floatingTextarea" name="desc"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-3">Add Note</button>
            </div>
        </form>
        <br>
        <table id="dtBasicExample" class="table ">
            <thead>
                <tr>
                    <th class="th-sm">S.NO</th>
                    <th class="th-sm">Title

                    </th>
                    <th class="th-sm">Description

                    </th>
                    <th class="th-sm">Date

                    </th>
                    <th class="th-sm">
                        Action

                    </th>


                </tr>
            </thead>
            <tbody>
                <?php

                $sql = 'SELECT * FROM `notes`';
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                if (mysqli_num_rows($result) > 0) {

                    while ($output = mysqli_fetch_assoc($result)) {

                        $sno = $sno + 1;
                        $date = substr($output["date"], 0, 10);
                        // var_dump($output) ;
                        echo "<tr>
                    <td>{$sno}</td>
                    <td>{$output["title"]}</td>
                    <td>{$output["descr"]}</td>
                    <td>{$date}</td>
                    <td><div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                            <button type='button' class='btn btn-warning updatebtn editbtn' data-bs-toggle='modal' data-bs-target='#editModal' id='{$output["sno"]}'>Edit</button>
                            <button type='button' class='btn btn-danger' onclick='deleteNote({$output["sno"]})'>Delete</button>

                        </div></td>
                   
                </tr>";
                    }

                }




                ?>
            </tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
        });
        function deleteNote(sno) {
            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `index.php?delete=${sno}`;
            }
            else {
                console.log("no");
            }
        }
        $(document).ready(function () {
            $(document).on("click", ".updatebtn", function () {
                var $row = $(this).closest("tr");
                var titleValue = $row.find("td:eq(1)").text();
                var descValue = $row.find("td:eq(2)").text();
                var buttonId = $(this).attr("id");
                $("#updatetitle").val(titleValue);
                $("#updatedesc").val(descValue);
                $("#snoEdit").val(buttonId);
            });
        });


    </script>

</body>

</html>
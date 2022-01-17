<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th,
        td {
            text-align: left;
            padding: 8px;
            width: 20%;
        }
        
        th {
            background-color: #1EB1E7;
            color: white;
        }
        
        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
            border-radius: 0px 20px 20px 20px;
        }
        
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }
        
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        
        input[type=submit] {
            width: 100%;
            background-color: #1EB1E7;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        
        .sidenav a:hover {
            color: #f1f1f1;
        }
        
        .main {
            margin-left: 250px;
            /* Same as the width of the sidenav */
            font-size: 20px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }
        
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
            .sidenav a {
                font-size: 18px;
            }
        }
        
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            text-align: center;
            padding-left: 50px;
        }
        
        h3,
        h5 {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="sidenav">
        <img class="avatar" src="images/eren.jpg" alt="" style="text-align: center;">

        <br>
        <br>
        <h3 style="color: white">Nahro Aso</h3>

        <h5 style="color: white; font-weight: normal">Administrator</h5>
        <br>

        <a href="#about">Messeges</a>
        <a href="#services">Student Registration</a>
        <a href="#clients">Post Albums</a>
        <a href="">Users</a>

    </div>

    <div class="main">
        <h2>Add Users</h2>

        <table>
            <form action="" method="post" enctype="multipart/form-data">
                <tr>
                    <td>
                        <!-- upload image -->

                        <label for=" exampleFormControlFile1">Upload Image</label>


                    </td>
                    <td> <input type="file" name="user_image" value="" />
                    </td>

                </tr>
                <tr>
                    <td> <label for="">First Name</label>
                    </td>
                    <td> <input type="text" name="user_firstname">
                    </td>
                </tr>
                <tr>
                    <td> <label for="">Last Name</label>
                    </td>
                    <td> <input type="text" name="user_lastname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">User Name</label>
                    </td>
                    <td>
                        <input type="text" name="user_username">
                    </td>
                </tr>
                <tr>
                    <td> <label for="">Password</label>
                    </td>
                    <td> <input type="password" name="user_password">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td> <input type="submit" name="upload" value="Add user"></td>
                </tr>
            </form>
        </table>

        <?php
        include 'dbConn.php';

        if (isset($_REQUEST['upload'])) {

            $user_firstname = $_REQUEST['user_firstname'];
            $user_lastname = $_REQUEST['user_lastname'];
            $user_username = $_REQUEST['user_username'];
            $user_password = $_REQUEST['user_password'];

            $filename = $_FILES["user_image"]["name"];
            $tempname = $_FILES["user_image"]["tmp_name"];
            $folder = "images/" . $filename;


            $sql = "INSERT INTO user (user_image, user_firstname, user_lastname, user_username, user_password) VALUES ('$filename', '$user_firstname', '$user_lastname', '$user_username', '$user_password')";

            $result = mysqli_query($con, $sql);

            if (move_uploaded_file($tempname, $folder))  {
               echo "Image uploaded successfully";
            }else{
                echo "Failed to upload image";
          }
        }




        ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Delete</th>
                    </tr>


                    <?php
            include 'dbConn.php';
            // retrieve data from database
            $sql = "SELECT * FROM user";
            $result = mysqli_query($con, $sql);
            // fetch data from database
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['id'];
                $user_image = $row['user_image'];

                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_username = $row['user_username'];
                $user_password = $row['user_password'];

            ?>


                        <tr>
                            <td style="width: 30px;">
                                <?php echo $user_id ?>
                            </td>
                            <td><img src="images/<?php echo $user_image ?>" style="width:100px; height: 100px"></td>
                            <td>
                                <?php echo $user_firstname ?>
                            </td>
                            <td>
                                <?php echo $user_lastname ?>
                            </td>
                            <td>
                                <?php echo $user_username ?>
                            </td>
                            <td>
                                <?php echo $user_password ?>
                            </td>
                            <td>
                                <a href="delete.php?id=<?php echo $user_id ?>"><input type="button" value="delete" style="width: 100%; background-color:red; border: 0px solid ; border-radius: 10px; color:white"></a>
                            </td>


                        </tr>



                        <?php }
            // close database connection
            mysqli_close($con);

            ?>

                </table>
            </form>










    </div>

</body>

</html>
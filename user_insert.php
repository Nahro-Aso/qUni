
<?php


        include 'dbConn.php';

        if (isset($_POST['upload'])) {

            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_username = $_POST['user_username'];
            $user_password = $_POST['user_password'];

            $filename = $_FILES["user_image"]["name"];
            $tempname = $_FILES["user_image"]["tmp_name"];
            $folder = "images/" . $filename;


            $sql = "INSERT INTO user (user_image, user_firstname, user_lastname, user_username, user_password) VALUES ('$filename', '$user_firstname', '$user_lastname', '$user_username', '$user_password')";

            $result = mysqli_query($con, $sql);

            if (move_uploaded_file($tempname, $folder)) {
                echo "Image uploaded successfully";
            } else {
                echo "Failed to upload image";
            }
        }




        ?>
        


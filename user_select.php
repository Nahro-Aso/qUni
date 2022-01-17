<html>
    <head></head>
    <body>
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
    </body>
</html>
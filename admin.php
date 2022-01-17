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
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
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

        <a href="admin.php">Messeges</a>
        <a href="#services">Student Registration</a>
        <a href="#clients">Post Albums</a>
        <a href="users.html">Users</a>

    </div>

    <div class="main">
        <h2>Messeges</h2>

        <table ">
            <tr>
                <th>name</th>
                <th>message</th>
                <th>email</th>
                <th>phone</th>
            </tr>

            <?php

            include "dbConn.php";

            $records = mysqli_query($con, "SELECT * FROM messeges");

            while ($data = mysqli_fetch_array($records)) {
            ?>
                <tr>
                    <td>
                        <?php echo $data['name']; ?>
                    </td>
                    <td>
                        <?php echo $data['message']; ?>
                    </td>
                    <td>
                        <?php echo $data['phone']; ?>
                    </td>
                    <td>
                        <?php echo $data['email']; ?>
                    </td>
                </tr>
                <?php
            }
                ?>
        </table>
        <?php
        mysqli_close($con);

        ?>


    </div>

</body>

</html>
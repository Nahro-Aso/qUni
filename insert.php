

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

$conn = mysqli_connect("localhost", "root", "", "university");
if (!$conn) {
    echo "bad connection";
}

?>
</head>
<body>

<form method="post">
    <h1>Insert Data</h1>
    <br>
    First-Name: <input type="text" name="first"><br>
    Last-Name: <input type="text" name="last"><br>
    Student-Code: <input type="text" name="code"><br>
    <input type="submit" value="Add" name="submit">
    <br>
</form>

<?php

if (isset($_POST['submit'])) {
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $code = $_POST['code'];

    $query = "INSERT INTO `students` (`first_name`,`last_name`,`student_code`) 
    VALUES ('$firstName', '$lastName', '$code')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data added";
    } else {
        echo "Something went wrong";
    }
}
?>

<br><br>

<form action="" method="post">
    <input type="text" name="search" placeholder="Search for student">
    <input type="submit" value="Search">

</form>



<br><br>

<?php

if (isset($_POST['search'])) {
    $firstName = $_POST['search'];

    $query = "SELECT * FROM `students` WHERE `first_name` = '$firstName'";
    $result = mysqli_query($conn, $query);
    $found = mysqli_num_rows($result);
    echo "<h4>Result found ( $found )</h4> "; 

    echo  "<table>";
    echo "<tr>";
    echo "<th>First Name   </th>";
    echo "<th>Last Name   </th>";
    echo "<th>Student Code   </th>";
    echo "</tr>";
   
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['first_name'] . "</td>";
      echo "<td>" . $row['last_name'] . "</td>";
      echo "<td>" . $row['student_code'] . "</td>";
      echo "</tr>";
    }
    
    echo "</table>";
}
?>
    
</body>
</html>



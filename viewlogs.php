<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
</head>
<body>
<center>
<h2>RFID LOGS</h2>
<table border=1>
<tr>
<th>ID</th>
<th>CardNumber</th>
<th>Name</th>
<th>LogDate</th>
</tr>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wireless";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, cardid,name,logdate FROM entry";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id"]. " </td><td> " . $row["cardid"]." </td><td> " . $row["name"]. "</td><td> " . $row["logdate"]. "</td></tr><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>
</center>
</body>
</html>
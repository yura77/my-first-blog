<head>
  <title>MyPhoneBook</title>
</head>

<form action="index.html" method="POST">
<input type="submit" value="Add new contact">
</form>

<?php
$con=mysqli_connect("sql.pozdrovska.tld","root","123","phonebook");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM MyPhoneBook");

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>gender</th>
<th>email</th>
<th>phoneCode</th>
<th>phone</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['phoneCode'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

</body>
</html>


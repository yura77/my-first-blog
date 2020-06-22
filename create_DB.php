 <?php
$servername = "sql.pozdrovska.tld";
$username = "root";
$password = "123";
$dbname = "phonebook";

// Create connection
$conn = mysqli_connect('sql.pozdrovska.tld','root','123','phonebook');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyPhoneBook (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(20) NOT NULL,
lastname VARCHAR(20) NOT NULL,
gender char(1),
email VARCHAR(40),
phoneCode int(11),
phone bigint(50)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 


<head>
  <title>MyPhoneBook</title>
</head>

<form action="index.html" method="POST">
<input type="submit" value="Add new contact">
</form>

<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
if (!empty($firstname) || !empty($lastname) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
 $host = "sql.pozdrovska.tld";
    $dbUsername = "root";
    $dbPassword = "123";
    $dbname = "phonebook";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From MyPhoneBook Where email = ? Limit 1";
     $INSERT = "INSERT Into MyPhoneBook (firstname, lastname, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $firstname, $lastname, $gender, $email, $phoneCode, $phone);
      $stmt->execute();
      echo "Новий контакт додано";
     } else {
      echo "Один з ваших контактів вже використовує даний email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "Упс! Щось пішло не так)";
 die();
}
?>

</body>
</html>



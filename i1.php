<?php
  echo "<body style='background-color:yellow'>";
  $file = "sample.xls";
$username = $_POST['username'];
$surname = $_POST['surname'];
$cdob = $_POST['cdob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$fathersname = $_POST['fathersname'];
$fqualification = $_POST['fqualification'];
$foccupation = $_POST['foccupation'];
$mothersname = $_POST['mothersname'];
$mqualification = $_POST['mqualification'];
$moccupation = $_POST['moccupation'];
$std = $_POST['std'];
$address = $_POST['address'];
$religion = $_POST['religion'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
$a = $_POST['a'];

if (!empty($username) || !empty($surname) || !empty($cdob) || !empty($gender) || !empty($email) || !empty($fathersname) || !empty($fqualification) || ! empty($foccupation) || !empty($mothersname) || !empty($mqualification) || !empty($moccupation) || !empty($std) || ! empty($address) || !empty($religion) ||!empty($phoneCode) || !empty($phone) || !empty($a)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "ans19";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, surname, cdob, gender, email,fathersname, fqualification, foccupation, mothersname, mqualification, moccupation, std, address, religion,  phoneCode, phone, a) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
      $stmt->bind_param("ssssssssssssssiii", $username, $surname, $cdob, $gender, $email, $fathersname, $fqualification, $foccupation, $mothersname, $mqualification, $moccupation, $std, $address, $religion, $phoneCode, $phone, $a);
      $stmt->execute();
      echo "Done Successfully....!!!";
     } else {
      echo "Someone already registered using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "Sorry ...You missing something..!!";
 die();
}
?>
<html>
<head>
<title>ThankYou Page</title>  
</head>
<body>

<img src = "https://media1.tenor.com/images/315d66f06bba25326e685f843fe14554/tenor.gif?itemid=7910074">
<h1> <a href="n1.html"> GO BACK </a> </h1>   
    
</body>
<?php
  $firstnameErr = "<p>First Name</p>";
  $lastnameErr = "<p>Last Name</p>";
  $emailErr = "<p>example@example.com</p>";
  $idErr = $payErr = "";
  $firstname = $lastname = $email = $id = "";
  $mess = "";
  $pay = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["firstName"])) {
      $firstnameErr = "<p style='color: #ff0000;'>First Name is required</p>";
    } else {
      $firstname = test_input($_POST["firstName"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $firstnameErr = "<p style='color: #ff0000;'>Only letters and white space allowed</p>";
      }
    }

    if (empty($_POST["lastName"])) {
      $lastnameErr = "<p style='color: #ff0000;'>Last Name is required</p>";
    } else {
      $lastname = test_input($_POST["lastName"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
        $lastnameErr = "<p style='color: #ff0000;'>Only letters and white space allowed</p>";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "<p style='color: #ff0000;'>Email is required</p>";
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "<p style='color: #ff0000;'>Invalid email format</p>";
      }
    }

    if (empty($_POST["invoiceId"])) {
      $idErr = "<p style='color: #ff0000;'>Invoice ID is required</p>";
    } else {
      $id = test_input($_POST["invoiceId"]);
      if (!preg_match("/^[\d]*$/",$id)) {
        $idErr = "<p style='color: #ff0000;'>Only numbers and white space allowed</p>";
      }
    }

    if(isset($_POST["pay_for"])){
        $pay = implode("<br>", $_POST['pay_for']);
      } else{
          $payErr = "<p style='position: fixed; color: #ff0000;'>Please select at least one option.</p>";
      }

    if (empty($firstname) || empty($lastname) || empty($email) || empty($id) || empty($pay)) {
      $mess = "<p style='position: absolute; bottom: 8%; left: 50%; transform: translate(-50%); color: #ff0000; font-size: 16px'>Please fill out all required fields.</p>";
    } else {
      $mess = " <script>
                  document.getElementById('i').style.display = 'block';
                  document.getElementById('y').style.display = 'none';
                  document.getElementById('z').style.display = 'block';
                </script>";
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

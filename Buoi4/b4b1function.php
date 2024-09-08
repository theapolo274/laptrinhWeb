<?php
  $isSubmitted = false;
  $firstnameErr = "<p>First Name</p>";
  $firstname = $lastname = $email = $id = $pay = $upload = $type ="";
  $lastnameErr = "<p>Last Name</p>";
  $emailErr = "<p>example@example.com</p>";
  $idErr = $payErr = $uploadErr = $typeErr =  "";
  $mess = "";
  $target_dir = "uploads/";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate and set cookies for First Name
        if (empty($_POST["firstName"])) {
            $firstnameErr = "<p style='color: #ff0000;'>First Name is required</p>";
        }else {
          $firstname = test_input($_POST["firstName"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
              $firstnameErr = "<p style='color: #ff0000;'>Only letters and white space allowed</p>";
          }
        }

        // Validate and set cookies for Last Name
        if (empty($_POST["lastName"])) {
            $lastnameErr = "<p style='color: #ff0000;'>Last Name is required</p>";
        }else {
          $lastname = test_input($_POST["lastName"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            $lastnameErr = "<p style='color: #ff0000;'>Only letters and white space allowed</p>";
          }
        }

        // Validate and set cookies for Email
        if (empty($_POST["email"])) {
            $emailErr = "<p style='color: #ff0000;'>Email is required</p>";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "<p style='color: #ff0000;'>Invalid email format</p>";
            }
        }

        // Validate and set cookies for Invoice ID
        if (empty($_POST["invoiceId"])) {
            $idErr = "<p style='color: #ff0000;'>Invoice ID is required</p>";
        } else {
            $id = test_input($_POST["invoiceId"]);
            if (!preg_match("/^[\d]*$/",$id)) {
                $idErr = "<p style='color: #ff0000;'>Only numbers and white space allowed</p>";
            }
        }

        // Handle and set cookies for Pay For options
        if (isset($_POST["pay_for"])) {
            $pay = implode("<br>", $_POST['pay_for']);
        } else {
            $payErr = "<p style='color: #ff0000;'>Please select at least one option.</p>";
        }

        if (isset($_POST["fileUploaded"])) {
            $upload = $_POST["fileUploaded"]; // Lưu đường dẫn file đã upload trước đó
        } else {
            if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
                // if (file_exists($target_file)) {
                //     $uploadErr = "<p style='color: #ff0000;'>Sorry, file already exists.</p>";
                //     $uploadOk = 0;
                // }
        
                // Kiểm tra kích thước file
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    $uploadErr = "<p style='color: #ff0000;'>Sorry, your file is too large.</p>";
                    $uploadOk = 0;
                }
        
                // Cho phép một số định dạng file nhất định
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $uploadErr = "<p style='color: #ff0000;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                    $uploadOk = 0;
                }
        
                // Kiểm tra nếu $uploadOk bằng 0 thì không upload file
                if ($uploadOk == 0) {
                    $uploadErr = "<p style='color: #ff0000;'>Sorry, your file was not uploaded.</p>";
                } else {
                    // Nếu mọi thứ đều ổn, cố gắng upload file
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $upload = htmlspecialchars($target_file);
                    } else {
                        $uploadErr = "<p style='color: #ff0000;'>Sorry, there was an error uploading your file.</p>";
                    }
                }
            }
        }

        if (empty($_POST["content"])) {
            $typeErr = "<p style='color: #ff0000;'>Message is required</p>";
          } else {
            $type = test_input($_POST["content"]);
        }

        // Check if all fields are filled out
        if (empty($firstname) || empty($lastname) || empty($email) || empty($id) || empty($pay) || empty($upload)) {
            $mess = "<p style='color: #ff0000; font-size: 20px; position: absolute; bottom:0; left:30%'>Please fill out all required fields.</p>";
        } else {
            $isSubmitted = true;
        }
    }
    

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

?>

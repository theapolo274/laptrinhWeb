<?php
$isSubmitted = false;
$firstnameErr = "<p>First Name</p>";
$firstname = $lastname = $email = $id = $pay = $upload = $type = "";
$lastnameErr = "<p>Last Name</p>";
$emailErr = "<p>example@example.com</p>";
$idErr = $payErr = $uploadErr = $typeErr =  "";
$mess = "";
$target_dir = "uploads/";

// Đảm bảo rằng setcookie được gọi trước khi bất kỳ nội dung nào được gửi
if (isset($_COOKIE['firstName']) && isset($_COOKIE['lastName']) && isset($_COOKIE['email']) && isset($_COOKIE['invoiceId']) && isset($_COOKIE['pay_for']) && isset($_COOKIE['fileToUpload']) && isset($_COOKIE['content'])) {
    // Nếu tất cả cookie cần thiết tồn tại, thiết lập các biến và đánh dấu biểu mẫu đã được gửi
    $firstname = htmlspecialchars($_COOKIE['firstName']);
    $lastname = htmlspecialchars($_COOKIE['lastName']);
    $email = htmlspecialchars($_COOKIE['email']);
    $id = htmlspecialchars($_COOKIE['invoiceId']);
    $pay = $_COOKIE['pay_for'];
    $upload = htmlspecialchars($_COOKIE['fileToUpload']);
    $type = htmlspecialchars($_COOKIE['content']);
    $isSubmitted = true; // Đánh dấu biểu mẫu đã được gửi
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Xác thực và thiết lập cookies cho First Name
    if (empty($_POST["firstName"])) {
        $firstnameErr = "<p style='color: #ff0000;'>First Name is required</p>";
    } else {
        $firstname = test_input($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
            $firstnameErr = "<p style='color: #ff0000;'>Only letters and white space allowed</p>";
        } else {
            setcookie('firstName', $firstname, time() + (86400 * 30), "/");
        }
    }

    // Xác thực và thiết lập cookies cho Last Name
    if (empty($_POST["lastName"])) {
        $lastnameErr = "<p style='color: #ff0000;'>Last Name is required</p>";
    } else {
        $lastname = test_input($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
            $lastnameErr = "<p style='color: #ff0000;'>Only letters and white space allowed</p>";
        } else {
            setcookie('lastName', $lastname, time() + (86400 * 30), "/");
        }
    }

    // Xác thực và thiết lập cookies cho Email
    if (empty($_POST["email"])) {
        $emailErr = "<p style='color: #ff0000;'>Email is required</p>";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "<p style='color: #ff0000;'>Invalid email format</p>";
        } else {
            setcookie('email', $email, time() + (86400 * 30), "/");
        }
    }

    // Xác thực và thiết lập cookies cho Invoice ID
    if (empty($_POST["invoiceId"])) {
        $idErr = "<p style='color: #ff0000;'>Invoice ID is required</p>";
    } else {
        $id = test_input($_POST["invoiceId"]);
        if (!preg_match("/^[\d]*$/", $id)) {
            $idErr = "<p style='color: #ff0000;'>Only numbers and white space allowed</p>";
        } else {
            setcookie('invoiceId', $id, time() + (86400 * 30), "/");
        }
    }

    // Xử lý và thiết lập cookies cho Pay For options
    if (isset($_POST["pay_for"])) {
        $pay = implode("<br>", $_POST['pay_for']);
        setcookie('pay_for', $pay, time() + (86400 * 30), "/");
    } else {
        $payErr = "<p style='color: #ff0000;'>Please select at least one option.</p>";
    }

    // Xử lý upload file
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $uploadErr = "<p style='color: #ff0000;'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadErr = "<p style='color: #ff0000;'>Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadErr = "<p style='color: #ff0000;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $uploadErr = "<p style='color: #ff0000;'>Sorry, your file was not uploaded.</p>";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $upload = htmlspecialchars($target_file);
                setcookie('fileToUpload', $upload, time() + (86400 * 30), "/");
            } else {
                $uploadErr = "<p style='color: #ff0000;'>Sorry, there was an error uploading your file.</p>";
            }
        }
    } else {
        $uploadErr = "<p style='color: #ff0000;'>Please add file</p>";
    }

    // Xác thực và thiết lập cookies cho Message
    if (empty($_POST["content"])) {
        $typeErr = "<p style='color: #ff0000;'>Message is required</p>";
    } else {
        $type = test_input($_POST["content"]);
        setcookie('content', $type, time() + (86400 * 30), "/");
    }

    // Kiểm tra nếu tất cả các trường đã được điền
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

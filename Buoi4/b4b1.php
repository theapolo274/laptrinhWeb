<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<style>
    * {
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        position: relative;
    }
    body {
        background-color: #F3F8FF;
        height: auto; /* changed height */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 60px 0;
    }
    form {
        background-color: #F3F8FF;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding: 40px;
        border: 2px solid #49108B; /* changed border color */
        box-shadow: 2px 2px 10px #7d30e17a; /* added box shadow */
        border-radius: 10px;
        position: relative;
    }
    div {
        width: 240px;
        padding-bottom: 20px;
    }
    h2 {
        color: #49108B; /* changed color */
    }
    hr {
        border: 0;
        height: 2px;
        background: #7d30e17a; /* changed hr color */
    }
    .title {
        color: #49108B; /* changed color */
        font-size: 20px;
    }
    .data {
        color: #49108B; /* changed color */
        font-size: 20px;
        padding-left: 10px;
    }
    tr td:first-child {
        text-align: right;
        font-weight: bold;
    }
    td {
        padding: 5px 0;
    }
    .formInput {
        width: 100%;
        height: 32px;
        border-radius: 5px;
        border: 1px solid #49108B; /* changed border color */
        margin: 8px 0 6px 0;
    }
    p {
        font-size: 12px;
        color: #6115b7; /* changed color */
    }
    div.checkBox {
        padding: 8px 0;
        font-size: 12px;
        display: flex;
        align-items: center;
        width: 240px;
    }
    .checkmark {
        position: relative;
        height: 14px;
        width: 14px;
        background-color: #F3F8FF;
        border-radius: 4px;
        border: 1px solid #49108B; /* changed border color */
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
    }
    input[type="checkbox"]:checked + .checkmark {
        background-color: #49108B; /* changed background color */
    }
    .checkmark::after {
        content: "";
        position: absolute;
        display: none;
    }
    input[type="checkbox"]:checked + .checkmark::after {
        display: block;
    }
    .checkmark::after {
        left: 5px;
        top: 2px;
        width: 3px;
        height: 7px;
        border: solid #F3F8FF;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    input[type="checkbox"] + .checkmark {
        cursor: pointer;
    }
    input[type="checkbox"] {
        cursor: pointer;
        position: absolute;
        z-index: 1;
        opacity: 0;
    }
    input:focus, textarea:focus {
        outline: solid #49108B; /* changed outline color */
    }
    label.check {
        font-size: 13px;
        padding-left: 10px;
        color: #49108B; /* changed color */
        cursor: pointer;
    }
    #submitBtn {
        color: #F3F8FF;
        grid-column: span 2;
        height: 36px;
        background-color: #49108B; /* changed background color */
        border: none;
        border-radius: 10px;
        font-weight: bold;
        margin-top: 20px;
        width: 100%; /* made the width full */
    }
    #submitBtn:hover {
        background-color: #9448ea; /* changed hover color */
        transition: 0.4s;
    }
    input[type="text"], input[type="number"], input[type="mail"] {
        padding: 5px;
    }
    button:hover {
        background-color: #9448ea;
        transition: 0.4s;
    }
    .type {
        display: flex;
        flex-direction: column;
    }
    .type {
        height: 150px;
    }
    .type textarea {
        padding: 10px;
    }
    .upload {
        grid-column: span 2;
        width: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .uploadimg {
        background-color: #F3F8FF;
        width: 98%;
        text-align: center;
        height: 100%;
        padding: 30px 0;
        margin-top: 10px;
        border: dashed #9448ea; /* changed border color */
        cursor: pointer;
    }
    .uploadimg p {
        font-size: 22px;
    }
    .upload span {
        color: #49108B;
    }
</style>
<body>
    <?php require 'b4b1function.php';?>
    <?php if ($isSubmitted): ?>
        <div style="display: flex; justify-content: center; align-items: center; padding-bottom:0">
            <form style="display: flex; flex-direction:column;">
                <h2 style="text-align: center;">Information</h2>
                <hr  style="width: calc(100% + 80px); transform: translate(-70px); margin: 30px;">
                <table style="width: 100%;">
                    <tr>
                        <td>Name: </td>
                        <td><?php echo $firstname." ". $lastname; ?></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Invoice ID: </td>
                        <td><?php echo $id ?></td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">Pay for: </td>
                        <td><?php echo $pay ?></td>
                    </tr>
                    <tr>
                        <td>Message: </td>
                        <td><?php echo $type ?></td>
                    </tr>
                    <tr>
                        <td colspan= "2" style="text-align: center;padding:0">
                            <img src="<?php echo $upload?>" alt="" style = "width:50%">
                        </td>
                    </tr>
                </table>
                <button onclick="back()">Back</button>
            </form>
        </div>
    <?php else: ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data"> 
        <h2 style="grid-column: span 2; text-align: center;">Payment Receipt Upload Form</h2>
        <hr  style="grid-column: span 2; width: calc(100% + 80px); transform: translate(-70px); margin: 30px;">
        <label for="firstName" class="title" style="grid-column: span 2;">Name</label>
        <div>
            <input type="text" id="firstName" name="firstName" class="formInput" 
                value="<?php echo $firstname?>">
            <?php echo $firstnameErr?>
        </div>
        <div>
            <input type="text" id="lastName" name="lastName" class="formInput"
                value="<?php echo $lastname?>">
            <?php echo $lastnameErr?>
        </div>
        <div>
            <label for="mail" class="title">Mail</label>
            <input type="mail" id="mail" name="email" class="formInput"
                value="<?php echo $email?>">
            <?php echo $emailErr?>
        </div>
        <div>
            <label for="invoiceId" class="title">Invoice ID</label>
            <input type="text" id="invoiceId" name="invoiceId" class="formInput"
                value="<?php echo $id?>">
            <?php echo $idErr?>
        </div>
        <div style="grid-column: span 2; width: 100%; padding-bottom: 20px;">
            <label class="title" style="margin-bottom: 10px; display: block;">Pay For</label>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); width: 550px; padding: 0;">
                <div class="checkBox">
                    <input type="checkbox" id="35kCategory" name="pay_for[]" value="35K Category"
                        <?php if (isset($_POST['pay_for']) && in_array("35K Category", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="35kCategory">35K Category</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="15kCategory" name="pay_for[]" value="15K Category"
                        <?php if (isset($_POST['pay_for']) && in_array("15K Category", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="15kCategory">15K Category</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="55kCategory" name="pay_for[]" value="55K Category"
                        <?php if (isset($_POST['pay_for']) && in_array("55K Category", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="55kCategory">55K Category</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="75kCategory" name="pay_for[]" value="75K Category"
                        <?php if (isset($_POST['pay_for']) && in_array("75K Category", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="75kCategory">75K Category</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="116kCategory" name="pay_for[]" value="116K Category"
                        <?php if (isset($_POST['pay_for']) && in_array("116K Category", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="116kCategory">116K Category</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="shuttleTwoWays" name="pay_for[]" value="Shuttle Two Ways"
                        <?php if (isset($_POST['pay_for']) && in_array("Shuttle Two Ways", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="shuttleTwoWays">Shuttle Two Ways</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="shuttleOneWays" name="pay_for[]" value="Shuttle One Way"
                        <?php if (isset($_POST['pay_for']) && in_array("Shuttle One Way", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="shuttleOneWays">Shuttle One Way</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="compressportTShirtMerchandise" name="pay_for[]" value="Compressport T-Shirt Merchandise"
                        <?php if (isset($_POST['pay_for']) && in_array("Compressport T-Shirt Merchandise", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="compressportTShirtMerchandise">Compressport T-Shirt Merchandise</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="trainingCapMerchandise" name="pay_for[]" value="Training Cap Merchandise"
                        <?php if (isset($_POST['pay_for']) && in_array("Training Cap Merchandise", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="trainingCapMerchandise">Training Cap Merchandise</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="bufMerchandise" name="pay_for[]" value="Buf Merchandise"
                        <?php if (isset($_POST['pay_for']) && in_array("Buf Merchandise", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="bufMerchandise">Buf Merchandise</label>
                </div>
                <div class="checkBox">
                    <input type="checkbox" id="other" name="pay_for[]" value="Other"
                        <?php if (isset($_POST['pay_for']) && in_array("Other", $_POST['pay_for'])) echo "checked"; ?>>
                        <span class="checkmark"></span>
                    <label class="check" for="other">Other</label>
                </div>
            </div>
            <?php echo $payErr;?>
        </div>
        <div style="grid-column: span 2; width: 100%; padding-bottom: 20px;" class="upload">
            <label class="title">Please upload your payment receipt.</label>
            <div class="uploadimg" id="image" name="fileToUpload">
                <span class="material-symbols-outlined" style="font-size: 60px;">cloud_upload</span>
                <p><b>Browse Files</b></p>
                <span>Drag and drop files here</span>
            </div>
            <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;">
            <span style="margin-top:10px">jpg,jpeg,png,gif (1mb max.)</span>
            <?php echo $uploadErr; ?>
        </div>
        <div style="grid-column: span 2; width: 100%; padding-bottom: 20px;" class="type">
            <label for="infor" class="title">Additional Information</label>
            <textarea class="type" name="content" placeholder="Type here..."><?php echo $type?></textarea>
            <?php echo $typeErr; ?>
        </div>
        <input type="submit" id="submitBtn" name="submit" value="Submit">
        <?php echo $mess; ?> 
    </form>
    <?php endif; ?>
    <script>
        const dropZone = document.getElementById('image');
        const fileInput = document.getElementById('fileToUpload');

        // Khi click vào div để mở hộp thoại chọn file
        dropZone.addEventListener('click', () => {
            fileInput.click();
        });

        // Khi file được kéo vào div
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        // Khi rời khỏi vùng dropzone
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        // Khi file được thả vào dropzone
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length) {
                fileInput.files = files; // Gán file vào input để có thể upload
                updateDropZone(files[0].name); // Hiển thị tên file trong div
            }
        });

        // Khi file được chọn từ input file
        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                updateDropZone(file.name); // Hiển thị tên file trong div
            }
        }

        // Hàm cập nhật nội dung dropzone thành tên file
        function updateDropZone(fileName) {
            dropZone.innerHTML = `<p><b>${fileName}</b></p>`; // Hiển thị tên file
        }

        // Gán sự kiện khi file được chọn qua input
        fileInput.addEventListener('change', handleFileSelect);
    </script>
</body>
</html>
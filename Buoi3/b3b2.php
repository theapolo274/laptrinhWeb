<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="b3b2.css">
</head>
<body>
    <?php require 'b3b2function.php';?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="y"> 
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
        <input type="submit" id="submitBtn" name="submit" value="Submit">
    </form>
    <form  style="display: none;" id="i">
        <h2 style="text-align: center;">Information</h2>
        <hr  style="width: calc(100% + 80px); transform: translate(-70px); margin: 30px;">
        <table style="width: 100%;">
            <tr>
                <td class="title">Name:</td>
                <td class="data"><?php echo "{$firstname} {$lastname}"?></td>
            </tr>
            <tr>
                <td class="title">Mail:</td>
                <td class="data"><?php echo $email; ?></td>
            </tr>
            <tr>
                <td class="title">Invoice ID:</td>
                <td class="data"><?php echo $id; ?></td>
            </tr>
            <tr>
                <td class="title" style="vertical-align: top">Pay For:</td>
                <td class="data"><?php echo $pay; ?></td>
            </tr>
        </table>
        <button style="display: none;" id="z" onclick="back()">Back</button>
    </form>
    <?php
        echo $mess;
    ?> 
    <script>
        function back() {
            var x = document.getElementById("i");
            var y = document.getElementById("y");
            var z = document.getElementById("z");
            x.style.display = "none";
            y.style.display = "grid";
            z.style.display = "none";
        }
    </script>
</body>
</html>
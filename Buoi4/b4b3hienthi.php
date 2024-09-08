<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["back"])) {
        session_destroy();
        header("Location: Bai3form.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    position: relative;
    }
    body{
    background-color: #F3F8FF;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 40px;
    }
    form{
    background-color: #F3F8FF;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    padding: 40px;
    border: 2px solid #8d5f7be9;
    border-radius: 10px;
    position: relative;
    }
    div{
    width: 240px;
    padding-bottom: 20px;
    }
    h2{
        color: black;
    }
    hr {
        border: 0;
        height: 2px;
        background: #ee3893e9;
    }
    .title{
        color: black;
        font-size: 20px;
    }
    .data{
        color: black;
        font-size: 20px;
        padding-left: 10px;
    }
    tr td:first-child{
        text-align: right;
        font-weight: bold;
    }
    td{
        padding: 5px 0;
    }
    .formInput{
        width: 100%;
        height: 32px;
        border-radius: 5px;
        border: 1px solid black;
        margin: 8px 0 6px 0;
    }
    p{
        font-size: 12px;
        color: black;
    }
    div.checkBox{
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
        border: 1px solid #d6377f;
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
    }
    input[type="checkbox"]:checked + .checkmark {
        background-color: #d6377f;
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
    input[type="checkbox"]{
        cursor: pointer;
        opacity: 1;
        position: absolute;
        z-index: 1;
        opacity: 0;
    }
    input:focus, textarea:focus{
        outline: solid #d6377f;
    }
    label.check{
        font-size: 13px;
        padding-left: 10px;
        color: black;
        cursor: pointer;
    }
    #submitBtn{
        color: #F3F8FF;
        grid-column: span 2;
        height: 36px;
        background-color: #d6377f;
        border: none;
        border-radius: 10px;
        font-weight: bold;
    }
    #submitBtn:hover{
        background-color: #ea4891;
        transition: 0.4s;
    }
    input[type="text"], input[type="number"], input[type="mail"] {
        padding: 5px;
    }
    button:hover{
        background-color: #ea4891;
        transition: 0.4s;
    }
    .type{
        display: flex;
        flex-direction: column;
    }
    .type{
        height: 150px;
    }
    .type textarea{
        padding: 10px;
    }
    .upload{
        grid-column: span 2;
        width: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .uploadimg{
        background-color: #F3F8FF;
        width: 98%;
        text-align: center;
        height: 100%;
        padding: 30px 0;
        margin-top: 10px;
        border: dashed #ea4891;
        cursor: pointer;
    }
    .uploadimg p{
        font-size: 22px;
    }
    .upload span{
        color: #d6377f;
    }
    button{
        color: #F3F8FF;
        grid-column: span 2;
        height: 36px;
        background-color: #d6377f;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        margin-top: 20px;
        width: 100%;
    }
    a{
        text-decoration: none;
        color: #F3F8FF;
    }
    button:hover{
        background-color: #ea4891;
        transition: 0.4s;
    }
</style>
<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; padding-bottom:0">
        <form style="display: flex; flex-direction:column;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2 style="text-align: center;">Information</h2>
            <hr  style="width: calc(100% + 80px); transform: translate(-70px); margin: 30px;">
            <table style="width: 100%;">
                <tr>
                    <td>Name: </td>
                    <td>
                        <?php
                        if (isset($_SESSION["firstName"]) && isset($_SESSION["lastName"])) {
                            echo htmlspecialchars($_SESSION["firstName"] . " " . $_SESSION["lastName"]);
                        } else {
                            echo "No name provided.";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : "No email provided."; ?></td>
                </tr>
                <tr>
                    <td>InvoiceID: </td>
                    <td><?php echo isset($_SESSION["invoiceId"]) ? htmlspecialchars($_SESSION["invoiceId"]) : "No Invoice ID."; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">Pay for: </td>
                    <td><?php echo isset($_SESSION["pay_for"]) ? $_SESSION["pay_for"] : "No payment info."; ?></td>
                </tr>
                <tr>
                    <td>Message: </td>
                    <td><?php echo isset($_SESSION["content"]) ? htmlspecialchars($_SESSION["content"]) : "No message."; ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;padding:0">
                        <?php if (isset($_SESSION["fileToUpload"])): ?>
                            <img src="<?php echo htmlspecialchars($_SESSION["fileToUpload"]); ?>" alt="" style="width:50%">
                        <?php else: ?>
                            <p>No file uploaded.</p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <input type="submit" name="back" value="Back" id="submitBtn">
        </form>
    </div>
</body>
</html>
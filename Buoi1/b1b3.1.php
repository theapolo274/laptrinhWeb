<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHÉP TÍNH TRÊN HAI SỐ</title>
    <style>
        .radio-inline {
            display: inline-block;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    <form method="post" action="b1b3.2.php">
        <label>Chọn phép tính:</label>
        <div class="radio-inline">
            <input type="radio" name="operation" value="add">Cộng
            <input type="radio" name="operation" value="subtract">Trừ
            <input type="radio" name="operation" value="multiply">Nhân
            <input type="radio" name="operation" value="divide">Chia
            <input type="radio" name="operation" value="even-odd">Kiểm tra số chẵn/lẻ
            <input type="radio" name="operation" value="element">Kiểm tra số nguyên tố
        </div>
        <br>
        <label>Số thứ nhất:</label><br>
        <input type="number" name="num1"><br><br>

        <label>Số thứ hai:</label><br>
        <input type="number" name="num2"><br><br>

        <input type="submit" value="Kiểm tra">

    </form>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHÉP TÍNH TRÊN HAI SỐ</title>
</head>
<body>
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = $result1 = $result2 = "";

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                $operation_name = "Cộng";
                break;
            case 'subtract':
                $result = $num1 - $num2;
                $operation_name = "Trừ";
                break;
            case 'multiply':
                $result = $num1 * $num2;
                $operation_name = "Nhân";
                break;
            case 'divide':
                $result = ($num2 != 0) ? $num1 / $num2 : "Không thể chia cho 0";
                $operation_name = "Chia";
                break;
            case 'even-odd':
                $result1 = ($num1 % 2 == 0) ? "Chẵn" : "Lẻ";
                $result2 = ($num2 % 2 == 0) ? "Chẵn" : "Lẻ";
                $operation_name = "Kiểm tra chẵn/lẻ";
                break;
            case 'element':
                function isPrime($num) {
                    if ($num <= 1) return false;
                    if ($num == 2) return true;
                    if ($num % 2 == 0) return false;
                    for ($i = 3; $i <= sqrt($num); $i += 2) {
                        if ($num % $i == 0) return false;
                    }
                    return true;
                }
                $result1 = isPrime($num1) ? "Nguyên tố" : "Không nguyên tố";
                $result2 = isPrime($num2) ? "Nguyên tố" : "Không nguyên tố";
                $operation_name = "Kiểm tra nguyên tố";
                break;
            default:
                $result = "Phép toán không hợp lệ";
        }

        echo "<p>Chọn phép tính: $operation_name</p>";
        echo "<p>Số 1: $num1</p>";
        echo "<p>Số 2: $num2</p>";
        echo "<p>Kết quả: $result</p>";
        echo "<p>Kết quả số 1: $result1</p>";
        echo "<p>Kết quả số 2: $result2</p>";
    }
    ?>
    <br>
    <a href="b1b3.1.php">Quay lại trang trước</a>
</body>
</html>

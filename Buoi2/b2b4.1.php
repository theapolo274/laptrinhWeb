<?php
include 'b2b4.2.php';

$array = [];
$maxValue = $minValue = $sum = $sortedArray = $valueToCheck = $isInArray = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['array'];
    $array = explode(',', str_replace(' ', '', $input)); // Convert input string to array

    $maxValue = findMax($array);
    $minValue = findMin($array);
    $sum = calculateSum($array);
    $sortedArray = sortArray($array);
    $valueToCheck = 7;
    $isInArray = isValueInArray($array, $valueToCheck);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #000;
        }

        div {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            max-width: 500px;
            margin: 0 auto;
        }

        p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 80%;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Array Functions</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="array">Nhập mảng ban đầu (các số cách nhau bằng dấu phẩy):</label><br>
        <input type="text" id="array" name="array" required><br>
        <input type="submit" value="Xử lý">
    </form>

    <?php if (!empty($array)): ?>
    <div>
        <p>Mảng ban đầu: <?php echo implode(', ', $array); ?></p>
        <p>Giá trị lớn nhất trong mảng: <?php echo $maxValue; ?></p>
        <p>Giá trị nhỏ nhất trong mảng: <?php echo $minValue; ?></p>
        <p>Tổng các phần tử trong mảng: <?php echo $sum; ?></p>
        <p>Mảng sau khi sắp xếp: <?php echo implode(', ', $sortedArray); ?></p>
        <p><?php echo $valueToCheck . ($isInArray ? ' có ' : ' không có ') . 'trong mảng'; ?></p>
    </div>
    <?php endif; ?>
</body>
</html>

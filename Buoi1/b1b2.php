<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $books = array();
    for ($i = 1; $i <= 100; $i++) {
        $books[] = array("Tensach$i", "Noidung$i");
    }

    $rowsPerPage = 10;
    $totalRows = count($books);
    $totalPages = ceil($totalRows / $rowsPerPage);

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $currentPage = (int)$_GET['page'];
    } else {
        $currentPage = 1;
    }

    if ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }
    if ($currentPage < 1) {
        $currentPage = 1;
    }

    $startRow = ($currentPage - 1) * $rowsPerPage;

    echo "<table>";
    echo "<tr><th>STT</th><th>Tên sách</th><th>Nội dung sách</th></tr>";

    for ($i = $startRow; $i < $startRow + $rowsPerPage && $i < $totalRows; $i++) {
        echo "<tr><td>" . ($i + 1) . "</td><td>" . $books[$i][0] . "</td><td>" . $books[$i][1] . "</td></tr>";
    }

    echo "</table>";

    if ($currentPage > 1) {
        echo "<a href='?page=" . ($currentPage - 1) . "'>Previous</a> ";
    }

    if ($currentPage < $totalPages) {
        echo "<a href='?page=" . ($currentPage + 1) . "'>Next</a>";
    }
    ?>
</body>
</html>

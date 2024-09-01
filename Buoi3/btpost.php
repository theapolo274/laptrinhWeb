<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="baitappost.php" method="POST">
        <table>
            <tr>
                <td>
                    <label for="tenSach">Tên sách</label>
                </td>
                <td>
                    <input type="text" name="tenSach">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tacGia">Tác giả</label>
                </td>
                <td>
                    <input type="text" name="tacGia">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nhaXuatBan">Nhà xuất bản</label>
                </td>
                <td>
                    <input type="text" name="nhaXuatBan">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="namXuatBan">Năm xuất bản</label>
                </td>
                <td>
                    <input type="text" name="namXuatBan">
                </td>
            </tr>
        </table>
        <input type="submit">
    </form>
</body>
</html>
<?php 
    session_start();
    if (!isset($_SESSION['flower'])) {
        $_SESSION['flower'] = [
            ['stt' => 1, 'name' => 'Đỗ Quyên', 'description' => 'Cây hoa đỗ quyên là loài cây thân gỗ hoặc thân gỗ bụi, có nguồn gốc từ các vùng ôn đới. Tên khoa học của hoa đỗ quyên là Rhododendron, thuộc họ Thạch nam', 'image' => 'images/doquyen.jpg'],
            ['stt' => 2, 'name' => 'Hải Đường', 'description' => 'Hoa hải Đường có màu trắng nhạt, màu đỏ thắm hay màu hồng tươi, hoa có 5 cánh khá dày, nhụy hoa có màu vàng đậm, hoa mọc đơn tràng hoặc tràng kép, thời gian hoa nở khá lâu. Tuy hoa Hải Đường có họ với cây chè, cây trà mi nhưng về kích thước của cây lại lớn hơn và sống lâu hơn tới hàng 100 năm.', 'image' => 'images/haiduong.jpg'],
            ['stt' => 3, 'name' => 'Mai', 'description' => 'Hoa mai có màu vàng tươi, mỗi hoa có năm cánh. Hoa mọc thành từng chùm. Cánh hoa mỏng và rất dễ rụng vì thế dưới gốc cây rợp cả màu vàng của cánh hoa. Khi hoa rụng sẽ còn lại đài hoa cũng có năm cánh nhìn như những bông hoa màu xanh lá cây đan xen với hoa vàng trông thật hài hòa về màu sắc.', 'image' => 'images/mai.jpg'],
            ['stt' => 4, 'name' => 'Tường Vy', 'description' => '	Hoa tường vi là cây thân bụi cao từ 1 - 2m, vỏ màu nâu đậm, có nhiều nhánh, cành có gai. Lá dài khoảng 1.5 - 3cm, mỗi lá có khoảng 5 - 9 lá chét hình chóp tù, có răng cưa. Những lá chét có lông và dính trọn vào cuống lá. Hoa tường vi có mùi thơm nhẹ nhàng.', 'image' => 'images/tuongvy.jpg']
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tbl-data {
            width: 100%;
            border: 1px solid #ddd;
        }
        .tbl-data th{
            text-align: left;
        }
        .tbl-data tr{
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .tbl-data td{
            width: 20%;
        }
        .img {
            width: 50px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">QUẢN LÝ HOA</h1><br>
    <a href="add.php" style="text-decoration: none; color: white; background-color: green; padding: 8px;">Thêm mới</a><br>
    <table class="tbl-data">
        <tr>
            <th><h3>Tên</h3></th>
            <th><h3>Mô tả</h3></th>
            <th><h3>Hình ảnh</h3></th>
            <th><h3>Sửa</h3></th>
            <th><h3>Xóa</h3></th>
        </tr>
    <?php 
        foreach ($_SESSION['flower'] as $flower) {
    ?>
        <tr>
            <td><?php echo $flower['name'] ?></td>
            <td><?php echo $flower['description']?></td>
            <td><img style="width: 100px" src="<?php echo $flower['image'] ?>" alt=""></td>
            <td><a href="edit.php?this_id=<?php echo $flower['stt'] ?>">Sửa</a></td>
            <td><a href="delete.php?this_id=<?php echo $flower['stt'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>

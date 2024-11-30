<?php 
    session_start();
    if (!isset($_SESSION['flower'])) {
        $_SESSION['flower'] = [];
    }
    if (isset($_GET['this_id'])) {
        $sttToEdit = $_GET['this_id']; 
        $flowerToEdit = null;
        foreach ($_SESSION['flower'] as $flower) {
            if ($flower['stt'] == $sttToEdit) {
                $flowerToEdit = $flower;
                break;
            }
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
<body>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <h1>SỬA THÔNG TIN CỦA HOA</h1>
        <label for="">Tên hoa</label>
        <input type="text" value="<?php echo $flowerToEdit['name'] ?>" name="name"><br><br>
        <label for="">Mô tả</label>
        <input style="height: 100px; width: 1000px;" type="text" value="<?php echo $flowerToEdit['description'] ?>" name="description"><br><br>
        <label for="">Hình ảnh</label>
        <input type="file" value="<?php echo $flowerToEdit['image'] ?>" name="image">
        <input type="submit" value="Sửa thông tin" name="btn-edit">
    </form>
</body>
</html>
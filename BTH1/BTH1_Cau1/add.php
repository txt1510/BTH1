<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h1 style="text-align: center">THÊM LOÀI HOA MỚI</h1>
        <label for="">Tên loài hoa</label>
        <input type="text" name="name"><br><br>
        <label for="">Mô tả</label>
        <input type="text" name="description"><br><br>
        <label for="">Hình ảnh</label>
        <input type="file" name="image" id=""><br><br>
        <input type="submit" value="Thêm mới" name="btn-add">
    </form>
    
    <?php 
        if (isset($_POST['btn-add'])) {
            $name = $_POST['name'];
            $decription = $_POST['description'];
            $path = $_FILES['image']['tmp_name'];
            $imagename = $_FILES['image']['name'];
            move_uploaded_file($path, 'images/'.$imagename);
            $image = 'images/'.$imagename;
            if (!empty($name) && !empty($decription) && !empty($image)) {
                if (!isset($_SESSION['flower'])) {
                    $_SESSION['flower'] = [];
                }

                $stt = count($_SESSION['flower']) + 1;
                $_SESSION['flower'][] = [
                    'stt' => $stt,
                    'name' => $name,
                    'description' => $decription,
                    'image' => $image,
                ];
                header('location: admin.php');
            } else {
                echo "Dữ liệu không hợp lệ";
            }
        } 
    ?>
</body>
</html>
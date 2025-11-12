<?php
//dung de luu thong tin qua nhieu trang
    try {
        session_start();
        if (isset($_POST['submit'])) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if($email == 'admin' && $password == '123') {
                $_SESSION['email'] = $email;

                echo "<script> alert ('Dang nhap thanh cong');</script>";
                header("Location: index.php");
            }else {
                echo "<script> alert ('Dang nhap khong thanh cong');</script>";
            }
        }
    }catch (Exception $e){

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>Login</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div>
        <label for="name" >Email</label>
        <input type="text" name="email">
    </div>

    <div>
        <label >Pass</label>
        <input type="text" name="password">
    </div>

    <input type="submit" value="Submit" name="submit">
</form>
</body>
</html>

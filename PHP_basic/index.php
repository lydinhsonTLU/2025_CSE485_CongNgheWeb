<?php

echo "Hello World! + Viet nam \n";
echo "Hello World! + Viet nam \n";

$name = "Son";
$age = 20;

//echo "Toi ten la ".$name . ", ".$age. " tuoi \n";
echo "$name is $age years old\n";
echo "${name} is ${age} years old\n";
var_dump($age);                         //tra ve kieu DL va gtri cua bien : int(20)
print_r($age);

//constants
define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");

echo "Server name is ".DATABASE_HOST. " and user name is ".DATABASE_USER;                 //khong dung $ cho bien constants

//=======Super Global
var_dump($_SERVER);
print_r($_SERVER);
print_r($_POST);                    //gui DL thong qua URL hoac Form sd GET or POST
print_r($_GET);

echo $_GET['name'];

if (isset($_POST['name'])) {                       //neu name co gtri thi in ra
    echo $_POST['name'];
}else echo "null \n";

if (isset($_POST['age'])) {                       //neu name co gtri thi in ra
    echo $_POST['age'];
}else echo "null";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h3>Login</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="name" >Name</label>
        <input type="text" name="name">

        <label >Age</label>
        <input type="text" name="age">

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>


<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Title</title>-->
<!--</head>-->
<!--<body>-->
<!--<h1>Welcome,-->
<?php
//    session_start();
//    if (isset($_SESSION['email'])) {
//        echo $_SESSION['email'];
//    }
//?>
<!---->
<!--</h1>-->
<!---->
<!--<a href="session.php">Back</a>-->
<!---->
<!--</body>-->
<!--</html>-->

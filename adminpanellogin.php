<?php
session_start();
@include 'config.php';
@include 'functions.php';
@include 'userHeader.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password)){
        $query = "SELECT * FROM `admins` WHERE `user_name` = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);
        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['id'];
                    echo "<script> location.href='admin.php'; </script>";
                    die;
                }
            }
        }
        echo "Wrong information added!";
    }else{
        echo "All fields are required";
    }
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $user_id = random_num(5);

    if(!empty($user_name) && !empty($email) && !empty($phone_number) && !empty($password)){
        $query = "INSERT INTO `admins` (`id`, `user_name`, `email`, `phone_number`, `password`) values ('$user_id', '$user_name', '$email', '$phone_number', '$password')";
        mysqli_query($conn, $query);
        echo "<script> location.href='login.php'; </script>";
        echo "Signup Successful";
        die;
    }else{
        echo "All fields are required";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/indexstyle.css" />
        
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

        <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Flickity CSS link -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="home">
            <div class="lban3">
                <div class="start-nav">
                    <h1>DragonStone Admin Panel</h1>
                    <p>Welcome To DragonStone Store Admin Panel. Control Mopedi Store Admin Duties here</p>
                </div>
            </div>                
        </di>
    <script src="js/scripts.js"></script> 
    <script src="js/script.js"></script> 
</body>
</html>
<?php
session_start();

if(isset($_SESSION['mail']) || isset($_SESSION['rmail'])){
    header('location:enter-pass.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--FONT FAMILY-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!--EXT CSS-->
    <link rel="stylesheet" href="css/common.css">

    <title>Share food, Save lives!</title>
    <style>
        html{
            scroll-behaviour:smooth!important;
        }
        .reg-input{
            width: 40vw!important;
            padding: 0.5em;
        }
    </style>
</head>

<body style="background-color: #222222;font-family: 'Noto Sans', sans-serif;">

    <!--NAVBAR-->
    <?php include 'components/nav.php'; ?>

    <?php
    include 'dbcon.php';
    if(isset($_POST['submail'])){
        $mail = $_POST['email'];
        $user = $_POST['user-type'];

        if($user == 'NGO'){
             $query = "SELECT * FROM ngo_details WHERE email = '$mail' ";
             $exe = mysqli_query($conn, $query);
             $count = mysqli_num_rows($exe);
             
            if($count){
                $assoc = mysqli_fetch_assoc($exe);
                $db_pass = $assoc['pass'];
                $name = $assoc['name'];
                $_SESSION['mail'] = $mail;
            }
        }
        else{
             $query = "SELECT * FROM rest_details WHERE remail = '$mail' ";
             $exe = mysqli_query($conn, $query);
             $count = mysqli_num_rows($exe);

            if($count){
                $assoc = mysqli_fetch_assoc($exe);
                $db_pass = $assoc['rpass'];
                $name = $assoc['rname'];
                $_SESSION['rmail'] = $mail;
            }
        }

        if($count == 1){
            $subject = "Forgot Password Mail";
            $body = "Hi $name, your hashed password is $db_pass Use this hash to change your password.";
            $headers = "From: sharefood012@gmail.com";

            if(mail($mail, $subject, $body, $headers)){
                ?>
                <script>
                alert("Email successfully sent!")
                location.replace('enter-pass.php')
                </script>
                <?php
            }
            else{
                ?>
                <script>
                alert("Email couldnt be sent")
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
            alert("Email not found!!")
            </script>
            <?php
        }
    }
    ?>

    <div class="card mx-auto my-sm-4" style="width: 60vw;">
        <img class="card-img-top" src="images/img.jpeg" alt="Card image cap">
        <div class="card-body">
            <center><h4 class="card-title"><b>Enter your registered email id:</b></h4>
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <input class="reg-input" type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ex: name@example.com" required><br><br>
                <label for="user-type">User Type:</label><br>
                <select class="reg-input" id="usrtype" name="user-type" required>
                    <option value="Restaurant">Restaurant</option>
                    <option value="NGO">NGO</option>
                </select><br><br>
                <button class="btn btn-secondary" type="submit" name="submail">SEND EMAIL</button><br><br>
            </form>
            </center>   
        </div>
    </div>


    <!--FOOTER-->
    <?php include 'components/footer.php'; ?>

</body>
</html>
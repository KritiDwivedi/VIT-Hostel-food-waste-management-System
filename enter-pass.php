<?php
session_start();

if(isset($_SESSION['username'])){
    header('location:ngo_viewitem.php');
}

if(isset($_SESSION['rusername'])){
    header('location:rest_additem.php');
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

    if(isset($_POST['submit'])){
        $hash = $_POST['hash'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        if(isset($_SESSION['mail'])){
            $nmail = $_SESSION['mail'];
            $que = "SELECT * FROM ngo_details WHERE email = '$nmail'";
            $exe = mysqli_query($conn, $que);
            $data = mysqli_fetch_assoc($exe);
            $db_pass = $data['pass'];
        }
        else if(isset($_SESSION['rmail'])){
            $rmail = $_SESSION['rmail'];
            $que = "SELECT * FROM rest_details WHERE remail = '$rmail'";
            $exe = mysqli_query($conn, $que);
            $data = mysqli_fetch_assoc($exe);
            $db_pass = $data['rpass'];
        }

        if($cpass == $pass){
            $password = password_hash($pass, PASSWORD_BCRYPT);
            if($hash == $db_pass){
                if(isset($_SESSION['mail'])){
                    $upd = "UPDATE ngo_details SET pass = '$password' WHERE email LIKE '$nmail' ";
                    $updexe = mysqli_query($conn, $upd);
                    if($updexe){
                        $_SESSION['username'] = $data['name'];
                        $_SESSION['id'] = $data['id'];
                        ?>
                        <script>
                            alert("Password updated!");
                            alert("Login successful")
                            location.replace("ngo_viewitem.php")
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert("An error occured, couldnt update password")
                        </script>
                        <?php
                    }   
                }
                else if(isset($_SESSION['rmail'])){
                    $upd = "UPDATE rest_details SET rpass = '$password' WHERE remail LIKE '$rmail' ";
                    $updexe = mysqli_query($conn, $upd);
                    if($updexe){
                        $_SESSION['rusername'] = $data['rname'];
                        $_SESSION['rid'] = $data['rid'];
                        ?>
                        <script>
                            alert("Password updated!");
                            alert("Login successful")
                            location.replace("rest_additem.php")
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert("An error occured, couldnt update password")
                        </script>
                        <?php
                    }     
                } 
            }
            else{
                ?>
                <script>
                    alert("Hash didnt match with the old password!");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("Passwords dont match!");
            </script>
            <?php
        }    
    }
    ?>

    <div class="card mx-auto my-sm-4" style="width: 60vw;">
        <img class="card-img-top" src="images/img.jpeg" alt="Card image cap">
        <div class="card-body">
            <center>
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <label for="hash">Enter your password hash:</label><br>
                <input name="hash" type="text"><br><br>
                <label for="pass">Enter your new password:</label><br>
                <input name="pass" type="password"><br><br>
                <label for="cpass">Confirm your new password:</label><br>
                <input name="cpass" type="password"><br><br>
                <button class="btn btn-secondary" type="submit" name="submit">CHANGE PASSWORD & LOGIN</button><br><br>
            </form>
            </center>   
        </div>
    </div>


    <!--FOOTER-->
    <?php include 'components/footer.php'; ?>

</body>
</html>
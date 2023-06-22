<?php
session_start();
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

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $addr = mysqli_real_escape_string($conn, $_POST['addr']);
    $phno = mysqli_real_escape_string($conn, $_POST['phno']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);
    $user = $_POST['user-type'];
    $password = password_hash($pass, PASSWORD_BCRYPT);

    if($user == 'NGO'){
        $emailquery = " SELECT * FROM ngo_details WHERE email='$email' ";
        $query = mysqli_query($conn, $emailquery);
        $emailcnt = mysqli_num_rows($query);

        if($emailcnt > 0){
            ?>
            <script>
                alert("Email already exists!");
            </script>
            <?php
        }
        else{
            if($pass === $cpass){
                $insertquery = "INSERT INTO ngo_details(name, email, address, phno, pass) VALUES('$name', '$email', '$addr', '$phno', '$password')";
                $iquery = mysqli_query($conn, $insertquery);
                if($iquery){
                    ?>
                    <script>
                        alert("NGO Registered Successfully!");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("An error occured, couldnt register!");
                    </script>
                    <?php
                }
            }   
            else{
                ?>
                    <script>
                        alert("Passwords do not match!");
                    </script>
                <?php
            }   
        }
    }
    else{
        $emailquery = " SELECT * FROM rest_details WHERE remail='$email' ";
        $query = mysqli_query($conn, $emailquery);
        $emailcnt = mysqli_num_rows($query);
        
        if($emailcnt > 0){
            ?>
            <script>
                alert("Email already exists!");
            </script>
            <?php
        }
        else{
            if($pass === $cpass){
                $insertquery = "INSERT INTO rest_details(rname, raddress, remail, rphno, rpass) VALUES('$name', '$addr', '$email', '$phno', '$password')";
                $iquery = mysqli_query($conn, $insertquery);
                if($iquery){
                    ?>
                    <script>
                        alert("Restaurant Registered Successfully!");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("An error occured, couldnt register!");
                    </script>
                    <?php
                }
            }   
            else{
                ?>
                    <script>
                        alert("Passwords do not match!");
                    </script>
                <?php
            }   
        }
    }  
}

?>

    <!--NAVBAR-->
    <?php include 'components/nav.php'; ?>

    <div class="card mx-auto my-sm-4" style="width: 60vw;">
        <img class="card-img-top" src="images/img4.jpg" alt="Card image cap">
        <div class="card-body">
            <center><h5 class="card-title"><b>REGISTER</b></h5>
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <label for="name">Name:</label><br>
                <input class="reg-input" type="text" id="name" name="name" pattern="[A-Za-z0-9 ]{1,30}" title="max 30 letters" required><br><br>
                <label for="addr">Address:</label><br>
                <input class="reg-input" type="text" id="addr" name="addr" pattern="[A-Za-z0-9, -]{1,50}" title="max 60 characters" required><br><br>
                <label for="phno">Phone No:</label><br>
                <input class="reg-input" type="text" id="phno" name="phno" pattern="[1-9]{1}[0-9]{9}" maxlength="10" title="10 digit phn no" required><br><br>
                <label for="email">Email:</label><br>
                <input class="reg-input" type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ex: name@example.com" required><br><br>
                <label for="pass">Enter Password:</label><br>
                <input class="reg-input" type="password" id="pass" name="pass" maxlength="30" title="max 30 chars" required><br><br>
                <label for="cpass">Confirm Password:</label><br>
                <input class="reg-input" type="password" id="cpass" name="cpass" maxlength="30" title="max 30 chars" required><br><br>
                <label for="user-type">User Type:</label><br>
                <select class="reg-input" id="usrtype" name="user-type" required>
                    <option value="Restaurant">Mess</option>
                    <option value="NGO">NGO</option>
                </select><br><br>
                <button class="btn btn-secondary" type="submit" name="submit">REGISTER</button><br>
                *after successful registration, go to the login page to enter
            </form>
            </center>   
        </div>
    </div>


    <!--FOOTER-->
    <?php include 'components/footer.php'; ?>

</body>
</html>
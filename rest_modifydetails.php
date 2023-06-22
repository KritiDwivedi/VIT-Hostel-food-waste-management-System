<?php
session_start();

if(!isset($_SESSION['rusername'])){
    header('location:login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!--FONT FAMILY-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!--EXT CSS-->
    <link rel="stylesheet" href="css/common.css">

    <title>Share food, Save lives!</title>
    <style>
        html {
            scroll-behaviour: smooth !important;
        }

        td {
            padding: 1em;
        }

        #addr-val,
        #email-val,
        #ph-val,
        #ph2-val {
            word-break: break-all;
        }
        input{
            max-width: 25vw;
            margin-right: 8px;
        }
        .head {
            font-weight: 500;
        }
    </style>
</head>

<body style="background-color: #222222;">

<?php
include 'dbcon.php';
$rid = $_SESSION['rid'];

$details = "SELECT * FROM rest_details WHERE rid LIKE '$rid'";
    $dexe = mysqli_query($conn, $details);
    $assoc = mysqli_fetch_assoc($dexe);
    $vaddr = $assoc['raddress'];
    $vphno = $assoc['rphno'];
    $vphno2 = $assoc['rphno2'];
    $vmail = $assoc['remail'];

if(isset($_POST['subaddr'])){
    $addr = trim(mysqli_real_escape_string($conn, $_POST['addr']));
    $que = "UPDATE rest_details SET `raddress` = '$addr' WHERE rid LIKE '$rid'";
    $exe = mysqli_query($conn, $que);
    if($exe){
        ?>
            <script>
                alert("Address Updated successfully!");
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert("An error occured, couldnt update!");
            </script>
        <?php
    }

}
if(isset($_POST['subph'])){
    $phno = $_POST['phno'];
    $que = "UPDATE rest_details SET rphno = '$phno' WHERE rid LIKE '$rid'";
    $exe = mysqli_query($conn, $que);
    if($exe){
        ?>
            <script>
                alert("Phone Updated successfully!");
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert("An error occured, couldnt update!");
            </script>
        <?php
    }
}
if(isset($_POST['subph2'])){
    $phno2 = $_POST['phno2'];
    $que = "UPDATE rest_details SET rphno2 = '$phno2' WHERE rid LIKE '$rid'";
    $exe = mysqli_query($conn, $que);
    if($exe){
        ?>
            <script>
                alert("Phone 2 Updated successfully!");
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert("An error occured, couldnt update!");
            </script>
        <?php
    }
}
if(isset($_POST['submail'])){
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $que = "UPDATE rest_details SET remail= '$email' WHERE rid LIKE '$rid'";
    $exe = mysqli_query($conn, $que);
    if($exe){
        ?>
            <script>
                alert("Email Updated successfully!");
            </script>
        <?php
    }
    else{
        ?>
            <script>
                alert("An error occured, couldnt update!");
            </script>
        <?php
    }
}

if(isset($_POST['subpass'])){
    $opass = $_POST['oldpass'];
    $npass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $dbpass = $assoc['rpass'];
    $password = password_hash($npass, PASSWORD_BCRYPT);

    $pass_decode = password_verify($opass, $dbpass);
    if($npass == $cpass){
        if($pass_decode){
            $upd = "UPDATE rest_details SET rpass = '$password' WHERE rid LIKE '$rid' ";
            $updexe = mysqli_query($conn, $upd);
            if($updexe){
            ?>
            <script>
                alert("Password updated!");
            </script>
            <?php
            }
        }
        else{
            ?>
            <script>
                alert("Current password is wrong!");
            </script>
            <?php
        }
    }
    else{
         ?>
            <script>
                alert("The two new passwords dont match!");
            </script>
            <?php
    }
}

?>

    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">
            <!--include side nav-->
            <?php include 'components/rest_nav.php'; ?>

            <div class="col d-flex flex-column h-100">
                <main class="row">
                    <div class="col py-4" style="color: white;">

                    <div class="row welc">
                        <div class="col">WELCOME MESS <?php echo $_SESSION['rusername']; ?> !</div>
                    </div>

                        <center>
                            <h3>Modify Details:</h3>
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <td>
                                            <span class="gold-color head">Address:</span>
                                        </td>
                                        <td>
                                            <span id="addr-val"><?php echo $vaddr; ?></span>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" onclick="edit()">Edit</button>
                                        </td>
                                    </tr>
                                    <tr id="up-addr">
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="gold-color head">Email:</span>
                                        </td>
                                        <td>
                                            <span id="email-val"><?php echo $vmail; ?></span>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" onclick="edit_email()">Edit</button>
                                        </td>
                                    </tr>
                                    <tr id="up-email">
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="gold-color head">Phone No:</span>
                                        </td>
                                        <td>
                                            <span id="ph-val"><?php echo $vphno; ?></span>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" onclick="edit_ph()">Edit</button>
                                        </td>
                                    </tr>
                                    <tr id="up-ph">
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="gold-color head">Phone No 2 (optional):</span>
                                        </td>
                                        <td>
                                            <span id="ph2-val"><?php echo $vphno2; ?></span>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" onclick="edit_ph2()">Edit</button>
                                        </td>
                                    </tr>
                                    <tr id="up-ph2">
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="gold-color head">Password:</span>
                                        </td>
                                        <td>
                                            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                            <input style="margin-bottom:0.5rem;" placeholder="Enter current password.." type="password" name="oldpass" required><br>
                                            <input style="margin-bottom:0.5rem;" placeholder="Enter new password.." type="password" name="pass" required><br>
                                            <input style="margin-bottom:0.5rem;" placeholder="Confirm new password.." type="password" name="cpass" required><br>
                                            <button class="btn btn-secondary" type="submit" name="subpass">Update</button></form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </center>
                    </div>
                </main>
                <footer class="row bg-dark text-white text-center p-3 mt-auto">
                    <div class="col"> Developed by <u>Nikkhil Chopra</u> , <u>Kushagra Veer Garg</u> & <u>Kriti</u></div>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script>
        function edit(){
            var ele = document.getElementById('up-addr');
            ele.innerHTML = "<td></td><td><form method=\"POST\" action=\"\<?php echo htmlentities($_SERVER['PHP_SELF']); ?>\"><input type=\"text\" id=\"addr\" name=\"addr\" pattern=\"[A-Za-z0-9, -]{1,50}\" title=\"max 50 characters\" required><button class=\"btn btn-secondary\" type=\"submit\" name=\"subaddr\">Update</button></form></td>";
        }

        function edit_email(){
            var ele2 = document.getElementById('up-email');
            ele2.innerHTML = "<td></td><td><form method=\"POST\" action=\"\<?php echo htmlentities($_SERVER['PHP_SELF']); ?>\"><input type=\"email\" id=\"email\" name=\"email\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$\" title=\"Ex: name@example.com\" required><button class=\"btn btn-secondary\" type=\"submit\" name=\"submail\">Update</button></form></td>";
        }

        function edit_ph(){
            var ele3 = document.getElementById('up-ph');
            ele3.innerHTML = "<td></td><td><form method=\"POST\" action=\"\<?php echo htmlentities($_SERVER['PHP_SELF']); ?>\"><input type=\"text\" id=\"phno\" name=\"phno\" pattern=\"[1-9]{1}[0-9]{9}\" maxlength=\"10\" title=\"10 digit phn no\" required><button class=\"btn btn-secondary\" type=\"submit\" name=\"subph\">Update</button></form></td>";
        }

        function edit_ph2(){
            var ele4 = document.getElementById('up-ph2');
            ele4.innerHTML = "<td></td><td><form method=\"POST\" action=\"\<?php echo htmlentities($_SERVER['PHP_SELF']); ?>\"><input type=\"text\" id=\"phno2\" name=\"phno2\" pattern=\"[1-9]{1}[0-9]{9}\" maxlength=\"10\" title=\"10 digit phn no\" required><button class=\"btn btn-secondary\" type=\"submit\" name=\"subph2\">Update</button></form></td>";
        }
        
    </script>
</body>
</html>
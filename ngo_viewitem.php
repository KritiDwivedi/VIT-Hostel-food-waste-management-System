<?php
session_start();

if(!isset($_SESSION['username'])){
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
        .reg-input{
            width: 50vw!important;
            padding: 0.25em;
        }
        @media screen and (min-width: 700px) and (max-width: 1200px){
            .reg-input{
                width: 30vw!important;
            }
        }
         @media screen and (min-width: 1200px){
            .reg-input{
                width: 24vw!important;
            }
        }
    </style>
</head>

<body style="background-color: #222222;">

    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">
            <!--include side nav-->
            <?php include 'components/ngo_nav.php'; ?>

            <div class="col d-flex flex-column h-100">
                <main class="row">
                    <div class="col py-4" style="color: white;">

                        <div class="row welc">
                            <div class="col">WELCOME NGO <?php echo $_SESSION['username']; ?> !</div>
                        </div>
                        <div class="row" style="text-align:center;">
                            <div class="col">
                                Enter the id of selected item :<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" style="margin-top:0.5em;"><input type="text" maxlength="5" name="f-id" pattern="[1-9]{1}[0-9]{0,4}" title="max 5 digits" required><button class="btn btn-secondary" class="reg-input" name="select" type="submit">SELECT</button></form>
                            </div>
                        </div>

                        <?php
                        include 'dbcon.php';
                        $abc=0;
                        $query = "SELECT * FROM food_item WHERE fstatus = ".$abc;
                        $execute = mysqli_query($conn, $query);

                        if(isset($_POST['select'])){
                            $fid = $_POST['f-id'];
                            $upd = 1;
                            $statquery = "UPDATE food_item SET fstatus = $upd WHERE fid LIKE '$fid'";
                            $statexecute = mysqli_query($conn, $statquery);

                            $ngo = $_SESSION['id'];
                            $nquery = "UPDATE food_item SET nid = $ngo WHERE fid LIKE '$fid'";
                            $nexe = mysqli_query($conn, $nquery);

                            $check = " SELECT * FROM food_item WHERE fid='$fid' ";
                            $count = mysqli_query($conn, $check);
                            $qcount = mysqli_num_rows($count);
                            
                            if($qcount){
                                echo "<script>alert('Item chosen successfully!');</script>";
                            }
                            else{
                                echo "<script>alert('Entered id doesnt exist!');</script>";
                            }
                        }
                        
                        while($row = mysqli_fetch_assoc($execute)){
                            ?>

                        <div class="row mx-auto" style="width:80%;margin-top:20px;background-color:#289bd1;">
                            <div class="col-8" style="padding: 2em;">
                                <u>ITEM ID : <?php echo $row['fid'];?></u><br>RESTAURANT NAME :
                                <?php
                                $restid = $row['rid'];
                                $rquery = "SELECT * FROM rest_details WHERE rid = ".$restid;
                                $rexe = mysqli_query($conn, $rquery);
                                $rrow = mysqli_fetch_assoc($rexe);
                                echo $rrow['rname'];
                                ?>
                                <br>
                                ADDRESS :
                                <?php
                                echo $rrow['raddress'];
                                ?><br>
                                CONTACT :
                                <?php
                                echo $rrow['rphno'];
                                ?>
                                <br><br>

                                <div class="row">
                                    <div class="col">
                                        <span><b>Food Type: </b><?php echo $row['ftype'];?></span><br>
                                        <span><b>Name: </b><?php echo $row['fname'];?></span><br>
                                        <span><b>Quantity: </b><?php echo $row['fquantity'];?></span><br>
                                        <span><b>No. of people fed: </b><?php echo $row['fpeople'];?></span><br>
                                        <span><b>Description: </b><?php echo $row['fdescp'];?></span><br>
                                    </div>
                                    <div class="col">
                                        <span><b>Weight: </b> <?php echo $row['fweight'];?> kg</span><br>
                                        <span><b>Cooked Time: </b><?php echo $row['fcooktime'];?></span><br>
                                        <span><b>Approx Expiration Time: </b><?php echo $row['fexptime'];?> hrs</span><br>
                                        <span><b>Feasible Pickup Time: </b><?php echo $row['fspick'];?> hrs TO <?php echo $row['fepick'];?> hrs</span><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4" style="padding:0;">
                            <img src="images/img3.png" style="width:100%;height:auto;">
                            </div>
                        </div>

                        <?php
                        }
                        ?>

                    </div>
                </main>
                <footer class="row bg-dark text-white text-center p-3 mt-auto">
                    <div class="col"> Developed by <u>Nikkhil Chopra</u> , <u>Kushagra Veer Garg</u> & <u>Kriti Dwivedi</u> </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    </body>
</html>
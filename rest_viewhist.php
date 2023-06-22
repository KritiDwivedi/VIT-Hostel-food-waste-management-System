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
                    <div class="row" style="text-align:center;">
                        <div class="col">
                            *green color means your food item has been selected by an NGO, red means it is yet to be selected!
                        </div>
                    </div>

                    <?php
                    include 'dbcon.php';
                    $rest = $_SESSION['rid'];
                    $query = "SELECT * FROM food_item WHERE rid = ".$rest;
                    $execute = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($execute)){
                    ?>

                        
                                <?php
                                $ngoid = $row['nid'];
                                if($ngoid != NULL){
                                $nquery = "SELECT * FROM ngo_details WHERE id = ".$ngoid;
                                $nexe = mysqli_query($conn, $nquery);
                                $nrow = mysqli_fetch_assoc($nexe);
                                ?>
                                <div class="row mx-auto" style="width:80%;margin-top:20px;background-color:#80a840;">
                            <div class="col-8" style="padding: 2em;">

                                NGO NAME :
                                <?php
                                echo $nrow['name'];
                                ?>
                                <br>
                                ADDRESS :
                                <?php
                                echo $nrow['address'];
                                ?><br>
                                CONTACT :
                                <?php
                                echo $nrow['phno'];
                                }
                                else{
                                ?>
                                <div class="row mx-auto" style="width:80%;margin-top:20px;background-color:#c95832;;">
                            <div class="col-8" style="padding: 2em;">

                                NGO NAME :
                                <?php
                                    echo "NA";
                                }
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
                    <div class="col">Developed by <u>Nikkhil Chopra</u> , <u>Kushagra Veer Garg</u> & <u>Kriti</u></div>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    </body>
</html>
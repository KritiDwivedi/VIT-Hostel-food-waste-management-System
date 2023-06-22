<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--AOS-->
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
    </style>
</head>

<body style="background-color: #222222;color: white;font-family: 'Noto Sans', sans-serif;">
    
    <!--NAVBAR-->
    <?php include 'components/nav.php'; ?>

    <!--GALLERY-->
    <div class="row my-4 mx-2">
        <div class="col-sm my-2" data-aos="fade-down">
            <img src="images/img.jpeg" style="width: 100%;height: auto;">
        </div>
        <div class="col-sm my-2" data-aos="fade-up">
            <img src="images/logo.jpg" style="width: 100%;height: auto;">
        </div>
        <div class="col-sm my-2" data-aos="fade-down">
            <img src="images/img6.jpg" style="width: 100%;height: auto;">
        </div>
        <div class="col-sm my-2" data-aos="fade-up">
            <img src="images/img7.jpg" style="width: 100%;height: auto;">
        </div>
    </div>

    <hr style="background-color: white;">

    <!--ABOUT US-->
    <div class="mx-4 my-2 py-4" id="facts">
        <h1 class="gold-color">
            SOME FACTS
        </h1>
        <div>
        <ul>
            <li>Around 67 million tonnes of food is wasted in India every year which has been valued at around `92,000 crores; enough to feed all of Bihar for a year (src : <a href="https://www.scoopwhoop.com/The-Problem-Of-Food-Wastage-In-India/">https://www.scoopwhoop.com/The-Problem-Of-Food-Wastage-In-India/)</a></li>
            <li>Roughly one third of the food produced in the world for human consumption every year – approximately 1,3 billion tonnes – gets lost or wasted (src : <a href="https://stopwastingfoodmovement.org/food-waste/food-waste-facts/">https://stopwastingfoodmovement.org/food-waste/food-waste-facts/)</a></li>
            <li>The amount of food lost or wasted costs 2.6 trillion USD annually and is more than enough to feed all the 815 million hungry people in the world - four times over (src : <a href="https://en.reset.org/knowledge/global-food-waste-and-its-environmental-impact-09122018">https://en.reset.org/knowledge/global-food-waste-and-its-environmental-impact-09122018)</a></li>
        </div>
    </div>

    <hr style="background-color: white;">

    <!--WHY THIS PROJECT-->
    <div class="mx-4 my-2 py-4" id="whyproj">
        <h1 class="gold-color">
            WHY THIS PROJECT
        </h1>
        <div>
            <p>Food wastage is one the biggest problems in our current world. On one hand hundreds of kgs of consumable food is going into the garbage cans while on the other, hundreds of people are dying due to not enough food consumption and improper nutrition.</p>
            <p>Malnutrition and inadequate food supplies to millions of people and children around the world is increasing. The population is increasing at a rate which is greater than the rate of production of enough food. And even in such circumstances thousands and thousands of kgs of food is wasted everyday around the globe. This calls for the need of sustainable systems that can help reduce food waste and in turn convert it into food that goes inside peoples’ bellies.</p>
            <p>Thus we wanted to weave technology, humanity and sustainability together to create a project that can tackle a social issue like hunger and unnecessary food waste. This project will help feed thousands of needy people and thus we chose to work on this title.</p>

        </div>
    </div>

    <hr style="background-color: white;">

    <!--CONTACT US-->
    <div class="mx-4 my-2 py-4" id="contact">
        <h1 class="gold-color">
            CONTACT US
        </h1>
        <div>
            <p>
            <h4 class="gold-color">NIKKHIL CHOPRA</h4>
            nikkhil.chopra2020@vitstudent.ac.in<br>
            20BCE0927<br>
            </p>
            <p>
            <h4 class="gold-color">KUSHAGRA VEER GARG</h4>
            kushagraveer.garg2020@vitstudent.ac.in<br>
            20BCE0935<br>
            </p>
            <p>
            <h4 class="gold-color">KRITI DWIVEDI</h4>
            kriti.dwivedi2020@vitstudent.ac.in<br>
            20BCE2682<br>
            </p>
        </div>
    </div>

    <!--FOOTER-->
    <?php include 'components/footer.php'; ?>
   




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!--FOR AOS-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 500,
            duration: 1500
        });
    </script>

</body>

</html>
<?php
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home - DragonStone</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- Flickity CSS link -->
   <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
?>
<?php include 'header.php'; ?>
<div class="lban">
   <div class="start-nav">
      <h1>Discover Sustainable Living</h1>
      <p>Discover eco-friendly home products that align with your values. Transform your space while caring for our planet!</p>
      <button class="lbutton"  type="button" onclick="window.location.href='products.php';"><span class="sspan"></span>Shop Now</button>
   </div>
</div>
<?php include 'slider.php'; ?>
<div class="bbbody">
    <div class="ccontainer">
        <div class="left">
            <h1 class="hh1">DragonStone offers a curated collection of sustainable home products from ethical manufacturers.</h1>
        </div>
        <div class="right">
            <p class="pp">Transform your home with products that respect the planet. From bamboo kitchen essentials to organic cotton linens, compostable cleaning supplies to recycled glass décor, we provide eco-friendly solutions from trusted manufacturers. Every product is thoughtfully selected to combine style, functionality, and environmental responsibility. Browse DragonStone and create a home that reflects your commitment to sustainable living.</p>
        </div>
    </div>
    <div class="ccontainer">
        <!-- Replace with image of eco-friendly product collection (bamboo items, natural materials, plants) -->
        <img alt="Collection of sustainable home products including bamboo utensils and natural décor items" class="image-self" src="images/eco-products-collection.jpg" style="margin-left: 30px;">
        <div class="left">
            <h1 class="hh1" style="margin-left: 100px; margin-bottom: 30px">Explore Our Collection.</h1>
            <p class="pp" style="margin-left: 100px;">Browse through our sustainable product categories to find items that match your eco-conscious lifestyle. Click the button below to explore our full range of home essentials.</p>
            <div class="button-container">
                <button class="xbutton"  onclick="window.location.href='products.php';">Explore</input>
            </div>
        </div>
    </div>
    <div class="ccontainer">
        <div class="left">
            <h1 class="hh1" style="margin-left: 30px; margin-bottom: 30px">Learn Our Story.</h1>
            <p class="pp" style="margin-left: 30px;">Want to know more about DragonStone's mission and our commitment to sustainability? Click the button below to discover our journey and values.</p>
            <div class="button-container">
                <button class="xbutton"  onclick="window.location.href='about.php';">Learn More</input>
            </div>
        </div>
        <!-- Replace with image of natural, sustainable home interior with plants and eco-friendly furniture -->
        <img alt="Beautifully styled sustainable home interior featuring natural materials and greenery" class="image-self" src="images/sustainable-living-space.jpg" style="margin-right: 100px">
    </div>
    <div class="ccontainer">
        <div class="left" style="margin: auto 200px;">
            <h1 class="hh1" style="margin-left: 30px; margin-bottom: 30px">Make a Difference.</h1>
            <p class="pp" style="margin-left: 30px;">Discover our recommended and newest sustainable products available at DragonStone. From cleaning essentials to home décor, kitchen supplies to bathroom accessories, find eco-friendly alternatives that reduce waste and environmental impact. Every purchase supports small-scale manufacturers who prioritize ethical practices and quality craftsmanship. We believe sustainable living should be accessible and beautiful. Share your feedback with us—we're committed to continuous improvement and ensuring your complete satisfaction on your journey toward greener living.</p>
        </div>
    </div>
</div>
<?php @include 'footer.php'; ?>
<!-- Flickity JS link -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<script type="text/javascript">
   $('.main-carousel').flickity({
      cellAlign: 'left',
      wrapAround: true,
      freeScroll: true
   });
</script>
</body>
</html>
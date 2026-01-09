<?php
require_once __DIR__ . '/config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About - DragonStone</title>

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
      <h1>About DragonStone</h1>
      <p>Discover our mission to make sustainable living accessible and beautiful.</p>
   </div>
</div>


<section class="about-us">
   <div class="about-container">
      <!-- Replace with image of the three founders or sustainable living scene -->
      <img src="assets/action-2277292_1280.jpg" alt="DragonStone founders - Aegon, Visenya, and Rhaenys" class="about-image">
      <div class="about-text">
         <h1>About DragonStone</h1>
         <p>At DragonStone, we believe that sustainable living shouldn't require sacrifice. Founded by three passionate advocates—Aegon, Visenya, and Rhaenys—DragonStone was born from a shared frustration with the difficulty of finding genuinely eco-friendly home products that are both stylish and affordable. We spent nearly a year researching suppliers, testing products, and building relationships with small-scale manufacturers who share our values of transparency, quality, and environmental responsibility.</p>
         <p>- Aegon, Visenya & Rhaenys.</p>
      </div>
   </div>
</section>

<section class="our-story">
   <div class="story-container">
      <h1>At DragonStone</h1>
      <p>At DragonStone, we prioritize providing the highest quality sustainable products while minimizing environmental impact. We ensure that our eco-friendly goods are ethically sourced and delivered safely. We treat our customers, partners, and the planet with the respect they deserve. We practice transparency in our supply chain, support fair trade, and are committed to continuous improvement in our sustainability practices.</p>
   </div>
</section>

<section class="cccontact-us">
   <div class="cccontact-container">
      <h1>Have Questions About Sustainable Living?</h1>
      <p>We provide support to help you make eco-conscious choices for your home.</p>
      <div class="ppphone-box">
         <i class="fas fa-phone-alt"></i> +27 11 648 2684
      </div>
   </div>
</section>

  <section class="our-commitment">
    <div class="commitment-container">
        <h1>Our Commitment to Sustainability</h1>
        <p class="commitment-intro">Environmental responsibility and customer satisfaction guide everything we do.</p>
        <h2 style="color: #3d4a3a;">We are committed to providing:</h2>
        <p style="color: #5a5a5a;"><strong>Genuinely Sustainable Products:</strong> Every item in our collection is carefully vetted for its environmental credentials. We partner with ethical manufacturers who prioritize renewable materials, minimal waste, and fair labor practices.</p>
        <p style="color: #5a5a5a;"><strong>Transparency & Education:</strong> We believe in empowering our customers with knowledge. Each product includes detailed information about its materials, manufacturing process, and environmental impact. Our team is always ready to answer questions about sustainable living.</p>
        <p style="color: #5a5a5a;"><strong>Ethical Sourcing:</strong> We work directly with small-scale manufacturers who share our values. From bamboo farmers to organic cotton producers, we ensure fair compensation and sustainable practices throughout our supply chain.</p>
        <p style="color: #5a5a5a;"><strong>Minimal Packaging & Carbon-Neutral Shipping:</strong> We use recycled, biodegradable packaging materials and offset our shipping emissions. Our commitment extends beyond the products themselves to every aspect of our operations.</p>
    </div>
  </section>
<div class="container-counter">
    <div class="sstory-container">
        <div class="story-text">
            <h1>Our Story</h1>
            <p>DragonStone started when Visenya, a former interior designer advocating for eco-conscious living, partnered with Aegon, a logistics expert passionate about ethical sourcing, and Rhaenys, a digital marketer committed to environmental activism. Together, they saw an opportunity to create a brand that educates and empowers consumers to make sustainable choices without compromising on style or quality. What began as a vision has grown into a thriving community of conscious consumers.</p>
        </div>
        <div class="story-stats">
            <div class="stat">
                <div class="counter" data-target="85">0</div>
                <p>Ethical Manufacturers</p>
            </div>
            <div class="stat">
                <div class="counter" data-target="150" data-suffix="%">0</div>
                <p>Growth in Sustainable Product Range</p>
            </div>
            <div class="stat">
                <div class="counter" data-target="500">0</div>
                <p>Tons of Plastic Waste Prevented</p>
            </div>
            <div class="stat">
                <div class="counter" data-target="8">0</div>
                <p>Sustainability Certifications</p>
            </div>
        </div>
    </div>
</div>
    <div class="ccontainer-counter">
        <div class="counter-box" style="background-color: #6b8e23;">
            <div class="counter" data-target="12000" style="color: white;">0</div>
            <h2>Conscious Customers</h2>
            <p>Join our growing community of eco-conscious consumers making a difference.</p>
        </div>
        <div class="counter-box" style="background-color: #f5f5dc;">
            <div class="counter" data-target="45">0</div>
            <h2 style="color: black;">Sustainability Experts</h2>
            <p style="color: grey;">Product researchers, environmental consultants, supply chain specialists, and more.</p>
        </div>
        <div class="counter-box" style="background-color: #6b8e23;">
            <div class="counter" data-target="30" style="color: white;">0</div>
            <h2>Successful Partnerships</h2>
            <p>We've built strong relationships with ethical manufacturers committed to sustainable practices.</p>
        </div>
        <div class="counter-box" style="background-color: #f5f5dc;">
            <div class="counter" data-target="15">0</div>
            <h2 style="color: black;">Environmental Initiatives</h2>
            <p style="color: grey;">From tree planting programs to ocean cleanup partnerships, we invest in our planet's future.</p>
        </div>
    </div>

    <section class="our-story">
        <div class="story-container">
            <h1>Join Our Movement</h1>
            <p>DragonStone is more than a store—it's a movement toward sustainable living. Our customers are vital partners in creating positive environmental change. We love seeing how our products become part of your eco-conscious lifestyle. Share your DragonStone journey with us on social media using #DragonStoneGreen, and join our community of changemakers. Thank you for choosing DragonStone. Together, we're proving that sustainable living can be accessible, beautiful, and impactful. Your commitment to the planet inspires us every day, and we look forward to growing this movement with you.</p>
        </div>
    </section>

    <section class="bbox-container">
        <div class="new-container">
            <div class="box">
                <h2>Founders & Visionaries</h2>
                <p>Aegon (Logistics & Sourcing), Visenya (Product & Design), Rhaenys (Marketing & Community)</p>
            </div>
            <div class="box">
                <h2>Sustainability Team</h2>
                <p>Product researchers, environmental impact analysts, supply chain auditors, and certification specialists</p>
            </div>
            <div class="box">
                <h2>Customer Experience</h2>
                <p>Support specialists, educational content creators, and community engagement coordinators</p>
            </div>
            <div class="box">
                <h2>Operations & Partnerships</h2>
                <p>Manufacturer liaisons, quality control experts, and logistics coordinators ensuring ethical practices</p>
            </div>
        </div>
    </section>
    <script src="js/counter.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="js/script.js"></script>

<?php @include 'footer.php'; ?>

</body>
</html>
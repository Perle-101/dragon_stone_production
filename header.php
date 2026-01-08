<header class="header">
   <div class="flex">
      <a href="index.php" class="logout-btn"> 
         <img src="images/dragonstone-logo.png" alt="DragonStone Home">
      </a>
      <a href="home.php" class="logo">DragonStone</a>
      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="products.php">Shop</a>
         <a href="about.php">About</a>
         <a href="contact.php">Contact</a>
      </nav>
      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>
      <a href="cart.php" class="cart"><i class="fas fa-shopping-bag"></i> <span><?php echo $row_count; ?></span> </a>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</header>
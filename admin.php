<?php
// Include database configuration
require_once __DIR__ . '/config.php';

/*
|--------------------------------------------------------------------------
| ADD PRODUCT LOGIC
|--------------------------------------------------------------------------
| Handles adding a new product to the database
*/
if (isset($_POST['add_product'])) {

   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_description = $_POST['p_description'];
   $p_category = $_POST['p_category'];

   // Image upload handling
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/' . $p_image;

   // Check if products table exists
   $check_table = mysqli_query($conn, "SHOW TABLES LIKE 'products'");

   if (mysqli_num_rows($check_table) > 0) {

      $insert_query = mysqli_query(
         $conn,
         "INSERT INTO products (name, price, description, category, image)
          VALUES ('$p_name', '$p_price', '$p_description', '$p_category', '$p_image')"
      );

      if ($insert_query) {
         move_uploaded_file($p_image_tmp_name, $p_image_folder);
         $message[] = 'Product added successfully';
      } else {
         $message[] = 'Failed to add product';
      }

   } else {
      $message[] = 'Products table does not exist';
   }
}

/*
|--------------------------------------------------------------------------
| DELETE PRODUCT LOGIC
|--------------------------------------------------------------------------
*/
if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $delete_id");
   header('location:admin.php');
}

/*
|--------------------------------------------------------------------------
| UPDATE PRODUCT LOGIC
|--------------------------------------------------------------------------
*/
if (isset($_POST['update_product'])) {

   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_description = $_POST['update_p_description'];
   $update_p_category = $_POST['update_p_category'];

   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/' . $update_p_image;

   $update_query = mysqli_query(
      $conn,
      "UPDATE products 
       SET name='$update_p_name',
           price='$update_p_price',
           description='$update_p_description',
           category='$update_p_category',
           image='$update_p_image'
       WHERE id='$update_p_id'"
   );

   if ($update_query) {
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      header('location:admin.php');
   }
}

/*
|--------------------------------------------------------------------------
| CATEGORY FILTER LOGIC
|--------------------------------------------------------------------------
*/
$filter_category = '';
if (isset($_POST['filter_category'])) {
   $filter_category = $_POST['category'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>DragonStone Admin Panel</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ADMIN HEADER -->
<div class="admin-container"> <div class="view-order-container"> 
   <a href='adminorderhistory.php' class='btn back-btn'>View Orders</a> </div> <div class="logout-admin-container"> 
   <a href="adminpanellogin.php" class="btn logout-btn" style="width: fit-content;">Logout</a>
</a> 
</div> 
</div>

<!-- SYSTEM MESSAGES -->
<?php
if (isset($message)) {
   foreach ($message as $msg) {
      echo '
      <div class="message">
         <span>' . $msg . '</span>
         <i class="fas fa-times" onclick="this.parentElement.style.display=\'none\'"></i>
      </div>';
   }
}
?>

<div class="container">

<!-- ADD PRODUCT FORM -->
<section>
<form method="post" enctype="multipart/form-data" class="add-product-form">
   <h3>Add New Product</h3>

   <input type="text" name="p_name" placeholder="Product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Product price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <textarea name="p_description" placeholder="Product description" class="box" required></textarea>

   <select name="p_category" class="box" required>
      <option disabled selected>Select category</option>
      <option value="Cleaning & Household Supplies">Cleaning & Household Supplies</option>
      <option value="Kitchen & Dining">Kitchen & Dining</option>
      <option value="Home Décor & Living">Home Décor & Living</option>
      <option value="Bathroom & Personal Care">Bathroom & Personal Care</option>
      <option value="Lifestyle & Wellness">Lifestyle & Wellness</option>
      <option value="Kids & Pets">Kids & Pets</option>
      <option value="Outdoor & Garden">Outdoor & Garden</option>
   </select>

   <input type="submit" name="add_product" value="Add Product" class="btn">
</form>
</section>

<!-- FILTER PRODUCTS -->
<section>
<form method="post" class="add-product-form">
   <h3>Filter by Category</h3>

   <select name="category" class="box" required>
      <option disabled selected>Select category</option>
      <option value="All">All</option>
      <option value="Cleaning & Household Supplies">Cleaning & Household Supplies</option>
      <option value="Kitchen & Dining">Kitchen & Dining</option>
      <option value="Home Décor & Living">Home Décor & Living</option>
      <option value="Bathroom & Personal Care">Bathroom & Personal Care</option>
      <option value="Lifestyle & Wellness">Lifestyle & Wellness</option>
      <option value="Kids & Pets">Kids & Pets</option>
      <option value="Outdoor & Garden">Outdoor & Garden</option>
   </select>

   <input type="submit" name="filter_category" value="Filter" class="btn">
</form>
</section>

<!-- PRODUCT TABLE -->
<section class="display-product-table">
<table>
   <thead>
      <th>Image</th>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Category</th>
      <th>Actions</th>
   </thead>

   <tbody>
   <?php
      $query = "SELECT * FROM products";
      if ($filter_category && $filter_category != 'All') {
         $query .= " WHERE category='$filter_category'";
      }

      $products = mysqli_query($conn, $query);

      if (mysqli_num_rows($products) > 0) {
         while ($row = mysqli_fetch_assoc($products)) {
   ?>
      <tr>
         <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100"></td>
         <td><?php echo $row['name']; ?></td>
         <td>R<?php echo $row['price']; ?></td>
         <td><?php echo $row['description']; ?></td>
         <td><?php echo $row['category']; ?></td>
         <td>
            <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
               onclick="return confirm('Delete this product?');">
               <i class="fas fa-trash"></i> Delete
            </a>
            <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn">
               <i class="fas fa-edit"></i> Update
            </a>
         </td>
      </tr>
   <?php
         }
      } else {
         echo '<tr><td colspan="6">No products found</td></tr>';
      }
   ?>
   </tbody>
</table>
</section>

<!-- UPDATE FORM -->
<section class="edit-form-container">
<?php
if (isset($_GET['edit'])) {
   $edit_id = $_GET['edit'];
   $edit_query = mysqli_query($conn, "SELECT * FROM products WHERE id = $edit_id");

   if (mysqli_num_rows($edit_query) > 0) {
      $fetch_edit = mysqli_fetch_assoc($edit_query);
?>
<form method="post" enctype="multipart/form-data">
   <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="150">

   <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
   <input type="text" name="update_p_name" class="box" value="<?php echo $fetch_edit['name']; ?>" required>
   <input type="number" name="update_p_price" class="box" value="<?php echo $fetch_edit['price']; ?>" required>
   <textarea name="update_p_description" class="box" required><?php echo $fetch_edit['description']; ?></textarea>

   <select name="update_p_category" class="box" required>
      <?php
      $categories = [
         "Cleaning & Household Supplies",
         "Kitchen & Dining",
         "Home Décor & Living",
         "Bathroom & Personal Care",
         "Lifestyle & Wellness",
         "Kids & Pets",
         "Outdoor & Garden"
      ];
      foreach ($categories as $cat) {
         $selected = ($fetch_edit['category'] == $cat) ? 'selected' : '';
         echo "<option value=\"$cat\" $selected>$cat</option>";
      }
      ?>
   </select>

   <input type="file" name="update_p_image" class="box" required>
   <input type="submit" name="update_product" value="Update Product" class="btn">
   <input type="reset" value="Cancel" class="option-btn" onclick="window.location.href='admin.php'">
</form>
<script>
   document.querySelector('.edit-form-container').style.display = 'flex';
</script>
<?php } } ?>
</section>

</div>

<script src="js/script.js"></script>
</body>
</html>

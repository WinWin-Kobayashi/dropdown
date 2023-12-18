<?php
    include('connection.php');
    if(isset($_POST['submit'])){
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];

        // Fetch the category_name based on the selected category_id
        $category_query = mysqli_query($con, "SELECT category_name FROM category WHERE id = '$category_id'");
        $category_data = mysqli_fetch_array($category_query);
        $category_name = $category_data['category_name'];

        // Insert both product_name and category_name into the product table
        $query = mysqli_query($con, "INSERT INTO product (product_name, category_id, category_name) VALUES ('$product_name', '$category_id', '$category_name')");

        if($query){
            echo "<script> alert('done')</script>";
        }else{
            echo "<script> alert('error')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown</title>
</head>
<body>
    <form action="" method="POST">
        <label>Product Name:</label>
        <input type="text" name="product_name" /> <br />
        <select name="category_id">
            <?php 
                $categories = mysqli_query($con, "SELECT * FROM category");
                while($c = mysqli_fetch_array($categories)){
            ?>
            <option value="<?php echo $c['id']?>"><?php echo $c['category_name']?></option>
            <?php } ?>
        </select>
        <button type='submit' name='submit'>Submit</button>
    </form>
</body>
</html>

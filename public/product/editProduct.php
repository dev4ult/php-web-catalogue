<form action="" method="post" enctype="multipart/form-data"
    class="edit-item fixed top-0 left-0 w-screen h-screen bg-slate-600 bg-opacity-70 hidden">
    <div class="m-auto bg-slate-800 p-5 rounded-lg">
        <table>
            <!-- Choose a category  | name = category-name -->
            <tr>
                <td class="text-right">
                    <label for="category-name" class="text-2xl text-white mr-4">Category</label>
                </td>
                <td>
                    <select type="text" id="category-name" name="category-name"
                        class="border-none rounded-md focus:outline-none text-2xl px-2 py-1 mt-2 text-white bg-slate-800 bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-left-bottom"
                        required>
                        <option value="" disabled selected class="">choose</option>
                        <?php 
                    $categorySelect = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id");
                    while($r = mysqli_fetch_array($categorySelect)) : ?>
                        <?php if($product_data->category_id == $r['category_id']) :?>
                        <option value="<?= $r['category_id']; ?>" selected><?= $r['category_name'];?></option>
                        <?php else : ?>
                        <option value="<?= $r['category_id']; ?>"><?= $r['category_name'];?></option>
                        <?php endif ?>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>

            <!-- Product name | name = product-name -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="product-name" class="text-2xl text-white mr-4">Product name</label>
                </td>
                <td class="pt-4">
                    <input type="text" id="product-name" name="product-name" value="<?php if(isset($_GET['idc'])) {
                        echo $product_data->product_name;
                    }
                    ?>" placeholder="product name"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom">
                </td>
            </tr>

            <!-- Product price | name = price -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="price" class="text-2xl text-white mr-4">Price</label>
                </td>
                <td class="pt-4">
                    <input type="text" id="price" name="price" placeholder="25.xx $" value="<?php if(isset($_GET['idc'])) {
                        echo $product_data->product_price;
                    }
                    ?>"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom">
                </td>
            </tr>

            <!-- Description | name = description -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="description" class="text-2xl text-white mr-4">Description</label>
                </td>
                <td class="pt-4">
                    <textarea name="description" id="description" cols="40" rows="3" value=""
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom"
                        placeholder="description" id="price" name="price"><?php if(isset($_GET['idc'])) {
                        echo $product_data->product_description;
                        }?></textarea>

                </td>
            </tr>

            <!-- Image | name = image -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="image" class="text-2xl text-white mr-4">Image</label>
                </td>
                <td class="pt-4">
                    <img src="../image/product-img/<?= $product_data->product_image; ?>" alt="">
                    <input type="file" id="image" name="image"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom">
                </td>
            </tr>

            <!-- Status | name = status -->
            <tr>
                <td class="text-right">
                    <label for="status" class="text-2xl text-white mr-4">Status</label>
                </td>
                <td>
                    <select type="text" id="status" name="status"
                        class="border-none rounded-md focus:outline-none text-2xl px-2 py-1 mt-2 text-white bg-slate-800 bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-left-bottom"
                        required>
                        <option value="" disabled selected>choose</option>
                        <?php if($product_data->product_status == 1) : ?>
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                        <?php else : ?>
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="mt-4 relative p-4 z-10">
            <input type="submit" name="confirm-save-product" value="Save"
                class="confirm-save text-xl rounded-lg text-white px-2 py-0.5 bg-green-400 font-semibold ml-2 shadow-btn shadow-green-500  active:shadow-none transition-all absolute right-0 -top-0.5 active:top-1 cursor-pointer">

        </div>
    </div>
    <script src="js/editPopUp.js"></script>
</form>
<?php
    if(isset($_POST['confirm-save-product'])) {

        $new_category = $_POST['category-name'];
        $new_name = $_POST['product-name'];
        $new_price = $_POST['price'];
        $new_description = $_POST['description'];
        $new_status = $_POST['status'];

        if(!($_FILES['image']['error'] > 0)) {
            unlink('../image/product-img/'.$product_data->product_image);
            $filename = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $arrayFormat = explode('.', $filename);
            $imageDataType = $arrayFormat[1];
            
            $new_file_name = 'product'.time().'.'.$imageDataType;

            $allowed_type = ['jpg', 'jpeg', 'png', 'gif'];

            if(!in_array($imageDataType, $allowed_type)) {
                echo 'not allowed type of file';
            } else {
                move_uploaded_file($tmp_name, '../image/product-img/'. $new_file_name);

                $update = mysqli_query($conn, "UPDATE product SET
                    category_id = '".$new_category."',
                    product_name = '".$new_name."',
                    product_price = '".$new_price."',
                    product_description = '".$new_description."',
                    product_image = '".$new_file_name."',
                    product_status = '".$new_status."'
                    WHERE product_id = '".$product_data->product_id."'");

                if($update) {
                    echo '<script>window.location="product.php"</script>';
                } else {
                    echo 'error when updating '.mysqli_error($conn);
                }
            }
        } else {
            $update = mysqli_query($conn, "UPDATE product SET
                category_id = '".$new_category."',
                product_name = '".$new_name."',
                product_price = '".$new_price."',
                product_description = '".$new_description."',
                product_status = '".$new_status."'
                WHERE product_id = '".$product_data->product_id."'");

            if($update) {
                echo '<script>window.location="product.php"</script>';
            } else {
                echo 'error when updating '.mysqli_error($conn);
            }
        }
        
        
        
    }
?>
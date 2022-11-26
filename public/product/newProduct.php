<form action="" method="post" enctype="multipart/form-data"
    class="new-item-form fixed top-0 left-0 w-screen h-screen bg-slate-600 bg-opacity-70 hidden">
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
                        <option value="<?= $r['category_id']; ?>"><?= $r['category_name'];?></option>
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
                    <input type="text" id="product-name" name="product-name" placeholder="product name"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom">
                </td>
            </tr>

            <!-- Product price | name = price -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="price" class="text-2xl text-white mr-4">Price</label>
                </td>
                <td class="pt-4">
                    <input type="text" id="price" name="price" placeholder="25.xx $"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom">
                </td>
            </tr>

            <!-- Description | name = description -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="description" class="text-2xl text-white mr-4">Description</label>
                </td>
                <td class="pt-4">
                    <textarea name="description" id="description" cols="40" rows="3"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom"
                        placeholder="description" id="price" name="price"></textarea>

                </td>
            </tr>

            <!-- Image | name = image -->
            <tr>
                <td class="pt-4 text-right">
                    <label for="image" class="text-2xl text-white mr-4">Image</label>
                </td>
                <td class="pt-4">
                    <input type="file" id="image" name="image"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom"
                        required>
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
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </td>
            </tr>
        </table>
        <div class="mt-4 relative p-4 z-10">
            <input type="submit" name="confirm-add-product" value="Add"
                class="confirm-add text-xl rounded-lg text-white px-2 py-0.5 bg-green-400 font-semibold ml-2 shadow-btn shadow-green-500  active:shadow-none transition-all absolute right-0 -translate-x-[5.5rem] -top-0.5 active:top-1 cursor-pointer">
            <a
                class="cancel-button text-xl rounded-lg text-white px-2 py-0.5 bg-red-500 font-semibold shadow-btn shadow-red-600  active:shadow-none transition-all absolute right-0 -top-0.5 active:top-1 cursor-pointer">Cancel</a>
        </div>
    </div>
    <script src="js/newItemPopUp.js"></script>
</form>
<?php
    if(isset($_POST['confirm-add-product'])) {

        $category = $_POST['category-name'];
        $name = $_POST['product-name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];


        $arrayFormat = explode('.', $filename);
        $imageDataType = $arrayFormat[1];

        $newname = 'product'.time().'.'.$imageDataType;

        $allowed_type = ['jpg', 'jpeg', 'png', 'gif'];

        if(!in_array($imageDataType, $allowed_type)) {
            echo 'not allowed type of file';
        } else {
            move_uploaded_file($tmp_name, 'image/product-img/'. $newname);

            $insert = mysqli_query($conn, "INSERT INTO product VALUES(
                null,
                '".$category."',
                '".$name."',
                '".$price."',
                '".$description."',
                '".$newname."',
                '".$status."',
                null
            )");

            if($insert) {
                echo '<script>window.location="product.php"</script>';
            } else {
                echo 'error when insert '.mysqli_error($conn);
            }
        }
        
    }
?>
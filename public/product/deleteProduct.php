<form action="" method="post"
    class="confirm-delete-form fixed top-0 left-0 w-screen h-screen bg-slate-600 bg-opacity-70 hidden">
    <div class="m-auto bg-slate-800 p-5 rounded-lg">
        <div class="">
            <h3 for="category-name" class="text-2xl font-semibold text-white">Confirm delete</h3>
        </div>
        <div class="mt-4 relative p-4 z-10">
            <input type="submit" name="confirm-delete-product" value="Yes"
                class="confirm-delete text-xl rounded-lg text-white px-2 py-0.5 bg-green-400 font-semibold ml-2 shadow-btn shadow-green-500  active:shadow-none transition-all absolute translate-x-[80%] -top-0.5 active:top-1 cursor-pointer">
            <a
                class="no-button text-xl rounded-lg text-white px-2 py-0.5 bg-red-500 font-semibold shadow-btn shadow-red-600  active:shadow-none transition-all absolute right-0 -top-0.5 active:top-1 cursor-pointer">No</a>
        </div>
    </div>
</form>
<script src="js/deletePopUp.js"></script>
<?php
    if(isset($_POST['confirm-delete-product'])) {

        unlink('image/product-img/'.$product_data->product_image);
        $delete = mysqli_query($conn, "DELETE FROM product WHERE product_id = '". $_GET['idc'] ."'");
        
        if($delete) {
            echo '<script>window.location="product.php"</script>';
        } else {
            echo '<script>alert("Error when trying to delete Product")</script>';
        }
    }
?>
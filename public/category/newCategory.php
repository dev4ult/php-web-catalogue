<form action="" method="post"
    class="new-item-form fixed top-0 left-0 w-screen h-screen bg-slate-600 bg-opacity-70 hidden">
    <div class="m-auto bg-slate-800 p-5 rounded-lg">
        <div class="flex flex-col">
            <label for="category-name" class="text-2xl text-white">Category Name</label>
            <input type="text" id="category-name" name="category-name"
                class="border-none rounded-md focus:outline-none text-xl px-2 py-1 mt-2 text-white bg-slate-800 bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-left-bottom"
                placeholder="category name" required>
        </div>
        <div class="mt-4 relative p-4 z-10">
            <input type="submit" name="confirm-add" value="Add"
                class="confirm-add text-xl rounded-lg text-white px-2 py-0.5 bg-green-400 font-semibold ml-2 shadow-btn shadow-green-500  active:shadow-none transition-all absolute translate-x-[150%] -top-0.5 active:top-1 cursor-pointer">
            <a
                class="cancel-button text-xl rounded-lg text-white px-2 py-0.5 bg-red-500 font-semibold shadow-btn shadow-red-600  active:shadow-none transition-all absolute right-0 -top-0.5 active:top-1 cursor-pointer">Cancel</a>
        </div>
    </div>
    <script src="js/newItemPopUp.js"></script>
</form>
<?php
    if(isset($_POST['confirm-add'])) {
        $category_name = $_POST['category-name'];

        $insert = mysqli_query($conn, "INSERT INTO category VALUES(null, '". $category_name ."')");

        if($insert) {
            echo '<script>window.location="category.php"</script>';
        } else {
            echo 'Error when insert '. mysqli_error($conn);
        }
    }
?>
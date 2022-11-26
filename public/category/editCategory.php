<form action="" method="post" class="edit-item fixed top-0 left-0 w-screen h-screen bg-slate-600 bg-opacity-70 hidden">
    <div class="m-auto bg-slate-800 p-5 rounded-lg">
        <div class="flex flex-col">
            <label for="category-name" class="text-2xl text-white">Category Name</label>
            <input type="text" id="category-name" name="category-name" value="<?php
                                    if(isset($_GET['idc'])) {
                                        echo $category_data->category_name; 
                                    }
                                 ?>"
                class="border-none rounded-md focus:outline-none text-xl px-2 py-1 mt-2 text-white bg-slate-800 bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-left-bottom"
                placeholder="new name" required>
        </div>
        <div class="mt-4 relative p-4 z-10">
            <input type="submit" name="confirm-save" value="Save"
                class="confirm-save text-xl rounded-lg text-white px-2 py-0.5 bg-green-400 font-semibold ml-2 shadow-btn shadow-green-500  active:shadow-none transition-all absolute right-0 -top-0.5 active:top-1 cursor-pointer">
        </div>
    </div>
</form>
<script src="js/editPopUp.js"></script>
<?php 
    if(isset($_POST['confirm-save'])) {
        $category_new_name = $_POST['category-name'];

        $update = mysqli_query($conn, "UPDATE category SET category_name = '". $category_new_name ."' WHERE category_id = '". $category_data->category_id ."'");
        
        if($update) {
            echo '<script>window.location="category.php"</script>';
        } else {
            echo '<script>alert("Error when trying to update category")</script>';
        }
    }
?>
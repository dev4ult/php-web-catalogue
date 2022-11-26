<?php
    session_start();
    include 'connect.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
    
    if(isset($_GET['idc'])) {
        $query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '". $_GET['idc']."'");
        $product_data = mysqli_fetch_object($query);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard <> Web Catalogue</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="font-archivo">
    <nav class="navbar">
        <div class="container flex justify-between px-5 py-2 items-center mx-auto">
            <div>
                <a href="index.php"
                    class="text-4xl font-bold bg-gradient-to-r from-black to-black bg-[length:0%_2.5px] hover:bg-[length:100%_2.5px] bg-left-bottom transition-all bg-no-repeat">Skate.</a>
            </div>
            <ul class="flex">
                <li><a href="profile.php"
                        class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Profile</a>
                </li>
                <li><a href="category.php"
                        class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Category</a>
                </li>
                <li><a href="product.php"
                        class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg bg-slate-200">Product</a>
                </li>
                <li><a href="logout.php"
                        class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Log
                        out</a></li>
            </ul>
        </div>
        <hr class="bg-black h-0.5 container mx-auto">
    </nav>
    <main>
        <div class="container mx-auto px-5 py-6">
            <div>
                <h2 class="text-5xl font-semibold">Category</h2>
            </div>
            <div class="mt-6 relative pb-9">
                <a
                    class="add-item-button text-xl rounded-xl bg-slate-200 px-3 py-1 font-semibold shadow-btn text-slate-500 shadow-slate-500  active:shadow-none transition-all absolute -top-0.5 active:top-1 cursor-pointer hover:text-teal-500 hover:shadow-teal-500">
                    New
                    product <span class="text-2xl">+</span></a>
            </div>
            <div class="flex">
                <table class="mt-6">
                    <thead>
                        <tr>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">No</th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Category
                            </th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Product</th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Price</th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Description</th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Image</th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Status</th>
                            <th class="border-slate-700 border-t-2 border-b-2 text-2xl py-1 px-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $product = mysqli_query($conn, "SELECT * FROM product LEFT JOIN category USING (category_id) ORDER BY product_id");
                            if(mysqli_num_rows($product) > 0) :
                                while($row = mysqli_fetch_array($product)) :
                        ?>
                        <tr>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2"><?= $no++ ?></td>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                <?= $row['category_name'] ?></td>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                <?= $row['product_name'] ?></td>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                $<?= number_format($row['product_price']) ?></td>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                <?= $row['product_description'] ?></td>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                <img src="image/product-img/<?= $row['product_image'] ?>" alt="product image"
                                    class="w-20">
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                <?php 
                                if($row['product_status'] == 1) {
                                    echo 'Active';
                                } else {
                                    echo 'Inactive';
                                }
                                 ?></td>

                            </td>
                            <td class="border-slate-700 border-t-2 text-2xl py-1 px-2">
                                <div class="flex items-center justify-center">
                                    <a href="product.php?idc=<?= $row['product_id'];?>"
                                        class="gear-button cursor-pointer">
                                        <img src="image/logo/gear.svg" alt="Edit"
                                            class="w-5 hover:rotate-45 transition-all">
                                    </a> <span class="mx-3">|</span>
                                    <a href="product.php?idc=<?= $row['product_id'];?>"
                                        class="cross-button inline-block cursor-pointer">
                                        <img src="image/logo/cross.svg" alt="Delete" class="w-5">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile;
                            else : ?>
                        <tr>
                            <td colspan="8" class="text-2xl text-center">-- there is no product can be showed --</td>
                        </tr>
                        <?php 
                            endif; ?>
                    </tbody>
                </table>
                <?php include 'product/editProduct.php'; ?>
                <?php include 'product/deleteProduct.php'; ?>
                <?php include 'product/newProduct.php'; ?>
            </div>
        </div>
    </main>
</body>

</html>
<?php
include 'connect.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    .card {
        transform-style: preserve-3d;
    }

    .add-cart-button {
        transform: translate3d(0, -20%, 50%);
        opacity: 0;
    }

    .card:hover .add-cart-button {
        transform: translate3d(0, 0, 50%);
        opacity: 1;
    }
    </style>
</head>

<body class="font-archivo">
    <nav class="navbar">
        <div class="container flex justify-between px-5 py-2 items-center mx-auto">
            <div>
                <a href="index.php"
                    class="text-4xl font-bold bg-gradient-to-r from-black to-black bg-[length:0%_2.5px] hover:bg-[length:100%_2.5px] bg-left-bottom transition-all bg-no-repeat">Skate.</a>
            </div>
            <div>
                <form action="" method="post" class="flex">
                    <input type="text" name="search-value"
                        class="border-black border-2 px-2 py-1 rounded-full mr-2 focus:outline-none"
                        value="<?php
                                                                                                                                                if (isset($_GET['src'])) {
                                                                                                                                                    echo $_GET['src'];
                                                                                                                                                }
                                                                                                                                                ?>">
                    <button type="submit" name="search-submit">
                        <img src="image/logo/search.svg" alt="searh button">
                    </button>
                </form>
                <?php
                if (isset($_GET['idc'])) {
                    if (isset($_POST['search-submit'])) {
                        echo '<script>window.location="index.php?idc=' . $_GET['idc'] . '&src=' . $_POST['search-value'] . '"</script>';
                    }
                } else {
                    if (isset($_POST['search-submit'])) {
                        echo '<script>window.location="index.php?src=' . $_POST['search-value'] . '"</script>';
                    }
                }
                ?>
            </div>
            <div>
                <ul class="flex">
                    <?php
                    if (isset($_SESSION['status_login']) && $_SESSION['status_login'] == true) : ?>
                    <li><a href="profile.php"
                            class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Profile</a>
                    </li>
                    <li><a href="category.php"
                            class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Category</a>
                    </li>
                    <li><a href="product.php"
                            class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Product</a>
                    </li>
                    <li><a href="logout.php"
                            class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Log
                            out</a></li>
                    <?php else : ?>
                    <li><a href="login.php"
                            class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <hr class="bg-black h-0.5 container mx-auto">
    </nav>
    <main class="mt-4 pb-4">
        <section class="container mx-auto">
            <h2 class="text-2xl font-semibold mb-2">Category</h2>
            <div class="flex flex-wrap gap-2">
                <div>
                    <?php
                    if (isset($_GET['idc'])) :
                    ?>
                    <a href="index.php"
                        class="inline-block  text-xl py-0.5 px-3 border-2 border-black  font-semibold cursor-pointer overflow-hidden bg-gradient-to-r from-black to-black bg-no-repeat bg-[length:0%_100%] bg-left hover:bg-[length:100%_100%] hover:text-white transition-all duration-300">ALL</a>
                    <?php else : ?>
                    <a href="index.php"
                        class="inline-block  text-xl py-0.5 px-3 border-2 border-black  font-semibold cursor-pointer overflow-hidden bg-gradient-to-r from-black to-black bg-no-repeat bg-[length:100%_100%] bg-left hover:bg-[length:100%_100%] text-white transition-all duration-300">ALL</a>
                    <?php endif; ?>
                </div>
                <?php
                $category = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id");
                if (mysqli_num_rows($category) > 0) :
                    while ($k = mysqli_fetch_array($category)) : ?>
                <div>
                    <?php
                            if (isset($_GET['idc']) && $k['category_id'] == $_GET['idc']) :
                            ?>
                    <a href="index.php?idc=<?php
                                                        if (isset($_GET['src'])) {
                                                            echo $k['category_id'] . '&src=' . $_GET['src'];
                                                        } else {
                                                            echo $k['category_id'];
                                                        }
                                                        ?>"
                        class="inline-block text-xl py-0.5 px-3 border-2 border-black  font-semibold cursor-pointer overflow-hidden bg-gradient-to-r from-black to-black bg-no-repeat bg-[length:100%_100%] bg-left hover:bg-[length:100%_100%] text-white transition-all duration-300"><?= $k['category_name'] ?></a>
                    <?php else : ?>
                    <a href="index.php?idc=<?php
                                                        if (isset($_GET['src'])) {
                                                            echo $k['category_id'] . '&src=' . $_GET['src'];
                                                        } else {
                                                            echo $k['category_id'];
                                                        }
                                                        ?>"
                        class="inline-block text-xl py-0.5 px-3 border-2 border-black  font-semibold cursor-pointer overflow-hidden bg-gradient-to-r from-black to-black bg-no-repeat bg-[length:0%_100%] bg-left hover:bg-[length:100%_100%] hover:text-white transition-all duration-300"><?= $k['category_name'] ?></a>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <h2 class="text-xl">
                    no category can be showed
                </h2>
                <?php endif; ?>
            </div>
        </section>
        <section class="container mx-auto mt-10">
            <h2 class="text-2xl font-semibold mb-2">Product</h2>
            <div class="flex gap-3 flex-wrap ">
                <?php
                if (!isset($_GET['src']) || $_GET['src'] == '') {
                    if (isset($_GET['idc'])) {
                        $product = mysqli_query($conn, "SELECT * FROM product WHERE category_id = '" . $_GET['idc'] . "' ORDER BY product_id");
                    } else {
                        $product = mysqli_query($conn, "SELECT * FROM product ORDER BY product_id");
                    }
                } else {
                    if (isset($_GET['idc'])) {
                        $product = mysqli_query($conn, "SELECT * FROM product WHERE category_id = '" . $_GET['idc'] . "' AND product_name LIKE '%" . $_GET['src'] . "%' ORDER BY product_id");
                    } else {
                        $product = mysqli_query($conn, "SELECT * FROM product WHERE product_name LIKE '%" . $_GET['src'] . "%' ORDER BY product_id");
                    }
                }
                if (mysqli_num_rows($product) > 0) :
                    while ($p = mysqli_fetch_array($product)) :
                ?>
                <div
                    class="card bg-white shadow-xl max-w-[235px] grow shrink-0 min-h-[320px] min-w-[235px] rounded-xl overflow-hidden group relative">
                    <img src="image/product-img/<?= $p['product_image']; ?>" alt=""
                        class=" max-w-full bg-cover w-60 h-60 object-cover">
                    <hr class="border none bg-black h-1 mt-2.5 w-1/2 mx-auto group-hover:w-4/5 transition-all">
                    <h2 class="ml-3 mt-1 font-semibold "><?= $p['product_name']; ?></h2>
                    <h2 class="text-right mr-3 font-bold ">$<?= $p['product_price']; ?></h2>
                    <a
                        class="add-cart-button bg-black rounded-lg absolute -bottom-7 left-2 px-2 cursor-pointer font-semibold text-white group-hover:bottom-2.5 transition-all duration-300">Buy
                        now</a>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <div class="">
                    <h2 class="text-xl">
                        no product can be showed
                    </h2>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <script src="js/vanilla-tilt.min.js"></script>
    <script>
    VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400
    });
    </script>
</body>

</html>
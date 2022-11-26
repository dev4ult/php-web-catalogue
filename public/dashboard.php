<?php
    session_start();
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                        class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg hover:bg-slate-200">Product</a>
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
                <h2 class="text-5xl">Welcome <span
                        class="font-semibold"><?= $_SESSION['a_global']->admin_name; ?></span></h2>
            </div>

        </div>
    </main>
</body>

</html>
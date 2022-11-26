<?php
    session_start();
    include 'connect.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '". $_SESSION['id']."'");
    $d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile <> Web Catalogue</title>
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
                        class="text-2xl font-semibold ml-10 py-1 px-3 rounded-lg bg-slate-200">Profile</a>
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
                <h2 class="text-5xl">Profile</h2>
            </div>
            <div class="flex mt-4">
                <form action="" method="post"
                    class="w-[45%] border-slate-800 border-solid border-2 rounded-xl p-5 mr-8">
                    <div class="mb-3">
                        <label for="full-name" class="flex gap-1.5">
                            <h2 class="text-2xl select-none">Full name | </h2>
                            <a class="gear-button flex items-center cursor-pointer">
                                <img src="image/logo/gear.svg" alt="gear"
                                    class="gear-logo w-5 hover:rotate-90 active:rotate-180 transition-all">
                            </a>
                        </label>
                        <input type="text" name="full-name" id="full-name"
                            class="main-profile text-xl py-0.5 px-1 text-slate-500 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:0%_2px] bg-no-repeat bg-left-bottom focus:bg-[length:100%_2px] transition-all duration-500 bg-white"
                            placeholder="full name" value="<?= $d->admin_name ?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="flex gap-1.5">
                            <h2 class="text-2xl select-none">Username | </h2>
                            <a class="gear-button flex items-center cursor-pointer">
                                <img src="image/logo/gear.svg" alt="gear"
                                    class="gear-logo w-5 hover:rotate-90 active:rotate-180 transition-all">
                            </a>
                        </label>
                        <input type="text" name="user" id="username"
                            class="main-profile text-xl py-0.5 px-1 text-slate-500 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:0%_2px] bg-no-repeat bg-left-bottom focus:bg-[length:100%_2px] transition-all duration-500 bg-white"
                            placeholder="username" value="<?= $d->username ?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="phone-number" class="flex gap-1.5">
                            <h2 class="text-2xl select-none">Phone number | </h2>
                            <a class="gear-button flex items-center cursor-pointer">
                                <img src="image/logo/gear.svg" alt="gear"
                                    class="gear-logo w-5 hover:rotate-90 active:rotate-180 transition-all">
                            </a>
                        </label>
                        <input type="text" name="phone-number" id="phone-number"
                            class="main-profile text-xl py-0.5 px-1 text-slate-500 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:0%_2px] bg-no-repeat bg-left-bottom focus:bg-[length:100%_2px] transition-all duration-500 bg-white"
                            placeholder="phone number" value="<?= $d->admin_phone_num ?>" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="flex gap-1.5">
                            <h2 class="text-2xl select-none">Email | </h2>
                            <a class="gear-button flex items-center cursor-pointer">
                                <img src="image/logo/gear.svg" alt="gear"
                                    class="gear-logo w-5 hover:rotate-90 active:rotate-180 transition-all">
                            </a>
                        </label>
                        <input type="email" name="email" id="email"
                            class="main-profile text-xl py-0.5 px-1 text-slate-500 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:0%_2px] bg-no-repeat bg-left-bottom focus:bg-[length:100%_2px] transition-all duration-500 bg-white"
                            placeholder="email" value="<?= $d->admin_email ?>" required disabled>
                    </div>
                    <div class="mb-5">
                        <label for="address" class="flex gap-1.5">
                            <h2 class="text-2xl select-none">Address | </h2>
                            <a class="gear-button flex items-center cursor-pointer">
                                <img src="image/logo/gear.svg" alt="gear"
                                    class="gear-logo w-5 hover:rotate-90 active:rotate-180 transition-all">
                            </a>
                        </label>
                        <input type="text" name="address" id="address"
                            class="main-profile text-xl py-0.5 px-1 text-slate-500 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:0%_2px] bg-no-repeat bg-left-bottom focus:bg-[length:100%_2px] transition-all duration-500 bg-white"
                            placeholder="home address" value="<?= $d->admin_address ?>" required disabled>
                    </div>
                    <div class="relative">
                        <input type="submit" name="submit" value="Save changes"
                            class="save-change text-xl bg-slate-200 py-1 px-3 rounded-xl font-semibold shadow-btn text-slate-500 shadow-slate-500  active:shadow-none transition-all absolute -top-0.5 active:top-1 cursor-pointer hover:text-teal-500 hover:shadow-teal-500">
                    </div>
                </form>
                <script>
                const gearButton = document.querySelectorAll('.gear-button');
                const mainProfile = document.querySelectorAll('.main-profile');

                for (let i = 0; i < gearButton.length; i++) {
                    gearButton[i].addEventListener('click', _ => {
                        mainProfile[i].disabled = false;
                    })
                }

                const saveChanges = document.querySelector('.save-change');
                saveChanges.addEventListener('click', _ => {
                    mainProfile.forEach(input => {
                        input.disabled = false;
                    })
                })
                </script>
                <?php 
                    if(isset($_POST['submit'])) {
                        $name = ucwords($_POST['full-name']);
                        $user = $_POST['user'];
                        $phone_num = $_POST['phone-number'];
                        $email = $_POST['email'];
                        $address = ucwords($_POST['address']);
    
                        $update = mysqli_query($conn, "UPDATE admin SET 
                        admin_name = '" . $name . "' ,
                        username = '" . $user . "' , 
                        admin_phone_num = '" . $phone_num . "' ,
                        admin_email = '" . $email . "' ,
                        admin_address = '" . $address . "' 
                        WHERE admin_id = '" . $d->admin_id . "' ");
    
                        if($update) {
                            echo '<script>alert("data has been set")</script>';
                            echo '<script>window.location="profile.php"</script>';
                        } else {
                            echo '<script>alert("error")</script>';
                        }
                    }
                ?>
                <form action="" method="post"
                    class="p-5 w-[45%] border-slate-800 border-solid border-2 rounded-xl grow-0 shrink h-fit">
                    <div class="mb-3">
                        <label for="oldpass" class="flex gap-1.5">
                            <h2 class="text-2xl">Old password</h2>
                        </label>
                        <input type="password" name="oldpass" id="oldpass"
                            class="text-xl py-0.5 px-1 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:100%_2px] bg-no-repeat bg-bottom"
                            placeholder="old password" required>
                    </div>
                    <div class="mb-3">
                        <label for="newpass" class="flex gap-1.5">
                            <h2 class="text-2xl">New password</h2>
                        </label>
                        <input type="text" name="newpass" id="newpass"
                            class="text-xl py-0.5 px-1 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:100%_2px] bg-no-repeat bg-bottom"
                            placeholder="new password" required>
                    </div>
                    <div class="mb-7">
                        <label for="newpassconf" class="flex gap-1.5">
                            <h2 class="text-2xl">New password Confirmation</h2>
                        </label>
                        <input type="text" name="newpassconf" id="newspassconf"
                            class="text-xl py-0.5 px-1 focus:outline-none focus:text-slate-700 bg-gradient-to-r from-black to-black bg-[length:100%_2px] bg-no-repeat bg-bottom"
                            placeholder="new password confirmation" required>
                    </div>
                    <div class="relative">
                        <input type="submit" name="submit-new-pass" value="Change Password"
                            class=" bg-slate-200 text-xl py-1 px-3 rounded-xl font-semibold shadow-btn text-slate-500 shadow-slate-500  active:shadow-none transition-all absolute -top-0.5 active:top-1 cursor-pointer hover:text-teal-500 hover:shadow-teal-500">
                    </div>
                </form>

                <?php 
                    if(isset($_POST['submit-new-pass'])) {
                        $old_pass = $_POST['oldpass'];
                        $new_pass = $_POST['newpass'];
                        $new_pass_conf = $_POST['newpassconf'];

                        if(MD5($old_pass) == $d->password) {
                            if($new_pass == $new_pass_conf) {
                                $u_pass = mysqli_query($conn, "UPDATE admin SET password = '" . MD5($new_pass) . "' WHERE admin_id = '" . $d->admin_id . "' ");
                                echo '<script>alert("Your password has been changed")</script>';
                            } else {
                                echo '<script>alert("Wrong password confirmation")</script>';
                            }                  
                        } else {
                            echo '<script>alert("Wrong old password")</script>';
                        }
                        
                    }
                ?>
            </div>

        </div>
    </main>
</body>

</html>
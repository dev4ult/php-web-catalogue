<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login <> Catalogue Web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel=" stylesheet" type="text/css" href="css/style.css">
</head>

<body class="flex items-center h-screen bg-slate-600 bg-opacity-60 font-archivo">
    <form action="" method="post" class="bg-slate-800 w-fit mx-auto px-5 py-3 self-center rounded-lg">
        <table>
            <tr>
                <td class="px-3 py-1">
                    <label for="user" class="text-2xl font-semibold text-white">Username</label>
                </td>
                <td class="px-3 py-1">
                    <input type="text" id="user" name="user" placeholder="username"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom w-52">
                </td>
            </tr>
            <tr>
                <td class="px-3 py-1">
                    <label for="pass" class="text-2xl text-white font-semibold">Passsword</label>
                </td>
                <td class="px-3 py-1">
                    <input type="password" id="pass" name="pass" placeholder="password"
                        class="text-2xl p-1 bg-slate-800 text-white focus:outline-none bg-gradient-to-r from-white to-white bg-[length:100%_2px] bg-no-repeat bg-bottom w-52">
                </td>
            </tr>
            <tr>
                <td colspan="2" class=" text-center pt-7 relative h-14">
                    <input type="submit" name="submit" value="Login"
                        class=" bg-green-400 w-fit text-2xl rounded-lg text-white px-2 py-0.5  font-semibold ml-2 shadow-btn shadow-green-500  active:shadow-none transition-all absolute left-1/2 -translate-x-1/2 top-2.5 active:top-4 cursor-pointer">
                </td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['submit'])) {
            session_start();
            include 'connect.php';
            
            $user = mysqli_escape_string($conn, $_POST['user']);
            $pass = mysqli_escape_string($conn, $_POST['pass']);

            $check = mysqli_query($conn, "SELECT * FROM admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");

            if(mysqli_num_rows($check) > 0) {
                $d = mysqli_fetch_object($check);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id;
                echo '<script>window.location="index.php"</script>';
            } else {
                echo '<script>alert("username atau password salah")</script>';
            }

        }
        ?>

</body>

</html>
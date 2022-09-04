<?php 
include "config.php";

if(isset($_POST['btnSubmit'])) {
    $username = mysqli_real_escape_string($con, $_POST['txtUsername']);
    $password = mysqli_real_escape_string($con, $_POST['txtPassword']);

    if($username != "" && $password != "") {
        $sql_query = "SELECT COUNT(*) AS countUsers FROM users WHERE username='".$username."' and password='".$password."'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['countUsers'];

        if($count > 0) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
        }
        else {
            echo '<div class="bg-red-100">
            <h1 class="text-red-500 p-3">Autenticação falhou!</h1>
            </div>';
        }
    }
    else {
        echo '<div class="bg-red-100">
            <h1 class="text-red-500 p-3">Preencha os campos!</h1>
            </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Test Login</title>
</head>
<body>
    <div class="flex bg-gray-500 p-3 mt-5 max-w-4xl justify-center mx-auto rounded-md">
        <form method="post" class="w-full m-0">
            <div class="bg-gray-200 p-3 flex flex-col space-y-5 rounded-md">
                <h1 class="text-2xl font-bold">Login</h1>
                <input type="text" class="w-full p-2" name="txtUsername" placeholder="Username" />
                <input type="password" class="w-full p-2" name="txtPassword" placeholder="Password"/>
                <div class="flex justify-end">
                    <input type="submit" class="bg-green-400 text-white p-3 rounded-md cursor-pointer hover:bg-green-500" value="Login" name="btnSubmit" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>
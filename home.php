<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['btnLogout'])){
    session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>
      <title>Logged Successfully</title>
    </head>
    <body>
        <div class="flex flex-col items-center mt-5 space-y-2">
        <h1 class="text-2xl font-bold">Logged User:</h1>
        <h2 class="text-xl font-medium"><?php echo $_SESSION['username'] ?></h2>
        <form method="post">
            <input type="submit" value="Logout" name="btnLogout" class="bg-red-500 text-white cursor-pointer p-3 mt-3 rounded-md hover:bg-red-600">
        </form>
        </div>
    </body>
</html>
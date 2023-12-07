<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDINO</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>

<body>
    <div class="flex justify-center place items-center">
        <div class="relative my-28">
            <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-[#219C90]"></div>
            <div id="form-container" class="bg-white p-16 rounded-lg shadow-2xl w-80 relative z-10 
            transform transition duration-500 ease-in-out">
                <h2 id="form-title" class="text-center text-3xl font-bold mb-10 text-gray-800">Login</h2>
                <form class="space-y-5" action="login.php" method="POST">
                    <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Username " id="" name="username" type="text">
                    <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Password" id="" name="password" type="password">
                    <button class="w-full h-12 bg-[#E9B824] hover:bg-blue-900 text-white font-bold py-2 px-4 
                    rounded focus:outline-none focus:shadow-outline" type="submit" name="login">Sign in</button>
                    <a class="text-blue-500 hover:text-blue-800 text-sm" href="#">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
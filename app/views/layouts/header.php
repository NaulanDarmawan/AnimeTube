<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title><?= $data['judul']; ?></title>
    <style>
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body class="bg-gradient-to-r from-teal-400 to-yellow-200 p-3 mt-[100px]">
<div class="fixed top-0 left-0 right-0 h-[100px] glassmorphism flex items-center p-3 justify-between z-50">
        <div class="flex items-center space-x-4">
            <a href="<?= BASEURL; ?>/user/detail">
                <div class="w-[50px] h-[50px] bg-sky-500 rounded-full">
                    <img src="<?= BASEURL; ?>/assets/images/<?= $_SESSION['user']['image']; ?>" alt="Profile" class="w-full h-full object-cover object-center rounded-full">
                </div>
            </a>
            <span class="text-black text-lg hidden md:block"><?= $_SESSION['user']['nama']; ?></span>
        </div>
        <h1 class="text-4xl text-black font-bold absolute left-1/2 transform -translate-x-1/2">AnimeTube</h1>
        <a href="<?= BASEURL; ?>/user/logout">
            <div class="px-4 py-2 bg-red-500 rounded-lg">
                <h1 class="text-[16px] text-white bold">LOG OUT</h1>
            </div>
        </a>
    </div>
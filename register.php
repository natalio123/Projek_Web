<?php
require_once("./config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ancol Sign-Up</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="image/img.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/flex.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/justify.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/align.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/background.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/margin.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/padding.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/layout.css"?>">
    <link rel="stylesheet" href="<?= "$PROJECT_URL/utils/css/text.css"?>">
    <?php
    // Tampilkan alert jika terjadi error
    if (isset($_SESSION['error']) && $_SESSION['error']) {
        echo "<script>alert('Password Master Salah!');</script>";
        unset($_SESSION['error']); // Hapus nilai session error
    }
    ?>
</head>
<body class="flex flex-grow-1 m-0">
    <!-- Main sectiom -->
    <main 
        class="flex flex-col align-items-center justify-content-center flex-grow-1">
        
        <!-- Box -->
        <div class="flex flex-col border-2px border-solid bg-[#ecf0f1] py-4 px-5">
            <!-- Title -->
            <div class="flex justify-content-center">
                <h2 class="font-weight-800 color-[#34495e]">Sign-Up</h2>
            </div>

            <!-- Form -->
            <div class="flex flex-col">
                <form action="#" class="flex flex-col row-gap-0.5">
                    <!-- Full name -->
                    <div>
                        <input class="p-0.5" type="text" name="username" id="username" placeholder="username">
                    </div>
    
                    <!-- Email -->
                    <div>
                        <input 
                            class="p-0.5" 
                            type="email" 
                            name="email" 
                            id="email" 
                            placeholder="email"
                            required    
                        >
                    </div>
    
                    <!-- Password -->
                    <div>
                        <input 
                            class="p-0.5" 
                            type="password" 
                            name="password" 
                            id="password" 
                            placeholder="password"
                            required
                        >
                    </div>
                    
                    <!-- User type selection -->
                    <div class="flex flex-row flex-grow-1" id="user_field">
                        <select class="flex flex-grow-1 p-0.5" id="user" name="loguser" placeholder="Your User" onchange="showVerification()" required>
                            <option value="pelanggan">Pelanggan</option>
                            <option value="pelayan">Pelayan</option>
                            <option value="manajer">Manajer</option>
                        </select>
                    </div>

                    <!-- Security question -->
                    <div>
                        <input 
                            class="p-0.5" 
                            type="text" 
                            name="security-question" 
                            id="security-question" 
                            placeholder="security"
                            required
                        >
                    </div>
    
                    <!-- Submit -->
                    <div class="flex">
                        <button 
                            class="flex flex-grow-1 justify-content-center p-0.5 color-[#102770] bg-[#fce8a6] uppercase" 
                            type="submit">Sign-Up</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</body>
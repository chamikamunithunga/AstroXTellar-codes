<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroXteller - Select Category</title>
    <style>
        body {
            background-image: url("../imgs/game1bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            overflow: hidden;
            font-family: Arial, sans-serif;
            color: white;
        }

        .glassy-box {
            width: 90%;
            max-width: 700px;
            height: 450px;
            padding: 20px;
            background: #ffffff1a;
            border-radius: 15px;
            box-shadow: 0 4px 10px #ffffff33;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 2px solid #ffffff4d;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .glassy-box h2 {
            font-size: 32px;
            margin-bottom: 30px;
        }

        .category-options {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .category-item {
            cursor: pointer;
            transition: transform 0.3s ease;
            text-align: center;
        }

        .category-item:hover {
            transform: scale(1.1);
        }

        .category-item img {
            width: 220px;
            height: 220px;
            margin-bottom: 10px;
            
        }

        .category-item p {
            font-size: 20px;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="glassy-box">
        <h2>Choose Game Category</h2>
        <div class="category-options">
            <div class="category-item" onclick="startGame('easy')">
                <img src="../imgs/easy.png" alt="Easy">
                <p>Easy - Nebula Explorer</p>
            </div>
            <div class="category-item" onclick="startGame('medium')">
                <img src="../imgs/medium.png" alt="Medium">
                <p>Medium - Orbital Challenger</p>
            </div>
            <div class="category-item" onclick="startGame('hard')">
                <img src="../imgs/hard.png" alt="Hard">
                <p>Hard - Deep Space Navigator</p>
            </div>
        </div>
    </div>

    <script>
        function startGame(category) {
            // Redirect to the game page with the selected category
            window.location.href = "../Frontend/gamepage.php?category=" + category;
        }
    </script>
</body>
</html>

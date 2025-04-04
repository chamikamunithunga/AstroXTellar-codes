<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroXteller</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url("../imgs/gamebg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        /* Book container styles */
        .book-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 1200px;
            height: 600px;
            perspective: 1500px;
            margin-top: 50px;
        }

        .book {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 1s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .page {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: #ffffff1a;
            border-radius: 15px;
            box-shadow: 0 4px 10px #ffffff33;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 2px solid #ffffff4d;
            text-align: center;
            color: white;
            padding: 50px;
            transform-origin: left center;
            transition: transform 1s cubic-bezier(0.645, 0.045, 0.355, 1);
            backface-visibility: hidden;
            display: none;
        }

        .page.active {
            display: block;
            transform: rotateY(0deg);
            z-index: 1;
        }

        .page.flipped {
            transform: rotateY(-180deg);
            z-index: 0;
        }

        .page.next {
            display: block;
            transform: rotateY(0deg);
            z-index: 0;
        }

        .page-content {
            width: 100%;
            height: 100%;
            overflow-y: auto;
            padding-right: 10px;
        }

        .page-content::-webkit-scrollbar {
            width: 5px;
        }

        .page-content::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
        }

        .navigation-buttons {
            position: absolute;
            bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .nav-button {
            padding: 12px 25px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg, #ff0000, #6400e6);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .nav-button:hover {
            background: linear-gradient(45deg, #6400e6, #ff0000);
            transform: scale(1.1);
        }

        .nav-button.prev {
            visibility: hidden;
        }

        .page-indicator {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 14px;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 15px;
            border-radius: 15px;
        }

        /* Retaining your original styles with some modifications */
        h2 {
            font-size: 32px;
            margin-bottom: 10px;
            font-family: 'Irish Grover', cursive;
            background: linear-gradient(45deg, #ff0000, #6400e6);
            border-radius: 50%;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
        }
        
        ul {
            text-align: left;
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.5;
        }
        
        h3 {
            font-size: 24px;
            margin-top: 20px;
            font-family: 'Irish Grover', cursive;
            background: linear-gradient(-20deg, #ff0000, #00ff22, #e6009d, #006de1);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientAnimation 5s infinite alternate;
        }

        h1 {
            font-size: 40px;
            margin-top: 20px;
            font-family: 'Irish Grover', cursive;
            background: linear-gradient(-20deg, #00ff22, #00ff22, #e17000, #4700e1);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientAnimation 5s infinite alternate;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(-20deg, #ff0000, #948000, #6400e6, #006de1);
            background-size: 300% 300%;
            animation: gradientAnimation 10s ease infinite;
            padding: 10px 30px;
            position: sticky;
            top: 0;
            z-index: 2;
            border-bottom: 3px solid rgba(0, 0, 0, 0); 
            
        }

        @keyframes gradientAnimation {
            0% { background-position: 20% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .navbar h1 {
            color: #ffffff;
            font-size: 40px;
            font-family: 'Irish Grover', cursive;
        }

        .nav-links {
           display: flex;
           list-style: none;
           gap: 20px;
        }

        .nav-links li {
            padding: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .nav-links a:hover {
            color: #00ccff;
        }
        /* Page animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">
            <h1>AstroXtellar</h1>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="../Frontend/explore.php">Explore</a></li>
            <li><a href="../Frontend/about.php">About Us</a></li>
            <li><a href="../Frontend/profile.php">profile</a></li>
        </ul>
    </div>

    <div class="book-container">
        <div class="book">
            <!-- Page 1 -->
            <div class="page active" id="page1">
                <div class="page-content">
                    <h2>Welcome to AstroXtellar</h2>
                    <p>Embark on an interstellar adventure and test your cosmic knowledge across three thrilling difficulty levels! Each level offers a unique challenge, with increasing complexity and special math-based hurdles. Choose wisely and conquer the galaxy!</p>
                    <h1>Game Overview</h1>
                    <h3>Game Modes</h3>
                    
                    <div class="game-modes">
                        <div class="mode-box">
                            <h4>Easy - Nebula Explorer</h4>
                            <p>Perfect for beginners, explore basic astronomical concepts and enjoy a gentle cosmic journey.</p>
                            <br>
                            <p>15 questions , No time limit </p>
                            
                        </div>
                        
                        <div class="mode-box">
                            <h4>Medium - Orbital Challenger</h4>
                            <p>Perfect for A test of both knowledge and problem-solving skills</p>
                            <br>
                            <p> 20 questions , After the first 12 questions face the Final Galactic Gate math challenge. Success unlocks the SpaceSteller Badge.</p>
                        </div>
                        
                        <div class="mode-box">
                            <h4>Hard - Deep Space Navigator</h4>
                            <p>For astronomy experts. Failed math challenges result in point deductions. Can you maintain your cosmic score?</p>
                            <br>
                            <p> 30 questions , After the first 10th,19th questions and face the Final Galactic Gate math challenge. Success unlocks the ThunderStrox and ISS Pro Badges.</p>
                        </div>
                    </div>
                    
                    <style>
                        .game-modes {
                            display: flex;
                            justify-content: space-between;
                            margin-top: 30px;
                            gap: 20px;
                        }
                        
                        .mode-box {
                            flex: 1;
                            background: rgba(0, 0, 0, 0.3);
                            border: 2px solid rgba(255, 255, 255, 0.2);
                            border-radius: 10px;
                            padding: 20px;
                            transition: transform 0.3s, box-shadow 0.3s;
                        }
                        
                        .mode-box:hover {
                            transform: translateY(-10px);
                            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
                            border-color: rgba(255, 255, 255, 0.5);
                        }
                        
                        .mode-box h4 {
                            font-family: 'Irish Grover', cursive;
                            font-size: 20px;
                            margin-bottom: 15px;
                            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        }
                        
                        .mode-box p {
                            font-size: 16px;
                            text-align: left;
                        }
                    </style>
                </div>
                <div class="navigation-buttons">
                    <button class="nav-button prev" onclick="prevPage()">← Previous</button>
                    <button class="nav-button next" onclick="nextPage()">Next →</button>
                </div>
            </div>

            <!-- Page 2 -->
            <div class="page" id="page2">
                <div class="page-content">
                    <h2>Game Rules</h2>
                    <br>
                   
                    <h3>Prepare for an epic space adventure where your knowledge and problem-solving skills determine your fate among the stars! Answer wisely, earn points, and overcome cosmic challenges to become the ultimate AstroXtellar Champion!</h4>
                    <ul style="list-style-type: none;">
                             <li>• Every question matters – each correct answer brings you closer to victory.</li>
                             <li>• No penalties for wrong answers in general questions—you can continue playing.</li>
                             <li>• Some questions will be Bonus Math Challenges that are compulsory to attempt.</li>
                              <li>• If you answer a Bonus Math Challenge incorrectly, you can still continue but won’t receive bonus points.</li>
                             <li>• Reach the end with the highest points possible and become a true AstroXtellar Champion!</li>
                   </ul>

                    <h1>Are you ready to explore the cosmic mysteries?</h1>
                </div>
                <div class="navigation-buttons">
                    <button class="nav-button prev" onclick="prevPage()">← Previous</button>
                    <button class="nav-button next" onclick="nextPage()">Next →</button>
                </div>
            </div>

            <!-- Page 3 -->
            <div class="page" id="page3">
                <div class="page-content">
                    <h2>🚀 Winning & Strategy</h2>
                    <p>As a daring cosmic explorer, you've been chosen to navigate through the AstroXtellar challenges.</p>
                    <h3>Your equipment:</h3>
                    <ul>
                        <li>The more correct answers, the higher your rank.</li>
                        <li>To maximize your score, attempt Bonus Math Challenges carefully.</li>
                        <li>Even if you don’t answer everything correctly, you can still complete your journey!</li>
                        <li>Determination to reach the stars!</li>
                    </ul>
                    <h3>Are you ready to embark on the ultimate cosmic challenge? ✨</h3>
                </div>
                <div class="navigation-buttons">
                    <button class="nav-button prev" onclick="prevPage()">← Previous</button>
                    <button class="nav-button next" onclick="nextPage()">Next →</button>
                </div>
            </div>

            <!-- Page 4 - Final page -->
            <div class="page" id="page4">
                <div class="page-content">
                    <h2>Begin Your Cosmic Journey!</h2>
                    <p>All systems are go. The universe awaits your exploration!</p>
                    <h1>Launch when ready, space explorer!</h1>
                    <div style="margin-top: 5px;">
                        <img src="../imgs/rocket.png" alt="Rocket" style="width: 350px; animation: float 3s infinite alternate ease-in-out;">
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button class="nav-button prev" onclick="prevPage()">← Previous</button>
                    <button class="nav-button next" onclick="goToGame()">Start Game!</button>
                </div>
            </div>
        </div>
        <div class="page-indicator">Page <span id="currentPage">1</span> of 4</div>
    </div>

    <script>
        let currentPageIndex = 1;
        const totalPages = 4;
        
        function updatePageIndicator() {
            document.getElementById('currentPage').textContent = currentPageIndex;
        }
        
        function nextPage() {
            if (currentPageIndex < totalPages) {
                const currentPage = document.getElementById(`page${currentPageIndex}`);
                const nextPage = document.getElementById(`page${currentPageIndex + 1}`);
                
                // Start animation
                currentPage.classList.add('flipped');
                
                setTimeout(() => {
                    currentPage.classList.remove('active');
                    nextPage.classList.add('active', 'fade-in');
                    currentPageIndex++;
                    updatePageIndicator();
                    
                    // Show/hide prev button based on page
                    document.querySelectorAll('.nav-button.prev').forEach(btn => {
                        btn.style.visibility = currentPageIndex > 1 ? 'visible' : 'hidden';
                    });
                }, 500);
            }
        }
        
        function prevPage() {
            if (currentPageIndex > 1) {
                const currentPage = document.getElementById(`page${currentPageIndex}`);
                const prevPage = document.getElementById(`page${currentPageIndex - 1}`);
                
                currentPage.classList.remove('active', 'fade-in');
                prevPage.classList.remove('flipped');
                prevPage.classList.add('active');
                
                currentPageIndex--;
                updatePageIndicator();
                
                // Show/hide prev button based on page
                document.querySelectorAll('.nav-button.prev').forEach(btn => {
                    btn.style.visibility = currentPageIndex > 1 ? 'visible' : 'hidden';
                });
            }
        }
        
        function goToGame() {
            // Add a flip animation before redirecting
            const currentPage = document.getElementById(`page${currentPageIndex}`);
            currentPage.classList.add('flipped');
            
            setTimeout(() => {
                window.location.href = "../Frontend/video.php";
            }, 800);
        }
    </script>
</body>
</html>
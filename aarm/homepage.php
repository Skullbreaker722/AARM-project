<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apun ka website</title>
    <link rel="stylesheet" href="homepagestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Learning Style Button Container */
.learning-style-button-container {
    text-align: center; /* Center the button horizontally */
    margin-top: 30px; /* Add some space above the button */
}

/* Learning Style Button Styling */
.learning-style-btn {
    position: fixed;
    bottom :20px;
    right :20px;
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    padding: 15px 30px; /* Padding for the button */
    font-size: 16px; /* Font size */
    font-family: 'Poppins', sans-serif; /* Use the same font as the rest of the page */
    font-weight: 600;
    border: none; /* Remove default border */
    border-radius: 10px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    transition: all 0.3s ease; /* Smooth transition for hover effects */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

/* Hover Effect */
.learning-style-btn:hover {
    background-color: #45a049; /* Darker green on hover */
    transform: translateY(-2px); /* Slight lift effect */
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15); /* Larger shadow on hover */
}

/* Active Effect */
.learning-style-btn:active {
    transform: translateY(0); /* Reset lift effect when clicked */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Reset shadow when clicked */
}

.learning-style-btn i {
    margin-right: 10px; /* Add space between the icon and text */
}



</style>
</head>
<body>
    <div class="sidebar collapsed">
        <button class="collapse-btn" onclick="toggleSidebar()">☰</button>
        <ul>
            <li><a href="homepage.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
            <li><a href="#"><i class="fas fa-book"></i><span>Courses</span></a></li>
            <li><a href="#"><i class="fas fa-tasks"></i><span>To Do List</span></a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i><span>Planner</span></a></li>
            <li><a href="statisctics.html"><i class="fas fa-chart-line"></i><span>Statistics</span></a></li>
        </ul>
        
        <!-- Logout Button -->
        <div class="logout-container">
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> <span class="logout-text">Logout</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="welcome-text"><left>Welcome!</left></div>
        <div class="header">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="quote-section">
            <p id="quote">"The best way to predict the future is to create it."</p>
        </div>
    </div>
    <div class="learning-style-button-container">
        <button class="learning-style-btn">
            <a href="BetterQuiz.html"><i class="fas fa-lightbulb"></i> Know Your Learning Style</a>
        </button>
    </div>
    
    <script src="homepagescript.js"></script>
</body>
</html>

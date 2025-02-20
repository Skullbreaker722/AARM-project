<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $age = $row['age'];
    $phoneNumber = $row['phone_number'];
    $gender = $row['gender'];
    $password = $row['password']; // Assuming the password is stored in plain text or hashed
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="homepagestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
}



.main-content {
    margin-left: 400px; /* Adjust this value if your sidebar width changes */
    width: calc(100% - 250px); /* Ensure it takes up the remaining space */
    display: flex;
    justify-content: flex-start; /* Shift content to the left */
    align-items: center;
    min-height: 100vh;
    padding-left: 20px; /* Add some padding to the left */
}

.profile-section {
    width: 700px; /* Increase the width of the profile container */
    padding: 30px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    text-align: center;
    animation: fadeIn 0.8s ease-in-out;
    margin-left: 20px; /* Shift the container to the left */
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.avatar {
    width: 100px; /* Adjust the size as needed */
    height: 100px; /* Adjust the size as needed */
    border-radius: 50%; /* Makes the avatar circular */
    overflow: hidden; /* Ensures the image stays within the circular boundary */
    margin-left: 20px; /* Adds some space between the avatar and the profile info */
    float: right; /* Positions the avatar to the left */
}   

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the entire area without distortion */
}
.avatar:hover {
    transform: scale(1.1);
}

.profile-info {
    margin-top: 20px;
    text-align: left;
}

.profile-info h2 {
    font-size: 2em;
    color: #6a5acd;
    margin-bottom: 15px;
}

.profile-info p {
    font-size: 1.1em;
    margin-bottom: 15px;
    color: #444;
    transition: color 0.3s ease;
}

.profile-info p:hover {
    color: #6a5acd;
}

strong {
    color: #6a5acd;
}

/* Input Fields */
.input-field {
    width: 100%;
    padding: 12px 15px; /* Added padding for better spacing */
    margin-bottom: 15px;
    border: none;
    border-radius: 25px;  /* Curved edges */
    font-size: 1em;
    background: #f9f9f9;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    transition: all 0.3s ease-in-out;
    outline: none;
    color: #333;
}

/* Focus Effect */
.input-field:focus {
    background: #ffffff;
    box-shadow: 0 0 10px rgba(106, 90, 205, 0.5); /* Purple glow */
    outline: none;
    border: 2px solid #6a5acd;
}

/* Password Toggle */
.password-container {
    position: relative;
    margin-bottom: 15px; /* Added margin for spacing */
}

.password-container input {
    width: calc(100% - 40px); /* Adjust width to accommodate icon */
    padding: 12px 15px; /* Added padding for better spacing */
    border: none;
    border-radius: 25px; /* Curved edges */
    background: #f9f9f9;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    transition: all 0.3s ease-in-out;
    outline: none;
    color: #333;
}

.password-container input:focus {
    background: #ffffff;
    box-shadow: 0 0 10px rgba(106, 90, 205, 0.5); /* Purple glow */
    outline: none;
    border: 2px solid #6a5acd;
}

/* Icon Styles */
.password-container i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6a5acd;
    transition: color 0.3s ease;
}

.password-container i:hover {
    color: #534998;
}
.password-container i:hover {
    color: #534998;
}

/* Password Toggle */
.age-container {
    position: relative;
    margin-bottom: 15px; /* Added margin for spacing */
}

.age-container input {
    width: calc(100% - 40px); /* Adjust width to accommodate icon */
    padding: 12px 15px; /* Added padding for better spacing */
    border: none;
    border-radius: 25px; /* Curved edges */
    background: #f9f9f9;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    transition: all 0.3s ease-in-out;
    outline: none;
    color: #333;
}

.age-container input:focus {
    background: #ffffff;
    box-shadow: 0 0 10px rgba(106, 90, 205, 0.5); /* Purple glow */
    outline: none;
    border: 2px solid #6a5acd;
}

/* Icon Styles */
.age-container i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6a5acd;
    transition: color 0.3s ease;
}

.age-container i:hover {
    color: #534998;
}
.age-container i:hover {
    color: #534998;
}

/* Password Toggle */
.phone-container {
    position: relative;
    margin-bottom: 15px; /* Added margin for spacing */
}

.phone-container input {
    width: calc(100% - 40px); /* Adjust width to accommodate icon */
    padding: 12px 15px; /* Added padding for better spacing */
    border: none;
    border-radius: 25px; /* Curved edges */
    background: #f9f9f9;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    transition: all 0.3s ease-in-out;
    outline: none;
    color: #333;
}

.phone-container input:focus {
    background: #ffffff;
    box-shadow: 0 0 10px rgba(106, 90, 205, 0.5); /* Purple glow */
    outline: none;
    border: 2px solid #6a5acd;
}

/* Icon Styles */
.phone-container i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6a5acd;
    transition: color 0.3s ease;
}

.phone-container i:hover {
    color: #534998;
}
.phone-container i:hover {
    color: #534998;
}

/* Password Toggle */
.gender-container {
    position: relative;
    margin-bottom: 15px; /* Added margin for spacing */
}

.gender-container input {
    width: calc(100% - 40px); /* Adjust width to accommodate icon */
    padding: 12px 15px; /* Added padding for better spacing */
    border: none;
    border-radius: 25px; /* Curved edges */
    background: #f9f9f9;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    transition: all 0.3s ease-in-out;
    outline: none;
    color: #333;
}

.gender-container input:focus {
    background: #ffffff;
    box-shadow: 0 0 10px rgba(106, 90, 205, 0.5); /* Purple glow */
    outline: none;
    border: 2px solid #6a5acd;
}

/* Icon Styles */
.gender-container i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6a5acd;
    transition: color 0.3s ease;
}

.gender-container i:hover {
    color: #534998;
}
.gender     -container i:hover {
    color: #534998;
}

/* Update Button */
.update-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: linear-gradient(45deg, #6a5acd, #8360c3);
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 1.2em;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

.update-btn:hover {
    background: linear-gradient(45deg, #534998, #6a5acd);
    transform: scale(1.05);
}



/* Responsive Design */
@media screen and (max-width: 768px) {
    .sidebar {
        width: 70px;
    }
    
    .main-content {
        margin-left: 70px; /* Adjust for collapsed sidebar */
        width: calc(100% - 70px);
        padding-left: 10px;
    }

    .profile-section {
        width: 90%; /* Make the profile container take up 90% of the screen width */
        margin-left: 10px;
    }
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
        
        <div class="profile-section">
        <div class="avatar">
           <img src="avatar.jpeg" alt="User Avatar">
        </div>
            <div class="profile-info">
                <h2><left>User Profile</left></h2>
                <p><left><strong>First Name:</strong> <?php echo $firstName; ?></p>
                <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></left></p>
                <div class="password-container">
                    <strong>Password:</strong>
                    <input type="password" id="password" value="<?php echo $password; ?>" readonly>
                    <br><i class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
                </div>
                <div class="age-container">
                <strong>Age:</strong> 
                <input type="text" id="age" value="<?php echo $age; ?>">
                </div>
                <div class="phone-container">
                <strong>Phone Number:</strong> 
                <input type="text" id="phone_number" value="<?php echo $phoneNumber; ?>">
                </div>
                <div class="gender-container">
                <strong>Gender:</strong> 
                <input type="text" id="gender" value="<?php echo $gender; ?>">
                </div>
                <button class="update-btn" onclick="updateProfile()">Update Profile</button>
            </div>
        </div>
    </div>

    <script src="homepagescript.js"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.querySelector('.password-container i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        function updateProfile() {
            const age = document.getElementById('age').value;
            const phoneNumber = document.getElementById('phone_number').value;
            const gender = document.getElementById('gender').value;

            const formData = new FormData();
            formData.append('age', age);
            formData.append('phone_number', phoneNumber);
            formData.append('gender', gender);

            fetch('update_profile.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Profile updated successfully!');
                } else {
                    alert('Error updating profile: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
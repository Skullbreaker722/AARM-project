
<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signUp'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $phone_number = $_POST['phone_number'];


        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmail);
        
        if ($result->num_rows > 0) {
            echo "<script>
                    window.onload = function() {
                        showError(document.querySelector('.container'), 'Email Address Already Exists!');
                    }
                  </script>";
        } else {
            $insertQuery = "INSERT INTO users(firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
            if ($conn->query($insertQuery) === TRUE) {
                header("Location: index.php");
                exit();
            } else {
                echo "<script>
                        window.onload = function() {
                            showError(document.querySelector('.container'), 'Error: " . $conn->error . "');
                        }
                      </script>";
            }
        }
    }

    if (isset($_POST['signIn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];   
            header("Location: homepage.php");
            exit();
        } else {
            echo "<script>
                    window.onload = function() {
                        showError(document.querySelector('.container'), 'Incorrect Email or Password!');
                    }
                  </script>";
        }
    }
}
?>

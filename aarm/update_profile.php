<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

$email = $_SESSION['email'];
$age = $_POST['age'];
$phoneNumber = $_POST['phone_number'];
$gender = $_POST['gender'];

// Update the user's profile in the database
$sql = "UPDATE users SET age=?, phone_number=?, gender=? WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $age, $phoneNumber, $gender, $email);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error updating profile']);
}

$stmt->close();
$conn->close();
?>
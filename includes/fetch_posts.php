<?php

// Connect to the database (replace with your connection details)
require 'conexao.php';
// Get all posts (or filter based on user)
$sql = "SELECT * FROM posts ORDER BY created_at DESC"; // Order by latest
$stmt = $connection->prepare($sql);

// Execute the statement (no need for separate execution with PDO)
$stmt->execute();

// Loop through each post and generate HTML structure
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $username = $row['user_id']; // Replace with your username retrieval logic
    $postContent = $row['content'];
    $createdAt = $row['created_at'];

  // Generate HTML for each post (similar to your existing feed structure)
  echo "<div class='feed'>";
  echo "  <div class='head'>";
  echo "    <div class='user'>";
  echo "      <div class='profile-photo'>";
  echo "        <img src='./issets/images/profile-13.jpg'>"; // Replace with user profile image logic
  echo "      </div>";
  echo "      <div class='info'>";
  echo "        <h3>" . $username . "</h3>";
  echo "        <small>" . date('M j, Y h:i A', strtotime($createdAt)) . "</small>"; // Format timestamp
  echo "      </div>";
  echo "    </div>";
  echo "    <span class='edit'><i class='uil uil-ellipsis-h'></i></span>";
  echo "  </div>";

  echo "  <div class='photo'>"; // Add image if the post has one
  echo "    ";
  echo "  </div>";

  echo "  <div class='action-buttons'>";
  echo "    <div class='interaction-buttons'>";
  echo "      <span><i class='uil uil-heart'></i></span>";
  echo "      <span><i class='uil uil-comment-dots'></i></span>";
  echo "      <span><i class='uil uil-share";
}

?>
<?php
session_start();

// Check if user is logged in (optional, based on your logic)
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
  // Get user information (optional)
  $username = $_SESSION['username']; // Replace with your username retrieval logic

  // Get post content from the form
  $postContent = $_POST['postContent']; // Assuming the form input name is "postContent"

  // Store the post data (replace with your database connection logic)
  // This is a simplified example, consider using prepared statements to prevent SQL injection
  require 'conexao.php';
  $sql = "INSERT INTO posts(user_id, content) VALUES (:$username, :$postContent)";
  $stmt = $connection->prepare($sql);

  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":postContent", $postContent);

  // Execute the statement (no need for separate execution with PDO)
  $stmt->execute();

  // Success message (optional);
  echo "Post saved successfully!";
} else {
  // Error message (optional)
  echo "You are not logged in. Please login to post.";
}
?>

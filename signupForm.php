<?php

include "config.php";

$username = $password = $confirm_password = "";
$username_error = $password_error = $confirm_password_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty(trim($_POST["username"]))) {
  $username_error = "Please enter a valid username.";
} else {
  $sql = "SELECT id FROM users WHERE username = ?";
  if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = trim($_POST["username"]);
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        $username_error = "This username is already taken.";
      } else {
        $username = trim($_POST["username"]);
      }
    } else {
      echo "Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);
  }
}
if (empty(trim($_POST["password"]))) {
  $password_error = "Please enter a valid password.";
} elseif (strlen(trim($_POST["password"])) < 5) {
  $password_error = "Password must have at least 5 characters.";
} else {
  $password = trim($_POST["password"]);
}
if (empty(trim($_POST["confirm_password"]))) {
  $confirm_password_error = "Please confirm password.";
} else {
  $confirm_password = trim($_POST["confirm_password"]);
  if (empty($password_error) && ($password_error != $confirm_password)) {
    $confirm_password_error = "The passwords did not match.";
  }
}
if (empty($username_error) && empty($password_error) && empty($confirm_password_error)) {
  $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
  if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    if (mysqli_stmt_execute($stmt)) {
      header("location: home.php");
    } else {
      echo "Something went wrong. Try again later.";
    }
    mysqli_stmt_close($stmt);
  }
}
mysqli_close($conn);
}

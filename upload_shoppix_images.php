<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shoppix Upload</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { 
      background: #0d0d0d; 
      color: #f1f1f1; 
      font-family: 'Montserrat', sans-serif; 
      margin: 0; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      height: 100vh; 
    }
    .card {
      background: #1e1e1e;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.4);
      text-align: center;
      width: 450px;
    }
    h1 { color: #03a9f4; margin-bottom: 20px; }
    input[type=file] {
      margin: 15px 0;
      color: #ddd;
    }
    button {
      padding: 12px 25px; 
      border: none; 
      border-radius: 6px; 
      background: #03a9f4; 
      color: white; 
      font-weight: 600; 
      cursor: pointer;
      transition: background 0.2s ease;
    }
    button:hover { background: #0288d1; }
    p { margin-top: 15px; }
  </style>
</head>
<body>
  <?php include "partials/header.php"; ?>
  <div class="card">
    <h1>Upload Your Design</h1>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="image" />
      <br>
      <button type="submit">Upload</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['image'];
    $filename = $file['name'];
    $tmp = $file['tmp_name'];
    $mime = mime_content_type($tmp);

    if (
        strpos($mime, "image/") === 0 &&
        (stripos($filename, ".png") !== false ||
         stripos($filename, ".jpg") !== false ||
         stripos($filename, ".jpeg") !== false)
    ) {
        move_uploaded_file($tmp, "uploads/" . basename($filename));
        echo "<p style='color:#00e676'>✅ File uploaded successfully to /uploads/ directory!</p>";
    } else {
        echo "<p style='color:#ff5252'>❌ Invalid file format</p>";
    }
}
?>
  </div>
  <?php include "partials/footer.php"; ?>
</body>
</html>

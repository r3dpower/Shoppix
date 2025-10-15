<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shoppix Fashion Importer</title>
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
      width: 600px;
    }
    h1 { color: #ff4081; margin-bottom: 15px; }
    h2 { font-size: 18px; color: #bbb; font-weight: 400; margin-bottom: 20px; }
    p { color: #ccc; font-size: 14px; line-height: 1.6; }
    input {
      width: 80%; 
      padding: 12px; 
      border-radius: 6px; 
      border: none; 
      margin: 15px 0; 
      font-size: 14px;
    }
    button {
      padding: 12px 25px; 
      border: none; 
      border-radius: 6px; 
      background: #ff4081; 
      color: white; 
      font-weight: 600; 
      cursor: pointer;
      transition: background 0.2s ease;
    }
    button:hover { background: #e73370; }
    pre {
      background: #121212;
      color: #00e676;
      padding: 15px;
      border-radius: 6px;
      text-align: left;
      font-size: 12px;
      overflow-x: auto;
      margin-top: 20px;
    }
  </style>
</head>
<body>
   <?php include "partials/header.php"; ?>
  <div class="card">
    <h1>Shoppix Importer</h1>
    <h2>Your gateway to sustainable fashion</h2>
    <p>
      At <strong>Shoppix</strong>, we believe fashion should be stylish, affordable, 
      and sustainable. Our platform connects thousands of fashion lovers with 
      unique second-hand pieces, giving clothes a new life while reducing waste.  
    </p>
    <p>
      This importer allows our team to quickly fetch product images from partner 
      stores around the globe. Just enter a product image URL below and preview 
      the results instantly.
    </p>
    <form method="get">
      <input type="text" name="url" placeholder="Enter image URL" />
      <br>
      <button type="submit">Fetch Resource</button>
    </form>

<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    if (stripos($url, 'http') === false) {
        die("<p style='color:#ff5252'>Invalid URL: must include 'http'</p>");
    }
    if (stripos($url, '127.0.0.1') !== false || stripos($url, 'localhost') !== false) {
        die("<p style='color:#ff5252'>Invalid URL: access to localhost is not allowed</p>");
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        echo "<p style='color:#ff5252'>cURL Error: " . curl_error($ch) . "</p>";
    } else {
        echo "<h3>Fetched content:</h3>";
        echo "<pre>" . htmlspecialchars($response) . "</pre>";
    }

    curl_close($ch);
}
?>

  </div>
  <?php include "partials/footer.php"; ?>
</body>
</html>

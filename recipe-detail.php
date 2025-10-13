<?php
include('connection.php');

$recipe_id = $_GET['recipe_id'];
$sql = "SELECT * FROM add_recipe WHERE id = $recipe_id";
$result = mysqli_query($con, $sql);
$recipe = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($recipe['title']); ?></title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Flat Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    li{
      list-style: none;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fffaf7;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 0 20px;
      position: relative;
    }

    /* SHARE BUTTON */
    .share-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #ff6f3c;
      color: white;
      border: none;
      border-radius: 50%;
      width: 38px;
      height: 38px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.1rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
    }

    .share-btn:hover {
      background: #ff8b5e;
      transform: scale(1.05);
    }

    h1 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #ff6f3c;
      text-align: center;
      margin-bottom: 8px;
    }

    .meta-info {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 25px;
    }

    .meta-info span {
      background: #ffede1;
      color: #ff6f3c;
      padding: 6px 12px;
      border-radius: 15px;
      font-weight: 500;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 6px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.08);
    }

    .recipe-container {
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      justify-content: center;
      align-items: stretch;
    }

    .recipe-image, .ingredients {
      flex: 1 1 45%;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.06);
      overflow: hidden;
    }

    .recipe-image img {
      width: 100%;
      height: 100%;
      max-height: 400px;
      object-fit: cover;
    }

    .ingredients {
      padding: 20px 25px;
    }

    .ingredients h2 {
      color: #ff6f3c;
      margin-bottom: 12px;
      font-size: 1.2rem;
      border-bottom: 2px solid #ffe1d2;
      display: inline-block;
      padding-bottom: 3px;
    }

    .ingredients li {
      margin-bottom: 8px;
      padding-left: 1.3rem;
      position: relative;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    .ingredients li::before {
      content: "✔";
      position: absolute;
      left: 0;
      color: #ff6f3c;
      font-weight: bold;
    }

    .section {
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      justify-content: center;
    }

    .section-box {
      flex: 1 1 45%;
      background: #fff;
      padding: 20px 25px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .section-title {
      font-size: 1.2rem;
      font-weight: 600;
      color: #ff6f3c;
      margin-bottom: 10px;
    }

    .section-content {
      font-size: 0.95rem;
      color: #444;
      line-height: 1.6;
    }

    .instructions li {
      margin-bottom: 0.7rem;
      position: relative;
      padding-left: 2rem;
    }

    .instructions li::before {
      content: counter(step);
      counter-increment: step;
      position: absolute;
      left: 0;
      top: 0;
      width: 22px;
      height: 22px;
      background: #ff6f3c;
      color: white;
      border-radius: 50%;
      font-size: 0.8rem;
      text-align: center;
      line-height: 22px;
    }

    @media (max-width: 768px) {
      .recipe-container, .section {
        flex-direction: column;
      }
      .ingredients, .recipe-image, .section-box {
        flex: 1 1 100%;
      }
      .recipe-image img {
        max-height: 250px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- SHARE BUTTON -->
    <button class="share-btn" id="shareBtn" title="Share this recipe">
  <i class="fa-solid fa-share-nodes"></i>
</button>

    <h1><?php echo htmlspecialchars($recipe['title']); ?></h1>

    <div class="meta-info">
      <span><i class="fa-regular fa-clock"></i> <?php echo htmlspecialchars($recipe['time']); ?></span>
      <span><i class="fa-solid fa-bowl-food"></i> <?php echo htmlspecialchars($recipe['type']); ?></span>
      <span><i class="fa-regular fa-star"></i> <?php echo htmlspecialchars($recipe['rating']); ?></span>
    </div>

    <div class="recipe-container">
      <div class="recipe-image">
        <img src="<?php echo htmlspecialchars($recipe['image']); ?>" alt="Recipe Image">
      </div>

      <div class="ingredients">
        <h2>Ingredients</h2>
        <ul>
          <?php
          $ingredients = explode("<br />", $recipe['ingredients']);
          foreach ($ingredients as $item) {
            echo "<li>" . htmlspecialchars(trim($item)) . "</li>";
          }
          ?>
        </ul>
      </div>
    </div>

    <div class="section">
      <div class="section-box">
        <div class="section-title">Description</div>
        <div class="section-content"><?php echo nl2br(htmlspecialchars($recipe['discription'])); ?></div>
      </div>

      <div class="section-box">
        <div class="section-title">Instructions</div>
        <ul class="section-content instructions">
          <?php
          $steps = explode("\n", $recipe['instructions']);
          foreach ($steps as $step) {
            echo "<li>" . htmlspecialchars(trim($step)) . "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </div>

<script>
  document.getElementById("shareBtn").addEventListener("click", () => {
    // Current recipe URL
    const recipeUrl = window.location.href;
    const message = `Check out this recipe I found! 😋\n${recipeUrl}`;

    // WhatsApp share link
    const whatsappURL = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent)
      ? `whatsapp://send?text=${encodeURIComponent(message)}`
      : `https://web.whatsapp.com/send?text=${encodeURIComponent(message)}`;

    // Open WhatsApp with the prefilled message
    window.open(whatsappURL, "_blank");
  });
</script>


</body>
</html>

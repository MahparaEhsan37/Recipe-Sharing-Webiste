<!-- search engine -->
<?php
include('connection.php');
?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = mysqli_real_escape_string($con, $_POST['name']);
    $email    = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con,$_POST['subject']); 
    $message = mysqli_real_escape_string($con,$_POST['message']); 
    
    $sql = "INSERT INTO contactmessages(name, email, subject, message, submitted_at) 
        VALUES ('$name', '$email', '$subject', '$message', NOW())";


   if ($con->query($sql) === TRUE) {
    echo "<script>alert('your message has been successfully submited!');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Flavorful</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css">
  <!-- Font Awesome CDN (add this in your <head>) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="jquery-3.7.1.min.js"></script>

</head>

<body>
  <!-- Fixed Button -->
  <a href=" http://127.0.0.1:5000">
    <button class="fixed-btn btn btn-warning">
      <i class="fas fa-arrow-up"></i> Recipe with ai
    </button>
  </a>

  <?php include('header.php'); ?>
  <!-- Hero Section taking 100% height -->
  <section class="container-fluid py-5 px-4 hero-section">
    <div class="row align-items-center">
      <div class="col-md-6 text-section">
        <h1 class="display-5 fw-bold">
          Discover <span class="text-orange">Delicious Recipes</span> with AI Assistant
        </h1>
        <p class="lead">
          Find the perfect meal or get personalized recipe suggestions from our AI recipe generator.
          Turn ingredients into inspiring dishes!
        </p>
        <div class="button-wrapper home_button d-flex flex-wrap  mt-4">
          <a href="#category_section" class="btn btn-orange me-2 mb-2 text-decoration-none">Explore Recipes</a>
          <a href=" http://127.0.0.1:5000" class="btn btn-outline-orange mb-2 text-decoration-none">Try Recipe AI</a>

        </div>

      </div>
      <div class="col-md-6 text-center home_img">
        <img src=" ./images/food.jpeg" class="img-fluid rounded shadow homepage_img" alt="Delicious Food"
          style="width: 80%; height: 100%;" />
      </div>

    </div>
  </section>








  <?php


  ?>




  <!-- =============================== recipe catagory section =============================== -->
  <section id="category_section">
    <div class="popular-categories-title container-left-spacing mt-3">Popular Categories</div>
    <div class="popular-categories-wrapper container-left-spacing">
      <div class="category-buttons centered-container">
        <button value="all" class="filter-btn active" data-type="all"><i class="fas fa-th"></i> All Recipes</button>
        <button value="vegetarian" class="filter-btn" data-type="vegetarian"><i class="fas fa-leaf"></i> Vegetarian</button>
        <button value="italian" class="filter-btn" data-type="italian"><i class="fas fa-pizza-slice"></i> Italian</button>
        <button value="asian" class="filter-btn" data-type="asian"><i class="fas fa-utensils"></i> Asian</button>
        <button value="Gluten-Free" class="filter-btn" data-type="Gluten-Free"><i class="fas fa-th"></i> Gluten-Free</button>
        <button value="Low-Carb" class="filter-btn" data-type="Low-Carb"><i class="fas fa-leaf"></i> Low-Carb</button>
        <button value="High-Protein" class="filter-btn" data-type="High-Protein"><i class="fas fa-ice-cream"></i> High-Protein</button>
        <button value="-Dairy-Free" class="filter-btn" data-type="Dairy-Free"><i class="fas fa-bolt"></i> Dairy-Free</button>
        <button value="desserts" class="filter-btn" data-type="desserts"><i class="fas fa-ice-cream"></i> Desserts</button>
        <button value="easy" class="filter-btn" data-type="easy"><i class="fas fa-bolt"></i> Quick & Easy</button>

      </div>
    </div>

    <div class="featured_recipe centered-container">
    <div class="popular-categories-title">Featured Recipes</div>
    <div class="recipes append_recipe">
      <!-- <a href="recipe-detail.php?recipe_id=1" class="text-decoration-none text-black">
        <div class="recipe-card">
          <img src="https://via.placeholder.com/300x200" alt="Recipe Image" /> 
          <div class="recipe-content">
            <div class="recipe-tag">Recipe Tag</div> 
            <h4>Recipe Title</h4> 
            <p>Recipe description Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> 
          </div> 
        </div>
      </a> -->
    </div>
  </div>
  </section>





 <!-- '<a href="recipe-detail.php?recipe_id=' + value['id'] + '" class="text-decoration-none text-black"><div class="recipe-card">' +
                '<img src="' + value['image'] + '" alt="Recipe Image" />' +
                '<div class="recipe-content">' +
                '<div class="recipe-tag">' + value['type'] + '</div>' +
                '<h4>' + value['title'] + '</h4>' +
                '<p>' + value['description'] + '</p>' +
                '</div>' +
                '</div></a>' -->

      <!-- ==== -->







  <!-- why amazing recipes  -->

  <section class="mt-5">
    <div class="recipe-ai-section">
      <div class="text-content">
        <span class="tag">AI Powered</span>
        <h1>Turn Your Ingredients into Amazing Recipes</h1>
        <p>
          Don't know what to cook with the ingredients you have? Our AI assistant can
          generate personalized recipes based on what's in your kitchen. Get creative
          meal ideas instantly!
        </p>
        <ul>
          <li>✅ Personalized recipe suggestions</li>
          <li>✅ Dietary preference and restriction options</li>
          <li>✅ Instant answers to your cooking questions</li>
          <li>✅ Meal planning assistance</li>
        </ul>
        <a class="try-btntext-decoration-none" href=" http://127.0.0.1:5000">Try Recipe AI</a>
      </div>
      <div class="image-content">
        <img src="./images/food.jpeg" alt="AI Chef Food" />
        <div class="ai-chef-badge">
          <span>👨‍🍳 AI Chef</span>
        </div>
      </div>
    </div>

  </section>





  <!-- Latest Recipes  -->
  <!-- <section class="trending-section" id="trending_section">
    <h2>Trending Now</h2>
    <div class="card-container">
       Recipe Card 1 -->
      <!-- <div class="recipe-card">
        <img src="./images/trending1.jpeg" alt="Double Chocolate Fudge Cake" />
        <div class="card-content">
          <div class="top-row">
            <span class="tag">Vegetarian</span>
            <span class="time"><i class="far fa-clock"></i> 60 min</span>
          </div>
          <h3>Double Chocolate Fudge Cake</h3>
          <p>Rich chocolate cake with silky ganache frosting. A decadent dessert for chocolate lovers.</p>
          <div class="bottom-row">
            <span class="rating"><i class="fas fa-star"></i> 5.9 <small>(312)</small></span>
            <span class="bookmark"><i class="far fa-bookmark"></i></span>
          </div>
        </div>
      </div> -->

      <!-- Recipe Card 2 -->
      <!-- <div class="recipe-card">
        <img src="./images/trending2.jpeg" alt="Rainbow Buddha Bowl" />
        <div class="card-content">
          <div class="top-row">
            <span class="tag">Vegetarian</span>
            <span class="time"><i class="far fa-clock"></i> 35 min</span>
          </div>
          <h3>Rainbow Buddha Bowl</h3>
          <p>Nutritious bowl packed with quinoa, roasted vegetables, avocado, and tahini dressing.</p>
          <div class="bottom-row">
            <span class="rating"><i class="fas fa-star"></i> 5.7 <small>(189)</small></span>
            <span class="bookmark"><i class="far fa-bookmark"></i></span>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- contact us section -->
  <section class="py-5 bg-light" id="contact">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="fw-bold">Contact Us</h2>
          <p class="text-muted">Have a question, idea, or feedback? Fill out the form below — we’d love to hear from you!</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="bg-white p-4 p-md-5 rounded shadow-sm">
              <form method="post">
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                  </div>
                </div>



                <div class="mb-3">
                  <input type="text" name="subject" class="form-control " placeholder="Subject" required>
                </div>
                <div class="mb-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-orange w-100">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
  </section>
    <div id="popup" class="popup"></div>


  <?php include('footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- pop up message  -->


 <script>
  function showPopup(message) {
    var popup = document.getElementById("popup");
    popup.innerText = message;
    popup.style.display = "block";
    setTimeout(function() {
      popup.style.display = "none";
    }, 2000); // hides after 3 seconds
  }
</script>

<script>
  function clearHighlights() {
    $('.highlight').each(function() {
      // Highlight span se text ko nikal kar uski jagah wapas dal dete hain
      $(this).replaceWith($(this).text());
    });
  }

  $('#searchForm').on('submit', function(e) {
    e.preventDefault();
    clearHighlights();

    let query = $('#searchInput').val().trim().toLowerCase();
    if (query === "") return;

    let found = false;
    let regex = new RegExp('(' + query + ')', 'ig');

    $('body *').each(function() {
      if ($(this).children().length === 0) {
        let text = $(this).text();
        if (text.toLowerCase().includes(query)) {
          $(this).html(text.replace(regex, '<span class="highlight">$1</span>'));

          if (!found) {
            $('html, body').animate({
              scrollTop: $(this).offset().top - 100
            }, 500);
            found = true;
          }
        }
      }
    });

   
  });
</script>








  <script>
    $(document).ready(function() {
      // Default load
      fetchRecipes('all');

      // On button click
      $('.filter-btn').on('click', function() {
        let selectedType = $(this).val(); // get button value
        fetchRecipes(selectedType);
      });

      function fetchRecipes(type) {
        $.ajax({
          type: "POST",
          url: "filter_recipes.php",
          data: {
            type: type
          },
          dataType: "json",
          success: function(response) {
            $('.append_recipe').html(""); // Clear existing recipes

            if (response.length === 0) {
              $('.append_recipe').html("<p>No recipes found.</p>");
              return;
            }

            $.each(response, function(index, value) {
              $('.append_recipe').append(
               '<a href="recipe-detail.php?recipe_id=' + value['id'] + '" class="text-decoration-none text-black"><div class="recipe-card">' +
                 '<img src="' + value['image'] + '" alt="Recipe Image" />' +
                 '<div class="recipe-content">' +
                '<div class="recipe-tag">' + value['type'] + '</div>' +
                '<h4>' + value['title'] + '</h4>' +
                '<p>' + value['description'] + '</p>' +
                '</div>' +
                '</div></a>'
              );
            });
          },
          error: function(err) {
            console.log("Error fetching recipes", err);
          }
        });
      }
    });
  </script>








<button id="btn">search</button>
<input type="text" id="search_field">







</body>

</html>
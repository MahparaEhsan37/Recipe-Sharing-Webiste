<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About - Flavorful</title>

  <!-- CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    .about-hero {
      background: linear-gradient(to right, #fffaf0, #fff5e1);
      padding: 60px 20px;
      border-radius: 20px;
      margin-top: 50px;
    }

    .about-hero h1 {
      font-size: 3rem;
      color: #ff6f00;
    }

    .about-icon {
      width: 50px;
      height: 50px;
      margin-bottom: 10px;
    }

    .feature-box {
      border-radius: 15px;
      background-color: #fff;
      padding: 30px 20px;
      transition: 0.3s;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .feature-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .about-section {
      background-color: #fefefe;
      padding: 60px 20px;
    }

    .about-btn {
      background-color: #ff6f00;
      color: white;
      border-radius: 50px;
      padding: 12px 30px;
      text-transform: uppercase;
      font-weight: bold;
      transition: 0.3s;
    }

    .about-btn:hover {
      background-color: #e65c00;
    }

    .highlight {
      background-color: yellow;
      padding: 0 2px;
    }
  </style>
</head>
<body>

  <!-- ✅ Header -->
  <header>
    <nav class="w-100 bg-light py-2">
      <div class="container-fluid">
        <div class="row align-items-center">

          <!-- Logo -->
          <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-center justify-content-md-start mb-2 mb-md-0 logo_sec">
            <img src="./images/navbar_icon.png" alt="Logo" width="30" height="30" class="me-2" />
            <span class="fw-bold text-orange home_logo">Flavorful</span>
          </div>

          <!-- Search Bar -->
          <div class="col-12 col-md-7 col-lg-4">
            <form id="searchForm" class="d-flex justify-content-center justify-content-md-end mt-2 mt-md-0" role="search">
              <input class="form-control rounded-start-pill" type="search" name="searchQuery" id="searchInput" placeholder="Search..." aria-label="Search">
              <button class="btn btn-warning rounded-end-pill" type="submit">🔍</button>
            </form>
          </div>

        </div>
      </div>
    </nav>
  </header>

  <!-- ✅ jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function clearHighlights() {
      $('.highlight').each(function() {
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

  <!-- ✅ About Section -->
  <div class="container about-hero">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h1 class="fw-bold">About <span class="text-orange">Flavorful</span></h1>
        <p class="lead mt-3">We’re here to revolutionize your kitchen experience using AI-powered recipe generation. Whether you’re a beginner or a home chef, Flavorful helps you discover dishes tailored to your taste, diet, and available ingredients.</p>
        <a href="chatbot.php" class="about-btn mt-3 d-inline-block">Try Our Recipe AI</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="./images/about.php" alt="About Flavorful" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>

  <div class="about-section">
    <div class="container text-center">
      <h2 class="mb-5 fw-bold text-orange">What Makes Us Special?</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-box">
            <img src="https://cdn-icons-png.flaticon.com/512/686/686589.png" class="about-icon" alt="AI">
            <h5 class="fw-bold">AI-Powered Suggestions</h5>
            <p>Get smart recipes based on what’s in your fridge. Powered by machine learning for your convenience.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box">
            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" class="about-icon" alt="Healthy">
            <h5 class="fw-bold">Health-Conscious Options</h5>
            <p>From gluten-free to high-protein and low-carb, we’ve got recipes for every lifestyle and dietary preference.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box">
            <img src="https://cdn-icons-png.flaticon.com/512/1946/1946436.png" class="about-icon" alt="Community">
            <h5 class="fw-bold">Community of Foodies</h5>
            <p>Rate, share, and explore recipes with fellow food lovers. Flavorful is built for a cooking community like you.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-5 text-center">
    <h2 class="fw-bold mb-3">Our Mission</h2>
    <p class="lead">To inspire creativity in every kitchen by blending technology with culinary passion. We believe everyone deserves access to delicious, healthy, and personalized meals.</p>
  </div>

  <!-- ✅ Footer -->
  <footer>
    <div class="footer-bottom text-center py-3" style="background-color:black">
      <span style="color:#fefefe">© 2025 Flavorful. All rights reserved.</span><br>
      <span style="color:#fefefe">Made with ❤️ for food lovers</span>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>

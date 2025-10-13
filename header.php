<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <header>
    <nav class="w-100 bg-light py-2">
      <div class="container-fluid">
        <div class="row align-items-center">

          <!-- Logo: 3 columns on md and up, full width on small -->
          <div class="col-12 col-lg-2 col-md-5 col-sm-5 col-xs-12 d-flex align-items-center mb-2 mb-md-0 logo_sec">
            <img src="./images/navbar_icon.png" alt="Logo" width="30" height="30" class="me-2" />
            <span class="fw-bold text-orange home_logo">RecipeLens</span>
          </div>

          <!-- Nav Links: 5 columns on md and up, hidden on small -->
          <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12 ">
            <ul class="nav justify-content-center mb-0">
              <li class="nav-item"><a class="nav-link nav-link-responsive px-1 px-sm-1 px-md-3  active text-orange"
                  href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link nav-link-responsive px-1 px-sm-2 px-md-3" href="#category_section">Categories</a>
              </li>
              <li class="nav-item"><a class="nav-link nav-link-responsive px-1 px-sm-2 px-md-3" href="#trending_section">Trending</a>
              </li>
              <li class="nav-item"><a class="nav-link nav-link-responsive px-1 px-sm-2 px-md-3" href="about.php">About</a></li>
            </ul>
          </div>

          <!-- Search Bar: 4 columns on md and up, full width on small -->
          <div class="col-12 col-lg-4 col-md-12">
            <form id="searchForm" class="d-flex justify-content-md-end mt-2 mt-md-0" role="search">
              <input class="form-control rounded-start-pill" type="search" name="searchQuery" id="searchInput" placeholder="Search..." aria-label="Search">
              <button class="btn btn-warning rounded-end-pill" type="submit">🔍</button>
            </form>

          </div>

        </div>
      </div>
    </nav>
  </header>




</body>
</html>
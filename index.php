<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- local CSS -->
  <link rel="stylesheet" href="./style.css">
  <!-- Embedded Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,900&display=swap"
    rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Favicon -->
  <link rel="icon" href="images/favicon.ico">
  <title>QRIUS</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">QRIUS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar-items" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#book-carousel">Reccomendation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#membership">Membership</a>
          </li>
        </ul>
      </div>
      <div class="login">
        <div class="dropdown">
        <a href="admin/login">
          <button class="btn btn-outline-light">Login / Signup</button>
        </a>
      </div>
    </div>
  </nav>


  <!-- Title -->
  <section id="title">
    <div class="row pt-5">
      <div class="col-lg-6 col-md-12 col-sm-12 title-txt">
        <h1 class="big-heading title-heading">What books are you looking for?</h1>
        <p class="title-p">Discover your love for books by checking in our exclusive selection of exclusive books</p>
        <a href="admin/login">
          <button type="button" class="btn btn-outline-light btn-lg explore-btn">Explore</button>
        </a>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section id="features">
    <div class="row pb-5 pt-5">
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
        <img src="./images/easy.svg" alt="easy-img">
        <h3>Easy to use.</h3>
        <p>Our website offers easy controls for all ages, especially for elderly and very young readers.</p>
      </div>
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
        <img src="./images/client-2.svg" alt="client-img">
        <h3>Elite Clientele</h3>
        <p>We have all the books that you might be looking for! That's because of the wonderful collaborators of our
          website</p>
      </div>
      <div class="feature-box col-lg-4 col-md-12 col-sm-12">
        <img src="./images/success-26.svg" alt="success-img">
        <h3>Guaranteed to work.</h3>
        <p>Find the book best suited to your interests or your money back.</p>
      </div>
    </div>
  </section>

  <!-- Recommended Books -->
  <section id="book-carousel">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="./images/Tom-gates.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Tom Gates: Excellent Excuses</h5>
                  <p class="card-text">Getting to the top of Mr Fullerman's award chart is proving a bit tricky! It's
                    mostly because: 1. Marcus Meldrew is a
                    sneaky so-and-so and up to no good, if you ask me. @. My tooth is aching so much that I can't even
                    concentrate on
                    drawing in class...</p>
                  <p>★ 4.4</p>
                  <a href="#" class="btn btn-primary">Borrow Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="./images/wimpy-kid.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Diary of a Wimpy Kid: Long Haul</h5>
                  <p class="card-text">Greg Heffley's mother proposes a road trip during the summer vacation, ruining
                    his plans. He comes up with an idea to
                    attend a YouTube gaming convention.</p>
                  <p>★ 4.6</p>
                  <a href="#" class="btn btn-primary">Borrow Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="./images/SchoolTimes-img.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">School Times</h5>
                  <p class="card-text">School Days are a collection of stories that captures the splendor of our school
                    days. Here Ruskin Bond has weaved
                    together some of the most adventurous and engaging school stories written by master storytellers
                    like Charles Dickens,
                    Mark Twain, Samuel Smiles, Anton Chekhov, Richmal Crompton and others.</p>
                  <p>★ 3.9</p>
                  <a href="#" class="btn btn-primary">Borrow Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="./images/hp.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Harry Potter and the Sorcerer's Stone</h5>
                  <p class="card-text">It is a story about Harry Potter, an orphan brought up by his aunt and uncle
                    because his parents were killed when he was
                    a baby. Harry is unloved by his uncle and aunt but everything changes when he is invited to join
                    Hogwarts School of
                    Witchcraft and Wizardry and he finds out he's a wizard.</p>
                  <p>★ 4.7</p>
                  <a href="#" class="btn btn-primary">Borrow Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="./images/fbw.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Fantastic Beasts and Where to Find Them</h5>
                  <p class="card-text">Newt Scamander, arriving in New York for a brief stopover, he might have come and
                    gone without
                    incident, were it not for a No-Maj (American for Muggle) named Jacob, a misplaced magical case, and
                    the escape of some
                    of Newt's fantastic beasts, which could spell trouble for both the wizarding and No-Maj worlds.</p>
                  <p>★ 4</p>
                  <a href="#" class="btn btn-primary">Borrow Now</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="./images/tntad.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">The Night Train At Deoli</h5>
                  <p class="card-text">An enchanting collection of stories from the heartland of India Ruskin Bond's
                    simple characters, living amidst the lush
                    forests of the Himalayan foothills, are remarkable for their quiet heroism, courage and grace, and
                    age-old values of
                    honesty and fidelity.</p>
                  <p>★ 4.2</p>
                  <a href="#" class="btn btn-primary">Borrow Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Membership -->
  <section id="membership">
    <h1 class="carousel-heading">A Plan for every reader's needs.</h1>
    <p class="subtitle">Simple and affordable plans for readers of all ages.</p>
    <div class="row">
      <div class="col-lg-4 col-md-6 pricing-column">
        <div class="card">
          <div class="card-header">
            <h3>Chihuahua</h3>
          </div>
          <div class="card-body">
            <h2>Free</h2>
            <p>2 books/mo</p>
            <p>Access to average rating books</p>
            <p>Unlimited Site Usage</p>
            <button type="button" class="btn btn-lg btn-outline-dark download-button" onclick="redirect()">Sign Up</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 pricing-column">
        <div class="card">
          <div class="card-header">
            <h3>Enthusiast</h3>
          </div>
          <div class="card-body">
            <h2>₹100 / mo</h2>
            <p>5 books/mo</p>
            <p>Access to books rated between 3.5 to 4.5</p>
            <p>Books borrowed at lower prices</p>
            <button type="button" class="btn btn-dark btn-lg download-button" onclick="redirect()">Sign Up</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 pricing-column">
        <div class="card">
          <div class="card-header">
            <h3>Book Worm</h3>
          </div>
          <div class="card-body">
            <h2>₹250 / mo</h2>
            <p>10 book/mo</p>
            <p>Access to all books rated upto 4.5 and above</p>
            <p>Books available at lowest prices</p>
            <button type="button" class="btn btn-dark btn-lg download-button" onclick="redirect()">Sign Up</button>
          </div>
        </div>
      </div>
    </div>


  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="social">
      <img src="./images/INSTA.svg" alt="insta-img">
      <img src="./images/fb-con.svg" alt="fb-img">
      <img src="./images/twitter.svg" alt="twitter-img">
      <img src="./images/mail.svg" alt="mail-img">
    </div>
    <a href="#">Terms Of Use</a>
    <br>
    <a href="#">Privacy Policy</a>
    <p class="copyright">© Copyright 2022 QRIUS</p>
  </footer>























  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

    <script>
      function redirect(){
        window.location.href="admin/login"
      }
    </script>
</body>

</html>
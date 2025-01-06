<?php include_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Home</title>
  <!-- Bootstrap CSS -->
  <link 
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
  >

  <style>
    /* Hero Section */
    .hero-section {
      background: url('assets/img/banner.jpg') center/cover no-repeat;
      center/cover no-repeat;
      min-height: 50vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      color: #fff;
      text-align: center;
    }
    .hero-section .overlay {
      background-color: rgba(0, 0, 0, 0.4);
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }
    .hero-content {
      z-index: 1;
    }
    .hero-content h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    /* Tab styling */
    .nav-tabs .nav-link {
      border: 1px solid #dee2e6;
      margin-right: 0.25rem;
    }
    .nav-tabs .nav-link.active {
      background-color: #dc3545; /* or any brand color */
      color: #fff !important;
    }

    /* Card hover effect */
    .pricing-card {
      transition: transform 0.2s;
    }
    .pricing-card:hover {
      transform: scale(1.02);
    }
    .pricing-image {
      height: 200px;
      object-fit: cover;
    }
    .section-title {
      margin-bottom: 2rem;
      text-align: center;
    }

    /* Custom Date Picker Styling */
    .date-picker {
      background-color: #f8f9fa;    /* Light gray background */
      border-radius: 4px;
      padding: 10px;
      font-size: 1rem;
      color: #212529;
    }
    .date-picker:focus {
      outline: none;
      box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25); /* Red box-shadow for focus */
    }
    .date-picker::-webkit-calendar-picker-indicator {
      cursor: pointer;
      filter: invert(47%) sepia(27%) saturate(317%)
              hue-rotate(332deg) brightness(92%) contrast(86%);
      /* This filter slightly changes the icon color (optional) */
    }
    .date-picker::-webkit-inner-spin-button {
      display: none; /* Hide spinner if desired */
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Eternal Moments</a>
      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="experience.php">Experience & Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <!-- Admin Login Link (optional) -->
          <li class="nav-item ms-3">
            <a href="admin/index.php" class="btn btn-danger">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section mb-5">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1>Make Your Moments Unforgettable</h1>
      <p class="lead">
        Elevate your brand, celebrate your passion, and cherish every moment 
        with our professional photography
      </p>
    </div>
  </section>

  <!-- Tabs Section (Different Photography Types) -->
  <section class="container mb-5">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button
          class="nav-link active"
          id="portraits-tab"
          data-bs-toggle="tab"
          data-bs-target="#portraits"
          type="button"
          role="tab"
          aria-controls="portraits"
          aria-selected="true"
        >
          Portraits
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="events-tab"
          data-bs-toggle="tab"
          data-bs-target="#events"
          type="button"
          role="tab"
          aria-controls="events"
          aria-selected="false"
        >
          Events
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="commercial-tab"
          data-bs-toggle="tab"
          data-bs-target="#commercial"
          type="button"
          role="tab"
          aria-controls="commercial"
          aria-selected="false"
        >
          Commercial
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="lifestyle-tab"
          data-bs-toggle="tab"
          data-bs-target="#lifestyle"
          type="button"
          role="tab"
          aria-controls="lifestyle"
          aria-selected="false"
        >
          Lifestyle
        </button>
      </li>
    </ul>

    <div class="tab-content pt-4" id="myTabContent">
      <!-- Portraits Tab -->
      <div
        class="tab-pane fade show active"
        id="portraits"
        role="tabpanel"
        aria-labelledby="portraits-tab"
      >
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h3 class="mb-3 text-center">Portrait Sessions</h3>
            <form>
              <div class="mb-3">
                <label for="portraitDate" class="form-label">Select Date</label>
                <input
                  type="date"
                  class="form-control date-picker"
                  id="portraitDate"
                  required
                />
              </div>
              <div class="d-grid">
                <button
                  type="button"
                  class="btn btn-danger"
                  onclick="checkAvailability('portraitDate', 'portraitMessage')"
                >
                  Check Availability
                </button>
              </div>
            </form>
            <div id="portraitMessage" class="alert d-none mt-3" role="alert"></div>
          </div>
        </div>
      </div>

      <!-- Events Tab -->
      <div
        class="tab-pane fade"
        id="events"
        role="tabpanel"
        aria-labelledby="events-tab"
      >
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h3 class="mb-3 text-center">Event Photography</h3>
            <form>
              <div class="mb-3">
                <label for="eventsDate" class="form-label">Select Date</label>
                <input
                  type="date"
                  class="form-control date-picker"
                  id="eventsDate"
                  required
                />
              </div>
              <div class="d-grid">
                <button
                  type="button"
                  class="btn btn-danger"
                  onclick="checkAvailability('eventsDate', 'eventsMessage')"
                >
                  Check Availability
                </button>
              </div>
            </form>
            <div id="eventsMessage" class="alert d-none mt-3" role="alert"></div>
          </div>
        </div>
      </div>

      <!-- Commercial Tab -->
      <div
        class="tab-pane fade"
        id="commercial"
        role="tabpanel"
        aria-labelledby="commercial-tab"
      >
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h3 class="mb-3 text-center">Commercial Shoots</h3>
            <form>
              <div class="mb-3">
                <label for="commercialDate" class="form-label">Select Date</label>
                <input
                  type="date"
                  class="form-control date-picker"
                  id="commercialDate"
                  required
                />
              </div>
              <div class="d-grid">
                <button
                  type="button"
                  class="btn btn-danger"
                  onclick="checkAvailability('commercialDate', 'commercialMessage')"
                >
                  Check Availability
                </button>
              </div>
            </form>
            <div id="commercialMessage" class="alert d-none mt-3" role="alert"></div>
          </div>
        </div>
      </div>

      <!-- Lifestyle Tab -->
      <div
        class="tab-pane fade"
        id="lifestyle"
        role="tabpanel"
        aria-labelledby="lifestyle-tab"
      >
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h3 class="mb-3 text-center">Lifestyle & Branding</h3>
            <form>
              <div class="mb-3">
                <label for="lifestyleDate" class="form-label">Select Date</label>
                <input
                  type="date"
                  class="form-control date-picker"
                  id="lifestyleDate"
                  required
                />
              </div>
              <div class="d-grid">
                <button
                  type="button"
                  class="btn btn-danger"
                  onclick="checkAvailability('lifestyleDate', 'lifestyleMessage')"
                >
                  Check Availability
                </button>
              </div>
            </form>
            <div id="lifestyleMessage" class="alert d-none mt-3" role="alert"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="container mb-5">
  <div class="row">
    <div class="col-12">
      <h2 class="section-title">Our Photography Packages</h2>
    </div>
  </div>
  <div class="row g-4">
    <!-- Basic Package -->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img
          src="https://picsum.photos/600/400?random=1"
          class="card-img-top"
          alt="Basic Package"
          style="object-fit: cover; height: 200px;"
        />
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Basic Package</h5>
          <ul>
            <li>2 hours coverage</li>
            <li>100+ edited photos</li>
            <li>Online gallery access</li>
          </ul>
          <!-- Price + Button at the Bottom -->
          <div class="mt-auto">
            <p class="fw-bold fs-5 mb-2">$299</p>
            <a href="#" class="btn btn-outline-danger w-100">Book Now</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Professional Package -->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img
          src="https://picsum.photos/600/400?random=2"
          class="card-img-top"
          alt="Professional Package"
          style="object-fit: cover; height: 200px;"
        />
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Professional Package</h5>
          <ul>
            <li>4 hours coverage</li>
            <li>200+ edited photos</li>
            <li>High-resolution images & prints</li>
            <li>Online gallery access</li>
          </ul>
          <div class="mt-auto">
            <p class="fw-bold fs-5 mb-2">$599</p>
            <a href="#" class="btn btn-danger w-100">Book Now</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Premium Package -->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img
          src="https://picsum.photos/600/400?random=3"
          class="card-img-top"
          alt="Premium Package"
          style="object-fit: cover; height: 200px;"
        />
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Premium Package</h5>
          <ul>
            <li>8 hours coverage (Full-day)</li>
            <li>400+ edited photos</li>
            <li>Two photographers</li>
            <li>Printed album & framed art</li>
            <li>Online gallery & USB drive</li>
          </ul>
          <div class="mt-auto">
            <p class="fw-bold fs-5 mb-2">$999</p>
            <a href="#" class="btn btn-outline-danger w-100">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Who We Are Section -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Text Column -->
        <div class="col-md-6 mb-4 mb-md-0">
          <h2>Who We Are</h2>
          <p>
            We are a team of passionate and dedicated photographers with years of
            experience in capturing authentic stories—whether it’s a personal 
            milestone, a brand campaign, or a cultural event. Explore our portfolio
            to see the breadth of our work.
          </p>
          <button type="button" class="btn btn-danger btn-lg mt-3">View our portfolio</button>
        </div>
        <!-- Image Column -->
        <div class="col-md-6 text-center">
          <img src="assets/img/sheep.png" class="img-fluid rounded" alt="Photographer image">
        </div>
      </div>
    </div>
  </section>

  <!-- Happy Clients / Testimonials Section -->
  <section class="bg-dark text-light py-5">
    <div class="container">
      <h2 class="text-center mb-5">Our Happy Clients</h2>
      <div class="row g-5">
        <div class="col-md-4 text-center">
          <img 
            src="assets/img/customer-1.png" 
            class="img-fluid rounded-circle mb-3"
            alt="Customer - Jason Kim" 
            style="height: 150px; width: 150px; object-fit: cover;"
          >
          <h5>Jason Kim</h5>
          <p>
            "I run a small bakery in the city, and Eternal Moments’ product photography
            was a game-changer for us. Our pastries have never looked so appetizing online!"
          </p>
        </div>
        <div class="col-md-4 text-center">
          <img 
            src="assets/img/customer-2.png" 
            class="img-fluid rounded-circle mb-3"
            alt="Customer - Rebecca Carter" 
            style="height: 150px; width: 150px; object-fit: cover;"
          >
          <h5>Rebecca Carter</h5>
          <p>
            "We hired them to document our annual charity event. The team was punctual,
            professional, and the final photos truly captured the spirit of the evening.
            We couldn’t have asked for more!"
          </p>
        </div>
        <div class="col-md-4 text-center">
          <img 
            src="assets/img/customer-3.png" 
            class="img-fluid rounded-circle mb-3"
            alt="Customer - Carlos Alvarez" 
            style="height: 150px; width: 150px; object-fit: cover;"
          >
          <h5>Carlos Alvarez</h5>
          <p>
            "I needed candid lifestyle shots for my portfolio, and Eternal Moments delivered
            beyond my expectations. The photos are vibrant, authentic, and I’ve received
            countless compliments!"
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-light py-3 text-center">
    <p class="mb-0">&copy; <?= date('Y') ?> Eternal Moments. All Rights Reserved.</p>
  </footer>

  <!-- Availability Check Script -->
  <script>
    function checkAvailability(dateInputId, messageElementId) {
      const dateValue = document.getElementById(dateInputId).value;
      const messageEl = document.getElementById(messageElementId);

      if (!dateValue) {
        messageEl.textContent = 'Please select a date first.';
        messageEl.className = 'alert alert-warning';
        messageEl.classList.remove('d-none');
        return;
      }

      // Simple mock logic for demonstration
      const isAvailable = Math.random() > 0.4;
      if (isAvailable) {
        messageEl.textContent = `Great news! We are available on ${dateValue}.`;
        messageEl.className = 'alert alert-success';
      } else {
        messageEl.textContent = `Sorry, we are fully booked on ${dateValue}.`;
        messageEl.className = 'alert alert-danger';
      }
      messageEl.classList.remove('d-none');
    }
  </script>

  <!-- Bootstrap JS -->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  ></script>
</body>
</html>

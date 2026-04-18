<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kanto Cuts Admin Workspace</title>

  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    :root {
      --primary-gold: #f4d371;
      --primary-gold-dark: #cca42b;
      --sidebar-width: 260px;
    }

    [data-bs-theme="dark"] {
      --primary-gold: #D4AF37;
      --primary-gold-dark: #b8860b;
    }

    body {
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      transition: background-color 0.5s ease, color 0.5s ease;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Poppins', sans-serif;
    }

    .font-serif {
      font-family: 'Playfair Display', serif !important;
    }

    .sidebar {
      width: var(--sidebar-width);
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 1040;
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.5s ease, border-color 0.5s ease;
      transform: translate3d(0, 0, 0);
    }

    .nav-btn.active {
      background: rgba(212, 175, 55, 0.15);
      color: #854d0e !important;
      font-weight: 600;
    }

    .nav-btn.active i {
      color: var(--primary-gold-dark) !important;
    }

    .topbar {
      position: fixed;
      top: 0;
      left: var(--sidebar-width);
      right: 0;
      height: 70px;
      z-index: 1030;
      transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.5s ease, border-color 0.5s ease;
    }

    .main-content {
      margin-left: var(--sidebar-width);
      padding-top: 70px;
      min-height: 100vh;
      padding-bottom: 40px;
      transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.5s ease, color 0.5s ease;
    }

    .card,
    .modal-content,
    .table,
    .table th,
    .table td,
    .form-control,
    .form-select,
    .dropdown-menu {
      transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease !important;
    }

    .page-section {
      display: none;
      padding: 32px;
      animation: fadeIn 0.3s ease;
    }

    .page-section.active {
      display: block;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .table th {
      cursor: pointer;
      user-select: none;
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .table thead th {
      background-color: var(--bs-body-bg);
      color: var(--bs-secondary-color);
      border-bottom: 1px solid var(--bs-border-color);
    }

    .btn-gold {
      background-color: var(--primary-gold);
      color: #000000;
      font-weight: 500;
      border: none;
      padding: 8px 20px;
      border-radius: 6px;
      font-size: 14px;
      transition: background-color 0.2s;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
    }

    .btn-gold:hover {
      background-color: var(--primary-gold-dark);
      color: #ffffff;
    }

    @media (max-width: 991.98px) {
      .sidebar {
        transform: translate3d(-100%, 0, 0);
      }

      .sidebar.show {
        transform: translate3d(0, 0, 0);
      }

      .main-content {
        margin-left: 0;
      }

      .topbar {
        left: 0;
      }
    }
  </style>
  <script>
    if (localStorage.getItem('theme') === 'dark') document.documentElement.setAttribute('data-bs-theme', 'dark');
  </script>
</head>

<body class="bg-body-tertiary">

  <nav class="sidebar bg-body shadow-sm d-flex flex-column" id="sidebar">
    <div class="p-4 border-bottom text-start">
      <div class="d-flex align-items-center gap-2 mb-1">
        <i class="fas fa-cut fs-4" style="color: var(--primary-gold-dark);"></i>
        <h3 class="font-serif m-0" style="color: var(--primary-gold-dark); font-size: 24px;">Kanto Cuts</h3>
      </div>
      <div class="text-secondary fw-semibold ms-1"
        style="font-size: 11px; letter-spacing: 1.5px; text-transform: uppercase;">Admin Workspace</div>
    </div>
    <div class="p-3 flex-grow-1 overflow-auto">
      <div class="text-secondary fw-semibold text-uppercase mb-2 ms-3" style="font-size: 11px; letter-spacing: 1px;">
        Overview</div>
      <button
        class="btn btn-link nav-btn active text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('dashboard', this)">
        <i class="fas fa-table-cells-large" style="width: 20px; text-align: center;"></i> Dashboard
      </button>

      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('reports', this)">
        <i class="fas fa-chart-pie" style="width: 20px; text-align: center;"></i> Monthly Report
      </button>

      <div class="text-secondary fw-semibold text-uppercase mt-4 mb-2 ms-3"
        style="font-size: 11px; letter-spacing: 1px;">Management</div>
      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('queue', this)">
        <i class="fas fa-clipboard-list" style="width: 20px; text-align: center;"></i> Queue
        <span class="badge text-bg-secondary ms-auto rounded-pill" id="queueBadge" style="display:none;">0</span>
      </button>

      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('barbers', this)">
        <i class="fas fa-user-tie" style="width: 20px; text-align: center;"></i> Barbers
      </button>
      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('services', this)">
        <i class="fas fa-scissors" style="width: 20px; text-align: center;"></i> Services
      </button>
      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('hairstyles', this)">
        <i class="fas fa-spray-can-sparkles" style="width: 20px; text-align: center;"></i> Hairstyles
      </button>
      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('customers', this)">
        <i class="fas fa-users" style="width: 20px; text-align: center;"></i> Customers
      </button>

      <button
        class="btn btn-link nav-btn text-body text-decoration-none d-flex align-items-center gap-2 w-100 text-start px-3 py-2 mb-1 rounded-2"
        onclick="showPage('ratings', this)">
        <i class="fas fa-star" style="width: 20px; text-align: center;"></i> Ratings
      </button>
    </div>
  </nav>

  <header class="topbar bg-body border-bottom shadow-sm d-flex align-items-center justify-content-between px-4">
    <div class="d-flex align-items-center gap-3">
      <button class="btn btn-outline-secondary d-lg-none border-0"
        onclick="document.getElementById('sidebar').classList.toggle('show')">
        <i class="fas fa-bars fs-5"></i>
      </button>
      <h4 class="m-0 fw-semibold text-body" id="topbarTitle">Dashboard</h4>
    </div>
    <div class="d-flex align-items-center gap-3">
      <div class="px-3 py-1 rounded fw-medium text-body border" id="liveClock">00:00:00</div>
      <button class="btn btn-outline-secondary border-0" onclick="toggleDarkMode()" id="darkModeBtn"
        title="Toggle Theme">
        <i class="fas fa-moon"></i>
      </button>
      <button class="btn btn-outline-secondary border-0" onclick="loadDatabase()" title="Refresh Data">
        <i class="fas fa-sync-alt"></i>
      </button>
      <button class="btn btn-outline-danger border-0" onclick="adminLogout()" title="Logout">
        <i class="fas fa-sign-out-alt"></i>
      </button>
    </div>
  </header>

  <main class="main-content" id="main">

    <section class="page-section active" id="page-dashboard">
      <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
              <div>
                <div class="text-secondary fw-medium mb-1" style="font-size: 13px;">Active Queue</div>
                <h2 class="m-0 fw-bold text-body" id="dash-queue" style="line-height: 1;">0</h2>
              </div>
              <div class="d-flex align-items-center justify-content-center rounded-3 fs-4"
                style="width: 48px; height: 48px; background: rgba(2, 132, 199, 0.1); color: #0284c7;">
                <i class="fas fa-list"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
              <div>
                <div class="text-secondary fw-medium mb-1" style="font-size: 13px;">Barbers</div>
                <h2 class="m-0 fw-bold text-body" id="dash-barbers" style="line-height: 1;">0</h2>
              </div>
              <div class="d-flex align-items-center justify-content-center rounded-3 fs-4"
                style="width: 48px; height: 48px; background: rgba(217, 119, 6, 0.1); color: #d97706;">
                <i class="fas fa-user-tie"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
              <div>
                <div class="text-secondary fw-medium mb-1" style="font-size: 13px;">Customers</div>
                <h2 class="m-0 fw-bold text-body" id="dash-customers" style="line-height: 1;">0</h2>
              </div>
              <div class="d-flex align-items-center justify-content-center rounded-3 fs-4"
                style="width: 48px; height: 48px; background: rgba(5, 150, 105, 0.1); color: #059669;">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
              <div>
                <div class="text-secondary fw-medium mb-1" style="font-size: 13px;">Services</div>
                <h2 class="m-0 fw-bold text-body" id="dash-services" style="line-height: 1;">0</h2>
              </div>
              <div class="d-flex align-items-center justify-content-center rounded-3 fs-4"
                style="width: 48px; height: 48px; background: rgba(168, 85, 247, 0.15); color: #a855f7;">
                <i class="fas fa-scissors"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-8">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-transparent p-4 border-bottom">
              <h3 class="m-0 fs-5 fw-semibold text-body">Recent Queue Activity</h3>
            </div>
            <div class="card-body p-0 overflow-auto" style="max-height: 350px;" id="dash-queue-list">
              <div class="text-center p-5 text-secondary">
                <i class="fas fa-inbox fs-1 mb-2 d-block"></i>
                <span>No entries yet</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-transparent p-4 border-bottom">
              <h3 class="m-0 fs-5 fw-semibold text-body">Barber Status</h3>
            </div>
            <div class="card-body overflow-auto d-flex flex-column gap-3" style="max-height: 350px;"
              id="dash-barber-list"></div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section" id="page-reports">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h4 class="m-0 fw-semibold text-body">Performance Overview</h4>
        <select class="form-select w-auto shadow-sm" id="reportMonthFilter" onchange="renderReports()">
          <option value="all">All Time</option>
          </select>
      </div>

      <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0 text-center py-4">
            <div class="card-body">
              <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 fs-3"
                style="width: 60px; height: 60px; background: rgba(5, 150, 105, 0.1); color: #059669;">
                <i class="fas fa-wallet"></i>
              </div>
              <h5 class="fw-bold fs-2 text-body mb-1" id="rep-earnings">₱0.00</h5>
              <div class="text-secondary fw-medium small text-uppercase" style="letter-spacing: 1px;">Total Earnings</div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0 text-center py-4">
            <div class="card-body">
              <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 fs-3"
                style="width: 60px; height: 60px; background: rgba(2, 132, 199, 0.1); color: #0284c7;">
                <i class="fas fa-users-viewfinder"></i>
              </div>
              <h5 class="fw-bold fs-2 text-body mb-1" id="rep-customers">0</h5>
              <div class="text-secondary fw-medium small text-uppercase" style="letter-spacing: 1px;">Served Customers</div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0 text-center py-4">
            <div class="card-body">
              <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 fs-3"
                style="width: 60px; height: 60px; background: rgba(168, 85, 247, 0.15); color: #a855f7;">
                <i class="fas fa-crown"></i>
              </div>
              <h5 class="fw-bold fs-4 text-body mb-1 text-truncate px-2" id="rep-top-service">—</h5>
              <div class="text-secondary fw-medium small text-uppercase" style="letter-spacing: 1px;">Top Service</div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card h-100 shadow-sm border-0 text-center py-4">
            <div class="card-body">
              <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 fs-3"
                style="width: 60px; height: 60px; background: rgba(217, 119, 6, 0.1); color: #d97706;">
                <i class="fas fa-star-half-stroke"></i>
              </div>
              <h5 class="fw-bold fs-2 text-body mb-1" id="rep-avg-rating">0.0 <span class="fs-6 text-muted fw-normal">/ 5</span></h5>
              <div class="text-secondary fw-medium small text-uppercase" style="letter-spacing: 1px;">Average Rating</div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-transparent p-4 border-bottom">
              <h3 class="m-0 fs-5 fw-semibold text-body">Barber Performance (Completed Cuts)</h3>
            </div>
            <div class="card-body p-0 overflow-auto" style="max-height: 350px;">
              <ul class="list-group list-group-flush" id="rep-barber-list">
                <li class="list-group-item p-4 text-center text-muted">No data available</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-transparent p-4 border-bottom">
              <h3 class="m-0 fs-5 fw-semibold text-body">Recent Customer Feedback</h3>
            </div>
            <div class="card-body p-0 overflow-auto" style="max-height: 350px;">
              <div class="d-flex flex-column" id="rep-feedback-list">
                <div class="p-4 text-center text-muted">No feedback available</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section" id="page-queue">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div class="d-flex gap-2 flex-wrap">
          <button class="btn btn-secondary active-filter px-4" data-filter="all"
            onclick="filterQueue('all', this)">All</button>
          <button class="btn btn-outline-secondary px-4" data-filter="Waiting"
            onclick="filterQueue('Waiting', this)">Waiting</button>
          <button class="btn btn-outline-secondary px-4" data-filter="Ongoing"
            onclick="filterQueue('Ongoing', this)">Ongoing</button>
          <button class="btn btn-outline-secondary px-4" data-filter="Done"
            onclick="filterQueue('Done', this)">Done</button>
          <button class="btn btn-outline-secondary px-4" data-filter="Cancelled"
            onclick="filterQueue('Cancelled', this)">Cancelled</button>
        </div>
        <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addQueueModal">
          <i class="fas fa-plus fs-5 me-1"></i> Add Entry
        </button>
      </div>

      <div class="card shadow-sm border-0 overflow-auto" style="max-height: 65vh;">
        <table class="table table-hover align-middle m-0" id="queueTable">
          <thead class="border-bottom">
            <tr>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Queue #</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Time In</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Customer</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Service</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Barber</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Hairstyle</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Status</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Actions</th>
            </tr>
          </thead>
          <tbody id="queueTbody">
            <tr>
              <td colspan="8">
                <div class="text-center p-5 text-secondary"><i class="fas fa-table fs-2 mb-2 d-block"></i>No queue
                  entries found.</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="page-section" id="page-barbers">
      <div class="d-flex justify-content-end mb-4">
        <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addBarberModal">
          <i class="fas fa-plus fs-5 me-1"></i> Add Barber
        </button>
      </div>

      <div class="card shadow-sm border-0 overflow-auto" style="max-height: 65vh;">
        <table class="table table-hover align-middle m-0" id="barberTable">
          <thead class="border-bottom">
            <tr>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">ID</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Name</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Status</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Availability Toggle</th>
            </tr>
          </thead>
          <tbody id="barberTbody"></tbody>
        </table>
      </div>
    </section>

    <section class="page-section" id="page-services">
      <div class="d-flex justify-content-end mb-4">
        <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addServiceModal">
          <i class="fas fa-plus fs-5 me-1"></i> Add Service
        </button>
      </div>

      <div class="card shadow-sm border-0 overflow-auto" style="max-height: 65vh;">
        <table class="table table-hover align-middle m-0" id="serviceTable">
          <thead class="border-bottom">
            <tr>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">ID</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Service Name</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Price</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Duration</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Actions</th>
            </tr>
          </thead>
          <tbody id="serviceTbody"></tbody>
        </table>
      </div>
    </section>

    <section class="page-section" id="page-hairstyles">
      <div class="d-flex justify-content-between align-items-center mb-4 gap-3 flex-wrap">
        <div style="flex: 1; max-width: 350px;">
          <input type="text" class="form-control" id="hairstyleSearch" placeholder="Search hairstyles..."
            oninput="searchHairstyles()">
        </div>
        <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addHairstyleModal">
          <i class="fas fa-plus fs-5 me-1"></i> Add Hairstyle
        </button>
      </div>
      <div class="row g-4" id="hairstyleCards"></div>
    </section>

    <section class="page-section" id="page-customers">
      <div class="d-flex justify-content-between align-items-center mb-4 gap-3 flex-wrap">
        <div style="flex: 1; max-width: 350px;">
          <input type="text" class="form-control" id="customerSearch" placeholder="Search customers by name or email..."
            oninput="searchCustomers()">
        </div>
        <button class="btn-gold" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
          <i class="fas fa-plus fs-5 me-1"></i> Add Customer
        </button>
      </div>
      <div class="card shadow-sm border-0 overflow-auto" style="max-height: 65vh;">
        <table class="table table-hover align-middle m-0" id="customerTable">
          <thead class="border-bottom">
            <tr>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">ID</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Customer</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Contact</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Email</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Username</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase"
                style="font-size: 12px; letter-spacing: 0.5px;">Actions</th>
            </tr>
          </thead>
          <tbody id="customerTbody">
            <tr>
              <td colspan="6">
                <div class="text-center p-5 text-secondary"><i class="fas fa-users fs-2 mb-2 d-block"></i>No customers
                  registered.</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="page-section" id="page-ratings">
      <div class="card shadow-sm border-0 overflow-auto" style="max-height: 75vh;">
        <table class="table table-hover align-middle m-0" id="ratingTable">
          <thead class="border-bottom">
            <tr>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase" style="font-size: 12px;">Date</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase" style="font-size: 12px;">Customer</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase" style="font-size: 12px;">Barber</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase" style="font-size: 12px;">Rating</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase" style="font-size: 12px;">Comment</th>
              <th class="py-3 px-4 text-secondary fw-semibold text-uppercase" style="font-size: 12px;">Action</th>
            </tr>
          </thead>
          <tbody id="ratingTbody">
            <tr>
              <td colspan="6" class="text-center p-5 text-secondary">No ratings yet.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

  </main>

  <div class="toast-container position-fixed bottom-0 end-0 p-4" id="toastContainer"></div>

  <div class="modal fade" id="addQueueModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold">Add to Queue</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form onsubmit="event.preventDefault(); addQueueEntry();">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Customer Name</label>
              <select class="form-select" id="q-cust" required>
                <option value="">Select customer...</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Service</label>
              <select class="form-select" id="q-svc" required>
                <option value="">Select service...</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Barber</label>
              <select class="form-select" id="q-barber" required>
                <option value="">Select barber...</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Hairstyle (optional)</label>
              <select class="form-select" id="q-hair">
                <option value="">— None —</option>
              </select>
            </div>
          </div>
          <div class="modal-footer bg-transparent border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-gold">Add Entry</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addBarberModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold">Add New Barber</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form onsubmit="event.preventDefault(); addBarber();">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Barber Name</label>
              <input type="text" class="form-control" id="new-barber-name" placeholder="e.g. Marco" required>
            </div>
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Image URL</label>
              <input type="text" class="form-control" id="new-barber-image" placeholder="images/barber.jpg">
            </div>
            <div class="mb-3">
              <label class="form-label text-secondary fw-medium small">Initial Status</label>
              <select class="form-select" id="new-barber-status" required>
                <option value="Available">Available</option>
                <option value="Busy">Busy</option>
              </select>
            </div>
          </div>
          <div class="modal-footer bg-transparent border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-gold">Add Barber</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold">Add New Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form onsubmit="event.preventDefault(); addService();">
          <div class="modal-body p-4">
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Service Name</label><input
                type="text" class="form-control" id="new-svc-name" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Price (₱)</label><input
                type="number" class="form-control" id="new-svc-price" min="0" step="0.01" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Duration (minutes)</label><input
                type="number" class="form-control" id="new-svc-duration" min="1" required></div>
          </div>
          <div class="modal-footer bg-transparent border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-gold">Add Service</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editServiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold">Edit Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form onsubmit="event.preventDefault(); saveEditService();">
          <div class="modal-body p-4">
            <input type="hidden" id="edit-svc-id">
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Service Name</label><input
                type="text" class="form-control" id="edit-svc-name" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Price (₱)</label><input
                type="number" class="form-control" id="edit-svc-price" min="0" step="0.01" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Duration (minutes)</label><input
                type="number" class="form-control" id="edit-svc-duration" min="1" required></div>
          </div>
          <div class="modal-footer bg-transparent border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-gold">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addHairstyleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold">Add New Hairstyle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form onsubmit="event.preventDefault(); addHairstyle();">
          <div class="modal-body p-4">
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Hairstyle Name</label><input
                type="text" class="form-control" id="new-hair-name" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Description</label><textarea
                class="form-control" id="new-hair-desc" rows="3" required></textarea></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Image URL</label><input
                type="text" class="form-control" id="new-hair-image" placeholder="/images/style.jpg"></div>
          </div>
          <div class="modal-footer bg-transparent border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-gold">Add Hairstyle</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addCustomerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-bottom-0 pb-0">
          <h5 class="modal-title fw-bold">Add New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form onsubmit="event.preventDefault(); addCustomer();">
          <div class="modal-body p-4">
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Full Name</label><input
                type="text" class="form-control" id="new-cust-name" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Contact Number</label><input
                type="text" class="form-control" id="new-cust-contact" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Email</label><input type="email"
                class="form-control" id="new-cust-email" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Username</label><input
                type="text" class="form-control" id="new-cust-username" required></div>
            <div class="mb-3"><label class="form-label text-secondary fw-medium small">Password</label><input
                type="password" class="form-control" id="new-cust-password" required></div>
          </div>
          <div class="modal-footer bg-transparent border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn-gold">Add Customer</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title text-danger fw-bold">Confirm Deletion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body py-3 text-secondary" id="confirmDeleteBody">
          Are you sure you want to delete this record?
          This action cannot be undone.
        </div>
        <div class="modal-footer border-0 pt-0">
          <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-danger px-4 rounded-2" id="confirmDeleteBtn">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let db = { barbers: [], services: [], hairstyles: [], customers: [], queue: [], ratings: [] };
    let currentFilter = 'all';
    let lastDbState = "";
    const apiBase = 'api.php?route=admin-data';
	
    document.addEventListener('DOMContentLoaded', () => {
      const adminId = localStorage.getItem("admin_id");
      if (!adminId) {
        window.location.href = "admin_login.php";
      }

      const monthFilter = document.getElementById('reportMonthFilter');
      if(monthFilter.options.length === 1) { 
        const d = new Date();
        const curMonth = d.getFullYear() + "-" + String(d.getMonth() + 1).padStart(2, '0');
        const monthName = d.toLocaleString('default', { month: 'long', year: 'numeric' });
        monthFilter.innerHTML += `<option value="${curMonth}" selected>Current Month (${monthName})</option>`;
      }

      if (document.documentElement.getAttribute('data-bs-theme') === 'dark') {
        document.getElementById('darkModeBtn').innerHTML = '<i class="fas fa-sun"></i>';
      }
      loadDatabase();
      setInterval(() => {
        document.getElementById('liveClock').textContent = new Date().toLocaleTimeString('en-US', { hour12: true });
      }, 1000);
      setInterval(() => loadDatabase(true), 5000);
    });

    function adminLogout() {
      localStorage.removeItem("admin_id");
      window.location.href = "admin_login.php";
    }

    function toggleDarkMode() {
      const isDark = document.documentElement.getAttribute('data-bs-theme') === 'dark';
      if (isDark) {
        document.documentElement.removeAttribute('data-bs-theme');
        localStorage.setItem('theme', 'light');
        document.getElementById('darkModeBtn').innerHTML = '<i class="fas fa-moon"></i>';
      } else {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        document.getElementById('darkModeBtn').innerHTML = '<i class="fas fa-sun"></i>';
      }
    }

    async function apiPost(action, payload = {}) {
      payload.action = action;
      const res = await fetch(apiBase, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      return res.json();
    }

    async function loadDatabase(isAuto = false) {
      let newData;
      try {
        const res = await fetch(apiBase + '&action=get_all')
        if (!res.ok) throw new Error('Network error');
        newData = await res.json();
      } catch (e) {
        if (!isAuto) showToast('Failed to connect to database', 'danger');
        return;
      }

      try {
        const newDbState = JSON.stringify(newData);
        if (isAuto && newDbState === lastDbState) return;
        db = newData;
        lastDbState = newDbState;
        renderAll();
      } catch (e) {
        console.error("Rendering error:", e);
      }
    }

    function renderAll() {
      renderBarbers();
      renderServices();
      renderHairstyles();
      renderCustomers();
      renderQueueTable();
      updateQueueBadge();
      renderDashboard();
      renderRatings(); 
      renderReports(); 
    }

    function showPage(page, btn) {
      document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));
      document.querySelectorAll('.nav-btn').forEach(b => {
        b.classList.remove('active');
      });
      document.getElementById('page-' + page).classList.add('active');
      if (btn) {
        btn.classList.add('active');
      }

      const titles = { 
        dashboard: 'Dashboard', 
        reports: 'Monthly Performance Report',
        queue: 'Queue Management', 
        barbers: 'Barber Management', 
        services: 'Service Configuration', 
        hairstyles: 'Hairstyle Catalog', 
        customers: 'Customer Records', 
        ratings: 'Customer Ratings' 
      };
      document.getElementById('topbarTitle').textContent = titles[page] || page;

      if (page === 'queue') populateQueueDropdowns();
      if (page === 'dashboard') renderDashboard();
      if (page === 'reports') renderReports(); 
    }

    function showToast(msg, type = 'success') {
      const icons = { success: 'fa-check-circle', danger: 'fa-exclamation-triangle', info: 'fa-info-circle' };
      const toastHtml = `
    <div class="toast align-items-center text-bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body fw-medium"><i class="fas ${icons[type]} me-2"></i>${msg}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  `;
      const container = document.getElementById('toastContainer');
      container.insertAdjacentHTML('beforeend', toastHtml);
      const toastElement = container.lastElementChild;
      const bsToast = new bootstrap.Toast(toastElement, { delay: 4000 });
      bsToast.show();
      toastElement.addEventListener('hidden.bs.toast', () => toastElement.remove());
    }

    function sortTable(tableId, colIndex) {
      const table = document.getElementById(tableId);
      const tbody = table.tBodies[0];
      const rows = Array.from(tbody.querySelectorAll("tr"));
      const th = table.querySelectorAll("th")[colIndex];

      if (rows.length === 1 && rows[0].cells.length === 1) return;

      const isAsc = th.classList.contains("asc");
      table.querySelectorAll("th").forEach(t => t.classList.remove("asc", "desc"));
      th.classList.toggle(isAsc ? "desc" : "asc");

      rows.sort((a, b) => {
        let aText = a.cells[colIndex].textContent.trim();
        let bText = b.cells[colIndex].textContent.trim();

        let aNum = parseFloat(aText.replace(/[^0-9.-]+/g, ""));
        let bNum = parseFloat(bText.replace(/[^0-9.-]+/g, ""));

        if (!isNaN(aNum) && !isNaN(bNum)) {
          return isAsc ? bNum - aNum : aNum - bNum;
        }
        return isAsc ? bText.localeCompare(aText) : aText.localeCompare(bText);
      });
      tbody.append(...rows);
    }

    function populateQueueDropdowns() {
      document.getElementById('q-cust').innerHTML = '<option value="">Select customer...</option>' + db.customers.map(c => `<option value="${c.customer_id}">${c.customer_name}</option>`).join('');
      document.getElementById('q-svc').innerHTML = '<option value="">Select service...</option>' + db.services.map(s => `<option value="${s.service_id}">${s.service_name} — ₱${s.price}</option>`).join('');
      document.getElementById('q-barber').innerHTML = '<option value="">Select barber...</option>' + db.barbers.map(b => `<option value="${b.barber_id}">${b.barber_name} (${b.status})</option>`).join('');
      document.getElementById('q-hair').innerHTML = '<option value="">— None —</option>' + db.hairstyles.map(h => `<option value="${h.hairstyle_id}">${h.hairstyle_name}</option>`).join('');
    }

    async function addQueueEntry() {
      const custId = document.getElementById('q-cust').value;
      const svcId = document.getElementById('q-svc').value;
      const barberId = document.getElementById('q-barber').value;
      const hairId = document.getElementById('q-hair').value;
      await apiPost('add_queue', { custId, svcId, barberId, hairId });
      bootstrap.Modal.getInstance(document.getElementById('addQueueModal')).hide();
      showToast('Entry added to queue', 'success');
      loadDatabase();
    }

    function renderQueueTable() {
      const tbody = document.getElementById('queueTbody');
      const filtered = currentFilter === 'all' ? db.queue : db.queue.filter(q => q.status === currentFilter);
      if (!filtered.length) {
        tbody.innerHTML = `<tr><td colspan="8"><div class="text-center p-5 text-secondary"><i class="fas fa-table fs-2 mb-2 d-block"></i>No queue entries found.</div></td></tr>`;
        return;
      }

      const statusColors = { 'Waiting': 'text-bg-warning', 'Ongoing': 'text-bg-info', 'Done': 'text-bg-success', 'Cancelled': 'text-bg-danger' };
      tbody.innerHTML = filtered.map(q => {
        const cust = db.customers.find(c => c.customer_id == q.customer_id);
        const svc = db.services.find(s => s.service_id == q.service_id);
        const barber = db.barbers.find(b => b.barber_id == q.barber_id);
        const hair = db.hairstyles.find(h => h.hairstyle_id == q.hairstyle_id);

        let formattedTime = '—';
        if (q.time_in) {
          const d = new Date(q.time_in);
          formattedTime = d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        return `<tr>
      <td class="px-4 py-3 fw-semibold">#${String(q.queue_number || q.queue_id).padStart(3, '0')}</td>
      <td class="px-4 py-3 text-secondary">${formattedTime}</td>
      <td class="px-4 py-3">
        <div class="d-flex align-items-center gap-2">
          <div class="rounded-circle bg-body-tertiary border d-flex align-items-center justify-content-center text-secondary fw-semibold flex-shrink-0" style="width: 32px; height: 32px;">${(cust?.customer_name || '?')[0].toUpperCase()}</div>
          <span class="fw-medium">${cust?.customer_name || '—'}</span>
        </div>
      </td>
      <td class="px-4 py-3">${svc?.service_name || '—'}</td>
      <td class="px-4 py-3">
        <div class="d-flex align-items-center gap-2">
          <img src="${barber?.image || 'https://via.placeholder.com/32'}" class="rounded-circle border" style="width: 24px; height: 24px; object-fit: cover;">
          <span>${barber?.barber_name || '—'}</span>
        </div>
      </td>
      <td class="px-4 py-3">${hair?.hairstyle_name || '<span class="text-muted">—</span>'}</td>
      <td class="px-4 py-3"><select class="form-select form-select-sm border-0 shadow-sm fw-medium rounded-pill px-3 ${statusColors[q.status]}" style="width:auto;" onchange="changeQueueStatus(${q.queue_id}, this.value)">
        <option value="Waiting" ${q.status === 'Waiting' ? 'selected' : ''}>Waiting</option>
        <option value="Ongoing" ${q.status === 'Ongoing' ? 'selected' : ''}>Ongoing</option>
        <option value="Done" ${q.status === 'Done' ? 'selected' : ''}>Done</option>
        <option value="Cancelled" ${q.status === 'Cancelled' ? 'selected' : ''}>Cancelled</option>
      </select></td>
      <td class="px-4 py-3"><button class="btn btn-sm btn-outline-danger border-0" onclick="deleteQueue(${q.queue_id})"><i class="fas fa-trash"></i></button></td>
    </tr>`;
      }).join('');
    }

    async function changeQueueStatus(id, newStatus) {
      await apiPost('update_queue_status', { id, status: newStatus });
      loadDatabase();
    }

    function deleteQueue(id) {
      confirmDelete('Remove queue entry?', async () => {
        await apiPost('delete_queue', { id });
        loadDatabase();
        showToast('Entry removed', 'success');
      });
    }

    function updateQueueBadge() {
      const active = db.queue.filter(q => q.status === 'Waiting' || q.status === 'Ongoing').length;
      const badge = document.getElementById('queueBadge');
      badge.textContent = active;
      badge.style.display = active ? 'block' : 'none';
      document.getElementById('dash-queue').textContent = active;
    }

    function filterQueue(f, btn) {
      currentFilter = f;
      document.querySelectorAll('[data-filter]').forEach(b => {
        b.classList.remove('active-filter', 'btn-secondary');
        b.classList.add('btn-outline-secondary');
      });
      btn.classList.remove('btn-outline-secondary');
      btn.classList.add('btn-secondary', 'active-filter');
      renderQueueTable();
    }

    function renderBarbers() {
      const tbody = document.getElementById('barberTbody')
      if (!db.barbers.length) {
        tbody.innerHTML = `<tr><td colspan="4"><div class="text-center p-5 text-secondary"><i class="fas fa-user-tie fs-2 mb-2 d-block"></i>No barbers found</div></td></tr>`
        return
      }
      tbody.innerHTML = db.barbers.map(b => `
    <tr>
      <td class="px-4 py-3 text-secondary fw-medium">#${b.barber_id}</td>
      <td class="px-4 py-3">
        <div class="d-flex align-items-center gap-2">
          <img src="${b.image || 'https://placehold.co/32x32'}" onerror="this.src='https://placehold.co/32x32'" class="rounded-circle border" width="32" height="32">
          <span class="fw-semibold">${b.barber_name}</span>
        </div>
      </td>
      <td class="px-4 py-3"><span class="badge rounded-pill ${b.status === 'Available' ? 'text-bg-success' : 'text-bg-warning'}">${b.status}</span></td>
      <td class="px-4 py-3">
        <div class="d-flex gap-3 align-items-center">
          <div class="form-check form-switch m-0 fs-5">
            <input class="form-check-input" type="checkbox" role="switch" ${b.status === 'Available' ? 'checked' : ''} onchange="toggleBarberStatus(${b.barber_id}, this.checked)">
          </div>
          <button class="btn btn-sm btn-outline-danger border-0" onclick="deleteBarber(${b.barber_id})"><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>
  `).join('')
    }

    async function toggleBarberStatus(id, available) {
      await apiPost('toggle_barber', { id, status: available ? 'Available' : 'Busy' });
      loadDatabase();
    }

    async function addBarber() {
      const name = document.getElementById('new-barber-name').value.trim();
      const status = document.getElementById('new-barber-status').value;
      const image = document.getElementById('new-barber-image').value.trim();
      await apiPost('add_barber', { name, status, image });
      bootstrap.Modal.getInstance(document.getElementById('addBarberModal')).hide();
      document.getElementById('new-barber-name').value = '';
      document.getElementById('new-barber-image').value = '';
      showToast('Barber added', 'success');
      loadDatabase();
    }

    function deleteBarber(id) {
      confirmDelete('Delete barber?', async () => {
        const res = await apiPost('delete_barber', { id });
        
        if (res.success) {
          lastDbState = ""; // Force a refresh
          await loadDatabase();
          showToast('Barber and associated data removed', 'success');
        } else {
          showToast('Error: ' + (res.message || 'Could not delete barber'), 'danger');
        }
      });
    }

    function renderServices() {
      const tbody = document.getElementById('serviceTbody');
      if (!db.services.length) {
        tbody.innerHTML = `<tr><td colspan="5"><div class="text-center p-5 text-secondary"><i class="fas fa-scissors fs-2 mb-2 d-block"></i>No services found.</div></td></tr>`;
        return;
      }
      tbody.innerHTML = db.services.map(s => `
    <tr>
      <td class="px-4 py-3 text-secondary fw-medium">#${s.service_id}</td>
      <td class="px-4 py-3 fw-semibold">${s.service_name}</td>
      <td class="px-4 py-3 fw-bold text-success fs-6">₱${Number(s.price).toFixed(2)}</td>
      <td class="px-4 py-3 text-secondary">${s.duration_minutes} min</td>
      <td class="px-4 py-3">
        <div class="d-flex gap-1">
            <button class="btn btn-sm btn-outline-secondary border-0" onclick="openEditService(${s.service_id})"><i class="fas fa-pen"></i></button>
            <button class="btn btn-sm btn-outline-danger border-0" onclick="deleteService(${s.service_id})"><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>
  `).join('');
    }

    async function addService() {
      const name = document.getElementById('new-svc-name').value.trim();
      const price = document.getElementById('new-svc-price').value;
      const duration = document.getElementById('new-svc-duration').value;
      await apiPost('add_service', { name, price, duration });
      bootstrap.Modal.getInstance(document.getElementById('addServiceModal')).hide();
      ['new-svc-name', 'new-svc-price', 'new-svc-duration'].forEach(id => document.getElementById(id).value = '');
      showToast('Service added', 'success');
      loadDatabase();
    }

    function openEditService(id) {
      const s = db.services.find(x => x.service_id == id);
      if (!s) return;
      document.getElementById('edit-svc-id').value = s.service_id;
      document.getElementById('edit-svc-name').value = s.service_name;
      document.getElementById('edit-svc-price').value = s.price;
      document.getElementById('edit-svc-duration').value = s.duration_minutes;
      bootstrap.Modal.getOrCreateInstance(document.getElementById('editServiceModal')).show();
    }

    async function saveEditService() {
      const id = document.getElementById('edit-svc-id').value;
      const name = document.getElementById('edit-svc-name').value.trim();
      const price = document.getElementById('edit-svc-price').value;
      const duration = document.getElementById('edit-svc-duration').value;
      await apiPost('edit_service', { id, name, price, duration });
      bootstrap.Modal.getInstance(document.getElementById('editServiceModal')).hide();
      showToast('Service updated', 'success');
      loadDatabase();
    }

    function deleteService(id) {
      confirmDelete('Delete service?', async () => {
        await apiPost('delete_service', { id });
        loadDatabase();
        showToast('Service removed', 'success');
      });
    }

    function searchHairstyles() {
      const q = document.getElementById('hairstyleSearch').value.toLowerCase();
      renderHairstyles(db.hairstyles.filter(h => h.hairstyle_name.toLowerCase().includes(q) || h.description.toLowerCase().includes(q)));
    }

    function renderHairstyles(list) {
      const data = list || db.hairstyles
      const container = document.getElementById('hairstyleCards')

      if (!data.length) {
        container.innerHTML = `<div class="col-12"><div class="text-center p-5 border rounded-3 text-secondary"><i class="fas fa-spray-can-sparkles fs-2 mb-2 d-block"></i>No hairstyles found</div></div>`
        return
      }

      container.innerHTML = data.map((h) => {
        return `
    <div class="col-md-6 col-xl-3">
      <div class="card h-100 shadow-sm border-0 text-center py-4 px-2">
        <div class="card-body d-flex flex-column align-items-center">
          <img src="${h.image || 'https://placehold.co/64x64'}" onerror="this.src='https://placehold.co/64x64'" class="rounded-4 shadow-sm mb-3 border" width="64" height="64" alt="Hairstyle Image">
          <h5 class="fw-semibold text-truncate w-100 mb-2" title="${h.hairstyle_name}">${h.hairstyle_name}</h5>
          <p class="text-secondary small mb-4 flex-grow-1 text-truncate" title="${h.description}">${h.description}</p>
          <button class="btn btn-sm btn-outline-danger border-0 w-100 mt-auto" onclick="deleteHairstyle(${h.hairstyle_id})"><i class="fas fa-trash me-1"></i> Remove</button>
        </div>
      </div>
    </div>
  `}).join('')
    }
    async function addHairstyle() {
      const name = document.getElementById('new-hair-name').value.trim();
      const desc = document.getElementById('new-hair-desc').value.trim();
      const image = document.getElementById('new-hair-image').value.trim();
      await apiPost('add_hairstyle', { name, desc, image });
      bootstrap.Modal.getInstance(document.getElementById('addHairstyleModal')).hide();
      document.getElementById('new-hair-name').value = '';
      document.getElementById('new-hair-desc').value = '';
      document.getElementById('new-hair-image').value = '';
      showToast('Hairstyle added', 'success');
      loadDatabase();
    }

    function deleteHairstyle(id) {
      confirmDelete('Delete hairstyle?', async () => {
        await apiPost('delete_hairstyle', { id });
        loadDatabase();
        showToast('Hairstyle removed', 'success');
      });
    }

    function renderCustomers(list) {
      const data = list || db.customers;
      const tbody = document.getElementById('customerTbody');
      if (!data.length) {
        tbody.innerHTML = `<tr><td colspan="6"><div class="text-center p-5 text-secondary"><i class="fas fa-users fs-2 mb-2 d-block"></i>No customers registered.</div></td></tr>`;
        return;
      }
      tbody.innerHTML = data.map(c => `
    <tr>
      <td class="px-4 py-3 text-secondary fw-medium">#${c.customer_id}</td>
      <td class="px-4 py-3">
        <div class="d-flex align-items-center gap-2">
          <div class="rounded-circle bg-body-tertiary border d-flex align-items-center justify-content-center text-secondary fw-semibold flex-shrink-0" style="width: 32px; height: 32px;">${c.customer_name[0].toUpperCase()}</div>
          <span class="fw-semibold text-body">${c.customer_name}</span>
        </div>
      </td>
      <td class="px-4 py-3 text-secondary">${c.contact_number || '—'}</td>
      <td class="px-4 py-3 text-secondary">${c.email || '—'}</td>
      <td class="px-4 py-3 text-secondary">@${c.username || '—'}</td>
      <td class="px-4 py-3"><button class="btn btn-sm btn-outline-danger border-0" onclick="deleteCustomer(${c.customer_id})"><i class="fas fa-trash"></i></button></td>
    </tr>
  `).join('');
      document.getElementById('dash-customers').textContent = db.customers.length;
    }

    async function addCustomer() {
      const name = document.getElementById('new-cust-name').value.trim();
      const contact = document.getElementById('new-cust-contact').value.trim();
      const email = document.getElementById('new-cust-email').value.trim();
      const username = document.getElementById('new-cust-username').value.trim();
      const password = document.getElementById('new-cust-password').value;
      await apiPost('add_customer', { name, contact, email, username, password });
      bootstrap.Modal.getInstance(document.getElementById('addCustomerModal')).hide();
      ['new-cust-name', 'new-cust-contact', 'new-cust-email', 'new-cust-username', 'new-cust-password'].forEach(id => document.getElementById(id).value = '');
      showToast('Customer added', 'success');
      loadDatabase();
    }

    function deleteCustomer(id) {
      confirmDelete('Delete customer?', async () => {
        await apiPost('delete_customer', { id });
        loadDatabase();
        showToast('Customer removed', 'success');
      });
    }

    function searchCustomers() {
      const q = document.getElementById('customerSearch').value.toLowerCase();
      renderCustomers(db.customers.filter(c => c.customer_name.toLowerCase().includes(q) || (c.email || '').toLowerCase().includes(q)));
    }

    function renderRatings() {
      const tbody = document.getElementById('ratingTbody');
      const data = db.ratings || [];

      if (!data.length) {
        tbody.innerHTML = `<tr><td colspan="6"><div class="text-center p-5 text-secondary"><i class="fas fa-star fs-2 mb-2 d-block"></i>No ratings found.</div></td></tr>`;
        return;
      }

      tbody.innerHTML = data.map(r => {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
          stars += `<i class="fas fa-star ${i <= r.rating ? 'text-warning' : 'text-muted'}"></i>`;
        }
        const date = new Date(r.created_at).toLocaleDateString();

        return `
          <tr>
            <td class="px-4 py-3 text-secondary">${date}</td>
            <td class="px-4 py-3 fw-medium">${r.customer_name}</td>
            <td class="px-4 py-3">${r.barber_name}</td>
            <td class="px-4 py-3 fs-6">${stars}</td>
            <td class="px-4 py-3 text-secondary">${r.comment || '<span class="text-muted">—</span>'}</td>
            <td class="px-4 py-3">
              <button class="btn btn-sm btn-outline-danger border-0" onclick="deleteRating(${r.rating_id})"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        `;
      }).join('');
    }

    async function deleteRating(id) {
      confirmDelete('Delete this rating?', async () => {
        await apiPost('delete_rating', { id });
        loadDatabase();
        showToast('Rating removed', 'success');
      });
    }

    function renderDashboard() {
      document.getElementById('dash-customers').textContent = db.customers.length;
      document.getElementById('dash-barbers').textContent = db.barbers.length;
      document.getElementById('dash-services').textContent = db.services.length;

      const statusColors = { 'Waiting': 'text-bg-warning', 'Ongoing': 'text-bg-info', 'Done': 'text-bg-success', 'Cancelled': 'text-bg-danger' };
      const recent = [...db.queue].reverse().slice(0, 10);
      const qList = document.getElementById('dash-queue-list');

      if (!recent.length) {
        qList.innerHTML = `<div class="text-center p-5 text-secondary"><i class="fas fa-inbox fs-1 mb-2 d-block"></i><span>No entries yet</span></div>`;
      } else {
        qList.innerHTML = recent.map(q => {
          const cust = db.customers.find(c => c.customer_id == q.customer_id);
          const svc = db.services.find(s => s.service_id == q.service_id);
          const barber = db.barbers.find(b => b.barber_id == q.barber_id);
          return `<div class="d-flex align-items-center gap-3 p-4 border-bottom">
          <span class="fw-bold fs-5 text-body">#${String(q.queue_number || q.queue_id).padStart(3, '0')}</span>
          <div class="flex-grow-1 ms-2 overflow-hidden">
            <div class="fw-semibold text-body text-truncate">${cust?.customer_name || '?'}</div>
            <div class="small text-secondary text-truncate">${svc?.service_name} · ${barber?.barber_name}</div>
          </div>
          <span class="badge rounded-pill ${statusColors[q.status]}">${q.status}</span>
        </div>`;
        }).join('');
      }

      document.getElementById('dash-barber-list').innerHTML = db.barbers.map(b => `
    <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
        <img src="${b.image || 'https://via.placeholder.com/36'}" class="rounded-circle border shadow-sm" style="width: 36px; height: 36px; object-fit: cover;">
        <div class="fw-semibold flex-grow-1 text-truncate text-body">${b.barber_name}</div>
        <span class="badge rounded-pill ${b.status === 'Available' ? 'text-bg-success' : 'text-bg-warning'}">${b.status}</span>
    </div>
  `).join('');
    }

    function renderReports() {
      if (!db.queue || !db.services || !db.ratings || !db.barbers) return;

      const filterVal = document.getElementById('reportMonthFilter').value;
      
      let doneQueue = db.queue.filter(q => q.status === 'Done');
      if (filterVal !== 'all') {
          const [y, m] = filterVal.split('-');
          doneQueue = doneQueue.filter(q => {
              const d = new Date(q.time_in);
              return d.getFullYear() == y && (d.getMonth() + 1) == parseInt(m);
          });
      }

      let totalEarnings = 0;
      let serviceCounts = {};
      let barberCounts = {};

      doneQueue.forEach(q => {
          const svc = db.services.find(s => s.service_id == q.service_id);
          if(svc) {
            totalEarnings += parseFloat(svc.price);
            serviceCounts[svc.service_name] = (serviceCounts[svc.service_name] || 0) + 1;
          }
          const barber = db.barbers.find(b => b.barber_id == q.barber_id);
          if(barber) {
            barberCounts[barber.barber_name] = (barberCounts[barber.barber_name] || 0) + 1;
          }
      });

      let topService = "—";
      let maxSvcCount = 0;
      for(let s in serviceCounts) {
          if(serviceCounts[s] > maxSvcCount) { maxSvcCount = serviceCounts[s]; topService = s; }
      }

      let filteredRatings = db.ratings;
      if (filterVal !== 'all') {
          const [y, m] = filterVal.split('-');
          filteredRatings = filteredRatings.filter(r => {
              const d = new Date(r.created_at);
              return d.getFullYear() == y && (d.getMonth() + 1) == parseInt(m);
          });
      }

      let avgRating = 0;
      if(filteredRatings.length > 0) {
          const sum = filteredRatings.reduce((a, b) => a + b.rating, 0);
          avgRating = (sum / filteredRatings.length).toFixed(1);
      }

      document.getElementById('rep-earnings').innerText = `₱${totalEarnings.toFixed(2)}`;
      document.getElementById('rep-customers').innerText = doneQueue.length;
      document.getElementById('rep-top-service').innerText = topService;
      document.getElementById('rep-avg-rating').innerHTML = `${avgRating} <span class="fs-6 text-muted fw-normal">/ 5</span>`;

      const sortedBarbers = Object.keys(barberCounts).sort((a,b) => barberCounts[b] - barberCounts[a]);
      let barberHtml = sortedBarbers.map(b => {
          return `
          <li class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center">
            <span class="fw-medium text-body">${b}</span>
            <span class="badge bg-secondary rounded-pill">${barberCounts[b]} cuts</span>
          </li>`;
      }).join('');
      
      if(!barberHtml) barberHtml = '<li class="list-group-item p-4 text-center text-muted">No completed cuts for this period.</li>';
      document.getElementById('rep-barber-list').innerHTML = barberHtml;

      const recentFeedback = [...filteredRatings].filter(r => r.comment && r.comment.trim() !== "").reverse().slice(0, 5);
      let feedbackHtml = recentFeedback.map(r => {
          let stars = '';
          for (let i = 1; i <= 5; i++) {
            stars += `<i class="fas fa-star ${i <= r.rating ? 'text-warning' : 'text-muted'} fs-6"></i>`;
          }
          return `
          <div class="p-4 border-bottom">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="fw-semibold text-body">${r.customer_name}</span>
              <div>${stars}</div>
            </div>
            <div class="text-secondary small mb-2">Barber: ${r.barber_name}</div>
            <div class="fst-italic text-body">"${r.comment}"</div>
          </div>`;
      }).join('');

      if(!feedbackHtml) feedbackHtml = '<div class="p-4 text-center text-muted">No text feedback available for this period.</div>';
      document.getElementById('rep-feedback-list').innerHTML = feedbackHtml;
    }

    let _deleteCallback = null;
    function confirmDelete(msg, cb) {
      document.getElementById('confirmDeleteBody').textContent = msg;
      _deleteCallback = cb;
      bootstrap.Modal.getOrCreateInstance(document.getElementById('confirmDeleteModal')).show();
    }
    document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
      if (_deleteCallback) { _deleteCallback(); _deleteCallback = null; }
      bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal')).hide();
    });
  </script>
</body>

</html>
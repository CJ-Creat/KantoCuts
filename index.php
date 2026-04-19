<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanto Cuts Barbershop</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary-color: #D4AF37;
            --dark-color: #111111;
            --light-bg: #F9F9F9;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: #333;
        }

        .navbar {
            background-color: rgba(17, 17, 17, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 400;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("https://images.unsplash.com/photo-1585747860715-2ba37e788b70?q=80&w=2072&auto=format&fit=crop");
            height: 100vh;
            min-height: 600px;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.2rem;
            letter-spacing: 2px;
            margin-bottom: 30px;
            animation: fadeInUp 1.2s ease;
        }

        .btn-book {
            background-color: var(--primary-color);
            color: #000;
            border: none;
            padding: 15px 40px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            transition: all 0.3s ease;
            animation: fadeInUp 1.4s ease;
        }

        .btn-book:hover {
            background-color: #fff;
            color: #000;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .stat-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            border-top: 4px solid transparent;
            cursor: pointer;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .stat-card.barbers-card {
            border-top-color: #D4AF37;
        }

        .stat-card.services-card {
            border-top-color: #6c757d;
        }

        .stat-card.styles-card {
            border-top-color: #0dcaf0;
        }

        .stat-card.waiting-card {
            border-top-color: #dc3545;
        }

        .stat-card h3 {
            font-size: 3rem;
            font-weight: 700;
            color: #333;
        }

        .stat-card p {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            color: #777;
            margin-bottom: 0;
        }

        .booking-section {
            background-color: #fff;
        }

        .form-control,
        .form-select {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 12px 20px;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .btn-submit {
            background-color: #000;
            color: #fff;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background-color: var(--primary-color);
            color: #000;
        }

        .table-container {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--card-shadow);
        }

        .table thead th {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 15px;
            font-weight: 500;
        }

        .table tbody tr {
            transition: background-color 0.2s;
        }

        .table tbody tr:hover {
            background-color: rgba(212, 175, 55, 0.05);
        }

        .status-waiting {
            color: #f0ad4e;
            font-weight: 600;
        }

        .status-ongoing {
            color: #0dcaf0;
            font-weight: 600;
        }

        .status-done {
            color: #198754;
            font-weight: 600;
        }

        .carousel-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        .barber-img {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        .modal-content {
            border: none;
            border-radius: 15px;
        }

        .modal-header {
            background-color: #000;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
        }

        .service-item {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s;
            height: 100%;
        }

        .service-item:hover {
            border-color: var(--primary-color);
            background-color: #fff;
        }

        .waiting-list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .waiting-list-item:last-child {
            border-bottom: none;
        }

        .star-rating {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating .star.active {
            color: #D4AF37;
        }

        .btn-rate {
            font-size: 0.8rem;
            padding: 5px 10px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-cut me-2"></i>Kanto Cuts</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#booking">Book Now</a></li>

                    <li class="nav-item" id="nav-login">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    </li>
                    <li class="nav-item" id="nav-logout" style="display: none;">
                        <a class="nav-link" onclick="logout()" style="cursor:pointer;"><i
                                class="fas fa-sign-out-alt me-1"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container text-center">
            <h1>Kanto Cuts</h1>
            <p>Experience Professional Grooming Like Never Before</p>
            <a href="#booking" class="btn btn-book">Book Appointment</a>
        </div>
    </section>

    <section class="section" id="dashboard">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Shop Dashboard</h2>
            </div>
            <div class="row g-4 text-center">

                <div class="col-md-3 col-6">
                    <div class="stat-card barbers-card" data-bs-toggle="modal" data-bs-target="#barberModal">
                        <i class="fas fa-user-tie fa-2x mb-3 text-warning"></i>
                        <h3 id="totalBarbers">0</h3>
                        <p>Barbers</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="stat-card services-card" data-bs-toggle="modal" data-bs-target="#serviceModal">
                        <i class="fas fa-scissors fa-2x mb-3 text-secondary"></i>
                        <h3 id="totalServices">0</h3>
                        <p>Services</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="stat-card styles-card" data-bs-toggle="modal" data-bs-target="#hairstyleModal">
                        <i class="fas fa-spray-can-sparkles fa-2x mb-3 text-info"></i>
                        <h3 id="totalStyles">0</h3>
                        <p>Hairstyles</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="stat-card waiting-card" data-bs-toggle="modal" data-bs-target="#waitingModal">
                        <i class="fas fa-hourglass-half fa-2x mb-3 text-danger"></i>
                        <h3 id="totalQueue">0</h3>
                        <p>Waiting</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="barberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Our Barbers</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="barberCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="barberCarouselInner"></div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#barberCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#barberCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List of Services</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row" id="serviceModalContent"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hairstyleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hairstyle Gallery</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="hairstyleCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="hairstyleCarouselInner"></div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#hairstyleCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#hairstyleCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="waitingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Current Queue</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" id="waitingModalContent"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ratingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rate Your Experience</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <input type="hidden" id="rating_queue_id">
                    <input type="hidden" id="rating_barber_id">

                    <h4 id="ratingBarberName" class="mb-3"></h4>

                    <div class="star-rating mb-3" id="starContainer">
                        <i class="fas fa-star star" data-value="1"></i>
                        <i class="fas fa-star star" data-value="2"></i>
                        <i class="fas fa-star star" data-value="3"></i>
                        <i class="fas fa-star star" data-value="4"></i>
                        <i class="fas fa-star star" data-value="5"></i>
                    </div>
                    <input type="hidden" id="selectedRating" value="0">

                    <textarea id="ratingComment" class="form-control mb-3" rows="3"
                        placeholder="Leave a comment (optional)"></textarea>

                    <button class="btn btn-submit w-100" onclick="submitRating()">Submit Rating</button>
                </div>
            </div>
        </div>
    </div>

    <section class="section booking-section" id="booking">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Book Queue</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-0 shadow-lg p-4">
                        <form id="queueForm">
                            <div class="mb-3">
                                <label class="form-label fw-500">Customer ID</label>
                                <input type="number" id="customer_id" class="form-control"
                                    placeholder="Login to auto-fill" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-500">Select Service</label>
                                <select id="service" class="form-select"></select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-500">Select Hairstyle</label>
                                <select id="hairstyle" class="form-select"></select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-500">Select Barber</label>
                                <select id="barber" class="form-select"></select>
                            </div>
                            <button class="btn btn-submit w-100"><i class="fas fa-calendar-check me-2"></i>Join
                                Queue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Current Queue</h2>
            </div>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Hairstyle</th>
                                <th>Barber</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="queueTable"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 Kanto Cuts Barbershop. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const api = "api.php?route=";
        let lastQueueState = "";

        async function loadServices() {
            let res = await fetch(api + "services")
            let data = await res.json()
            document.getElementById("totalServices").innerText = data.length

            let options = data.map(s => `<option value="${s.service_id}">${s.service_name} (₱${s.price})</option>`).join("")
            document.getElementById("service").innerHTML = options

            let modalContent = ""
            data.forEach(s => {
                modalContent += `
                <div class="col-md-6 mb-3">
                    <div class="service-item shadow-sm">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">${s.service_name}</h5>
                                <small class="text-muted"><i class="far fa-clock me-1"></i>${s.duration_minutes} mins</small>
                            </div>
                            <h4 class="text-warning mb-0">₱${s.price}</h4>
                        </div>
                    </div>
                </div>`
            })
            document.getElementById("serviceModalContent").innerHTML = modalContent
        }

        async function loadBarbers() {
            let res = await fetch(api + "barbers")
            let data = await res.json()
            document.getElementById("totalBarbers").innerText = data.length

            let options = data.map(b => `<option value="${b.barber_id}">${b.barber_name}</option>`).join("")
            document.getElementById("barber").innerHTML = options

            let carouselItems = ""
            data.forEach((b, index) => {
                let imgUrl = b.image ? b.image : "https://via.placeholder.com/500x400?text=Barber"
                let activeClass = index === 0 ? "active" : ""

                carouselItems += `
                <div class="carousel-item ${activeClass}">
                    <img src="${imgUrl}" class="barber-img" alt="${b.barber_name}">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded-pill px-4 py-2" style="bottom: 20px">
                        <h5 class="mb-0">${b.barber_name}</h5>
                    </div>
                </div>`
            })
            document.getElementById("barberCarouselInner").innerHTML = carouselItems
        }

        async function loadStyles() {
            let res = await fetch(api + "hairstyles")
            let data = await res.json()
            document.getElementById("totalStyles").innerText = data.length

            let options = data.map(s => `<option value="${s.hairstyle_id}">${s.hairstyle_name}</option>`).join("")
            document.getElementById("hairstyle").innerHTML = options

            let carouselItems = ""
            data.forEach((h, index) => {
                let imgUrl = h.image ? h.image : "https://via.placeholder.com/500x400?text=No+Image"
                let activeClass = index === 0 ? "active" : ""

                carouselItems += `
                <div class="carousel-item ${activeClass}">
                    <img src="${imgUrl}" class="carousel-img" alt="${h.hairstyle_name}">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded-pill px-4 py-2" style="bottom: 20px">
                        <h5 class="mb-0">${h.hairstyle_name}</h5>
                    </div>
                </div>`
            })
            document.getElementById("hairstyleCarouselInner").innerHTML = carouselItems
        }

        async function loadQueue(isAuto = false) {
            try {
                let res = await fetch(api + "queue")
                let rawData = await res.json()

                const currentCustomerId = localStorage.getItem("customer_id");


                let data = rawData.filter(q => {
                    if (q.status !== 'Done') return true;
                    if (q.status === 'Done' && q.customer_id == currentCustomerId && !q.is_rated) return true;
                    return false;
                });

                const newQueueState = JSON.stringify(data);
                if (isAuto && newQueueState === lastQueueState) return;
                lastQueueState = newQueueState;

                const activeQueueCount = data.filter(q => q.status !== 'Done').length;
                document.getElementById("totalQueue").innerText = activeQueueCount;

                let html = ""
                data.forEach(q => {
                    let statusClass = ""
                    if (q.status === 'Waiting') statusClass = "status-waiting"
                    else if (q.status === 'Ongoing') statusClass = "status-ongoing"
                    else if (q.status === 'Done') statusClass = "status-done"

                    let actionBtn = "<span class='text-muted'>-</span>";
                    
                    if (q.status === 'Done' && currentCustomerId == q.customer_id && !q.is_rated) {
                        actionBtn = `<button class="btn btn-warning btn-rate text-dark fw-bold" onclick="openRatingModal(${q.queue_id}, ${q.barber_id}, '${q.barber_name}')">Rate Service</button>`;
                    }

                    html += `
                    <tr>
                        <td><strong>${q.queue_number}</strong></td>
                        <td>${q.customer_name}</td>
                        <td>${q.service_name}</td>
                        <td>${q.hairstyle_name || '<span class="text-muted">—</span>'}</td>
                        <td>${q.barber_name}</td>
                        <td class="${statusClass}">${q.status}</td>
                        <td>${actionBtn}</td>
                    </tr>`
                })
                document.getElementById("queueTable").innerHTML = html

                let waitingHtml = ""
                let activeData = data.filter(q => q.status !== 'Done');
                if (activeData.length === 0) {
                    waitingHtml = "<div class='p-4 text-center text-muted'>No customers in queue</div>"
                } else {
                    activeData.forEach(q => {
                        waitingHtml += `
                        <div class="waiting-list-item">
                            <div>
                                <h6 class="mb-0">#${q.queue_number} - ${q.customer_name}</h6>
                                <small class="text-muted">${q.service_name}</small>
                            </div>
                            <span class="badge bg-${q.status === 'Waiting' ? 'warning text-dark' : 'info'}">${q.status}</span>
                        </div>`
                    })
                }
                document.getElementById("waitingModalContent").innerHTML = waitingHtml
            } catch (err) {
                console.error("Error loading queue:", err);
            }
        }

        document.querySelectorAll(".star-rating .star").forEach(star => {
            star.addEventListener("click", function () {
                const value = this.getAttribute("data-value");
                document.getElementById("selectedRating").value = value;

                document.querySelectorAll(".star-rating .star").forEach(s => {
                    if (s.getAttribute("data-value") <= value) {
                        s.classList.add("active");
                    } else {
                        s.classList.remove("active");
                    }
                });
            });
        });

        function openRatingModal(queueId, barberId, barberName) {
            document.getElementById("rating_queue_id").value = queueId;
            document.getElementById("rating_barber_id").value = barberId;
            document.getElementById("ratingBarberName").innerText = barberName;
            document.getElementById("selectedRating").value = 0;
            document.getElementById("ratingComment").value = "";
            document.querySelectorAll(".star-rating .star").forEach(s => s.classList.remove("active"));

            const modal = new bootstrap.Modal(document.getElementById('ratingModal'));
            modal.show();
        }

        async function submitRating() {
            const queue_id = document.getElementById("rating_queue_id").value;
            const barber_id = document.getElementById("rating_barber_id").value;
            const customer_id = localStorage.getItem("customer_id");
            const rating = document.getElementById("selectedRating").value;
            const comment = document.getElementById("ratingComment").value;

            if (rating == 0) {
                alert("Please select a rating (1-5 stars)");
                return;
            }

            const res = await fetch(api + "add-rating", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    queue_id: queue_id,
                    customer_id: customer_id,
                    barber_id: barber_id,
                    rating: rating,
                    comment: comment
                })
            });

            const data = await res.json();
            if (data.message) {
                alert("Thank you for your feedback!");
                bootstrap.Modal.getInstance(document.getElementById('ratingModal')).hide();
                loadQueue();
            } else {
                alert("Error submitting rating");
            }
        }

        document.getElementById("queueForm").addEventListener("submit", async e => {
            e.preventDefault()

            const btn = e.target.querySelector("button")
            const originalText = btn.innerHTML
            btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Processing...`
            btn.disabled = true

            try {
                await fetch(api + "add-queue", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        customer_id: customer_id.value,
                        service_id: service.value,
                        barber_id: barber.value,
                        hairstyle_id: hairstyle.value
                    })
                })
                alert("Successfully added to queue!")
                loadQueue()
            } catch (err) {
                alert("Error adding to queue")
            }

            btn.innerHTML = originalText
            btn.disabled = false
        })


        function checkLoginStatus() {
            const id = localStorage.getItem("customer_id")
            const idInput = document.getElementById("customer_id")
            const navLogin = document.getElementById("nav-login")
            const navLogout = document.getElementById("nav-logout")

            if (id) {
                if (navLogin) navLogin.style.display = "none"
                if (navLogout) navLogout.style.display = "block"

                idInput.value = id
                idInput.readOnly = true
                idInput.style.backgroundColor = "#e9ecef"
            } else {
                if (navLogin) navLogin.style.display = "block"
                if (navLogout) navLogout.style.display = "none"
                idInput.value = ""
                idInput.readOnly = false
                idInput.style.backgroundColor = "#fff"
            }
        }

        function logout() {
            localStorage.removeItem("customer_id")
            window.location.href = "login.php"
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadServices();
            loadBarbers();
            loadStyles();
            loadQueue();
            checkLoginStatus();

            setInterval(() => loadQueue(true), 5000);
        });

    </script>

</body>

</html>
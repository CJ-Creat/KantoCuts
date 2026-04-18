<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Kanto Cuts</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo-icon {
            font-size: 3rem;
            color: #D4AF37;
            margin-bottom: 10px;
        }
        .card-title {
            font-family: 'Playfair Display', serif;
            color: #000;
        }
        .form-control {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 12px;
        }
        .form-control:focus {
            border-color: #D4AF37;
            box-shadow: none;
        }
        .btn-gold {
            background-color: #D4AF37;
            color: #000;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
        }
        .btn-gold:hover {
            background-color: #b8972e;
        }
    </style>
</head>
<body>

<div class="login-card">
    <i class="fas fa-user-shield logo-icon"></i>
    <h3 class="card-title mb-4">Admin Panel</h3>
    
    <form id="adminLoginForm">
        <div class="mb-3">
            <input type="text" id="username" class="form-control" placeholder="Admin Username" required>
        </div>
        <div class="mb-3">
            <input type="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-gold">Login</button>
    </form>
</div>

<script>
document.getElementById("adminLoginForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    const btn = document.querySelector("button");
    btn.innerHTML = "Verifying...";
    btn.disabled = true;

    try {
        const res = await fetch("api.php?route=admin-login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                username: document.getElementById("username").value,
                password: document.getElementById("password").value
            })
        });

        const data = await res.json();

        if (data.success) {
            localStorage.setItem("admin_id", data.admin_id);
            window.location.href = "admin.php";
        } else {
            alert("Invalid Admin Credentials");
            btn.innerHTML = "Login";
            btn.disabled = false;
        }
    } catch (err) {
        alert("Cannot connect to server.");
        btn.innerHTML = "Login";
        btn.disabled = false;
    }
});
</script>

</body>
</html>
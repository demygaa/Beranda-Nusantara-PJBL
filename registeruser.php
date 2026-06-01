
<?php if (isset($_GET['success'])): ?>

    <div class="success" id="success">
        Registrasi berhasil!
    </div>

<?php endif; ?>
<script>

        const succes = document.getElementById("success");

        succes.style.display = "flex";

        setTimeout(() => {
            succes.style.display = "none";
        }, 3000);

    </script>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User - Beranda Nusantara</title>
    <link rel="website icon" type="png" href="asset/icon/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #31326F, #4244DB);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .success {
            position: absolute;
            top: 20px;
            background: #d4edda;
            color: #155724;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 500;
            display: flex;
        }

        .login-container {
            background-color: #ffffff;
            width: 1000px;
            max-width: 1000px;
            height: 620px;
            border-radius: 30px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
        }

        .login-form-side {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .logo-container img {
            width: 50px;
            height: 60px;
        }

        .logo-container h1 {
            font-size: 26px;
            color: #31326F;
            font-weight: 700;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #666;
            font-size: 15px;
            margin-bottom: 40px;
        }

        form {
            width: 100%;
            max-width: 360px;
        }

        .input-group {
            position: relative;
            margin-bottom: 22px;
        }

        .input-group input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 1px solid #ddd;
            border-radius: 50px;
            outline: none;
            font-size: 15px;
            background: #f8f9ff;
            transition: all 0.3s;
        }

        .input-group input:focus {
            border-color: #4244DB;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(66, 68, 219, 0.1);
        }

        .input-group i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 18px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 30px;
            color: #555;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .forgot-pass {
            color: #666;
            text-decoration: none;
            font-weight: 600;
            color: #4244DB;
        }

        .forgot-pass:hover {
            color: #4244DB;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            border: none;
            background: linear-gradient(to right, #31326F, #4244DB);
            color: white;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(66, 68, 219, 0.3);
        }


        .divider {
            margin: 35px 0;
            display: flex;
            align-items: center;
            color: #aaa;
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .divider span {
            padding: 0 15px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: #555;
            transition: all 0.3s;
        }

        .social-btn:hover {
            background: #f0f4ff;
            color: #4244DB;
            border-color: #4244DB;
        }


        .image-side {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1614850523459-c2f4c699c52e?q=80&w=1000&auto=format&fit=crop') no-repeat center center/cover;
            position: relative;
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-side::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom right, rgba(49, 50, 111, 0.35), rgba(66, 68, 219, 0.45));
            border-radius: 0 30px 30px 0;
        }


        .image-side .logo-overlay {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .image-side .logo-overlay img {
            width: 280px;
            /* Ukuran logo yang lebih pas */
            height: auto;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.4));
            opacity: 0.95;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                height: auto;
                width: 100%;
            }

            .image-side {
                height: 220px;
                border-radius: 30px 30px 0 0;
                order: -1;
            }

            .image-side::after {
                border-radius: 30px 30px 0 0;
            }

            .login-form-side {
                padding: 40px 30px;
            }

            .image-side .logo-overlay img {
                width: 180px;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="login-container">


        <div class="login-form-side">
            <div class="logo-container">

                <h1>BERANDA NUSANTARA</h1>
            </div>

            <h2>Daftarkan Dirimu Sekarang</h2>
            <p class="subtitle">Bergabung untuk Nusantara Indonesia</p>

            <form action="proses_register.php" method="POST">
                <div class="input-group">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username Pengguna" required name="username">
                </div>
                <div class="input-group">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" required name="email">
                </div>

                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password" required name="password">
                </div>

                <div class="options">
                    <p>Sudah punya akun? <span><a href="loginuser.php" class="forgot-pass">Masuk Sekarang</a></span></p>
                </div>

                <button type="submit" class="btn-login" name="daftar">BERGABUNG</button>
            </form>


        </div>


        <div class="image-side">
            <div class="logo-overlay">
                <img src="asset/icon/logo.png" alt="Logo Beranda Nusantara">
            </div>
        </div>
    </div>

</body>

</html>
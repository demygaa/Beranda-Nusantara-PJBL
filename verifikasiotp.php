<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "api.php";

if (isset($_POST['verifikasi'])) {

    $otp = $_POST['otp'];
    $email = $_SESSION['reset_email'];

    $stmt = $conn->prepare("
        SELECT * FROM tb_akun 
        WHERE email=? 
        AND otp_code=? 
        AND otp_expired > NOW()
    ");

    $stmt->bind_param("ss", $email, $otp);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $_SESSION['otp_verified'] = true;

        header("Location: resetpassword.php");
        exit;

    } else {

        $error = "OTP salah atau sudah expired!";
    }
}
?>

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

        /* SISI KIRI - FORM LOGIN */
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
            display: block;
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

            text-decoration: none;
            font-weight: 600;
            color: #4244DB;
        }

        .forgot-pass:hover {
            color: #4244DB;
        }

        button.forgot-pass {
            background: transparent !important;
            border: none !important;
            outline: none;
            box-shadow: none;
            padding: 0;
            color: #4244DB;
            cursor: pointer;
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

        .forgotpass {
            display: none;
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
    </style>
</head>

<body>

    <div class="login-container">


        <div class="login-form-side">
            <div class="logo-container">

                <h1>BERANDA NUSANTARA</h1>
            </div>

            <h2>Ayo Bergabung Bersama Kami</h2>
            <p class="subtitle">Kenalkan Indonesia kepada mata dunia</p>

            <form method="POST" id="login">
                <div class="input-group">
                    <label>Masukkan OTP</label>
                    <input type="text" name="otp" required>
                </div>
                <?php if (isset($error)) { ?>
                    <p style="color:red;">
                        <?php echo $error; ?>
                    </p>
                <?php } ?>
                <button type="submit" name="verifikasi" class="btn-login">
                    Verifikasi
                </button>
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
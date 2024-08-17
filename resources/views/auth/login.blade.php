<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menggunakan fungsi asset untuk mengakses file CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo">
            <!-- Menggunakan fungsi asset untuk mengakses gambar -->
            <img src="{{ asset('images/PT-Timah-Industri.png') }}" alt="Company Logo">
        </div>
        <h2>Login</h2>
        <!-- Update form untuk menggunakan metode POST dan menambahkan route ke Laravel -->
        <form id="loginForm" method="POST" action="{{ route('login.submit') }}">
            <!-- Token CSRF untuk keamanan -->
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-login">Login</button>
            </div>
        </form>
        <div class="options">
            <a href="#" class="forgot-password">Lupa Password?</a>
            <span class="separator">|</span>
            <a href="{{ url('daftar') }}" class="register">Daftar</a>
        </div>
        <div class="guest-login">
            <a href="{{ route('guest.login') }}" class="btn-guest">Login sebagai Tamu</a>
        </div>
        <div class="error-message" id="errorMessage"></div>
    </div>
    <!-- Pop-Up Loading -->
    <div id="loadingPopup" style="display: none;">
        <div class="loading-content">
            <div class="spinner"></div>
            <p>Loading, please wait...</p>
        </div>
    </div>
    <!-- Menggunakan fungsi asset untuk mengakses file JS -->
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>

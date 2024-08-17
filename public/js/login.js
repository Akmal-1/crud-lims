console.log("Login script loaded");

document.addEventListener("DOMContentLoaded", function() {
    var loginForm = document.getElementById("loginForm");
    var loginButton = document.querySelector(".btn-login");
    var errorMessage = document.getElementById("errorMessage");

    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Reset pesan kesalahan
            errorMessage.textContent = "";
            errorMessage.style.display = "none";

            // Ambil nilai username/email dan password dari formulir
            var username = document.getElementById("username") || document.getElementById("email");
            var password = document.getElementById("password");

            if (!username || !password) {
                errorMessage.textContent = "Username/Email dan Password harus diisi.";
                errorMessage.style.display = "block";
                return;
            }

            var usernameValue = username.value.trim();
            var passwordValue = password.value.trim();

            if (usernameValue === "" || passwordValue === "") {
                errorMessage.textContent = "Username/Email dan Password harus diisi.";
                errorMessage.style.display = "block";
                return;
            }

            // Tampilkan animasi loading pada tombol login
            loginButton.disabled = true;
            loginButton.textContent = "Logging in...";

            // Simulasi pengiriman data ke backend (gunakan URL yang sebenarnya)
            fetch('/login', { // Ganti '/login' dengan URL endpoint yang benar
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    username: usernameValue,
                    password: passwordValue
                })
            })
            .then(response => {
                loginButton.disabled = false;
                loginButton.textContent = "Login";

                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Login gagal. Silakan coba lagi.');
                }
            })
            .then(data => {
                // Jika login berhasil, arahkan pengguna ke halaman dashboard
                window.location.href = '/dashboard'; // Sesuaikan URL redirect
            })
            .catch(error => {
                // Jika terjadi kesalahan, tampilkan pesan kesalahan kepada pengguna
                errorMessage.textContent = "Login gagal. Mohon cek kembali username/email dan password Anda.";
                errorMessage.style.display = "block";
            });
        });

        // Tambahkan efek saat input fokus
        var inputs = loginForm.querySelectorAll("input");
        inputs.forEach(function(input) {
            input.addEventListener("focus", function() {
                input.style.borderColor = "#007bff";
            });
            input.addEventListener("blur", function() {
                input.style.borderColor = "#ddd";
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Ambil nilai username dan password dari formulir
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Kirim permintaan ke backend untuk otentikasi pengguna
            // Ganti 'URL_LOGIN' dengan URL endpoint yang benar untuk permintaan login ke backend Anda
            fetch('URL_LOGIN', { // <-- Ganti 'URL_LOGIN' dengan URL endpoint yang benar
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: username,
                    password: password
                })
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Login gagal. Silakan coba lagi.');
            })
            .then(data => {
                // Jika login berhasil, arahkan pengguna ke halaman utama atau dashboard
                window.location.href = 'index.html';
            })
            .catch(error => {
                // Jika terjadi kesalahan, tampilkan pesan kesalahan kepada pengguna
                var errorMessage = document.getElementById("errorMessage");
                errorMessage.textContent = "Login gagal. Mohon cek kembali username dan password Anda.";
            });
        });
    }
});

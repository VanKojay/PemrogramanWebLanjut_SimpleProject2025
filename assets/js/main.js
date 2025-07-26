async function loginUser(username, password) {
  try {
    const response = await fetch(`${BASE_API_URL}/login.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ username, password }),
    });

    const result = await response.json();

    if (result.status === "success") {
      alert("Login berhasil!");

      // Simpan data user ke localStorage
      localStorage.setItem("user", JSON.stringify(result.user));

      // Redirect ke dashboard
      window.location.href = "index.php";
    } else {
      alert("Login gagal: " + result.message);
    }
  } catch (error) {
    alert("Terjadi kesalahan koneksi.");
    console.error(error);
  }
}

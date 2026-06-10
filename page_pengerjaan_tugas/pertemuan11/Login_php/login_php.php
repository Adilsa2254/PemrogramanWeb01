<?php


$UserNameErr = '';
$username = '';
$password = '';
$error = '';
$gagal = '';
$berhasil = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (trim($username) === '' || trim($password) === '')
    {
        $gagal = 'Nama harus diisi, tidak boleh kosong';
    } 
    elseif($username === 'Adil' && $password === '241110038')
    {
        $berhasil = 'Login berhasil';
    }
    else
    {
        $gagal = 'password atay username yang kamu masukan salah!!';
    }

    // =============================================
    // TUGAS 1: Tambahkan validasi di sini
    // - Jika username atau password kosong, tampilkan pesan error
    // - Jika username = "admin" dan password = "12345", tampilkan pesan sukses
    // - Jika salah, tampilkan pesan "Username atau password salah!"
    // =============================================
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-sm w-full">
        <h1 class="text-xl font-semibold text-center mb-6">Login</h1>

        <?php if ($gagal): ?>
            <p style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <?= htmlspecialchars($gagal) ?>
            </p>
        <?php endif; ?>

        <?php if ($berhasil): ?>
            <p style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <?= htmlspecialchars($berhasil) ?>
            </p>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Username</label>
                <input
                    type="text"
                    name="username"
                    value="<?= htmlspecialchars($username) ?>"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan username">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password">
            </div>

            <div>
                <input type="checkbox" id="ingat_saya" name="ingat_saya">
                <label for="ingat_saya"> Remember me</label>
            </div>
            <!-- ============================================= -->
            <!-- TUGAS 2: Tambahkan checkbox "Remember me"    -->
            <!-- di antara password dan tombol login di bawah  -->
            <!-- ============================================= -->

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Login
            </button>
        </form>
    </div>

</body>

</html>
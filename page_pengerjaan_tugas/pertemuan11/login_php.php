<?php
$userNameErr = '';
$username = '';
$password = '';
$gagal = '';
$berhasil = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    if (trim($username) === '' || trim($password) === '') {
        $gagal = 'Nama Harus di isi dan tidak boleh kosong';
    } elseif ($username === 'Adil' && $password === '241110038') {
        $berhasil = 'Login berhasil';
    } else {
        $gagal = 'Password yang kamu masukan salah';
    }
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
            <p class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <?= htmlspecialchars($gagal) ?>
            </p>
        <?php endif; ?>

        <?php if ($berhasil): ?>
            <p class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
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

            <div class="mb-4 flex items-center gap-2">
                <input
                    type="checkbox"
                    id="Ingat_saya"
                    name="Ingat_saya"
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="Ingat_saya" class="text-sm">Ingat saya</label>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Login
            </button>
        </form>
    </div>

</body>

</html>
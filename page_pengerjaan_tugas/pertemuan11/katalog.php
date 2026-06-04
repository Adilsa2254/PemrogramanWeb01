<?php
$produk = [
    [
        "thumb" => "https://i.pinimg.com/736x/8e/b8/13/8eb813338bcc92a1bbd846ec61b9e93c.jpg",
        "title" => "Asbak",
        "desc"  => "Prosesor cepat, Tinggi 15 inci, cocok untuk menguasai wilayah.",
        "price" => 8_500_000,
    ],
    [
        "thumb" => "https://i.pinimg.com/736x/80/71/a0/8071a0cea669dc5d940ed2e72760e752.jpg",
        "title" => "Jaka tukang rakit",
        "desc"  => "Bekerja Untuk Merakit Pc, jika ada mengalami kesalahan ditanggung pengguna",
        "price" => 750_000,
    ],
    [
        "thumb" => "https://i.pinimg.com/736x/7d/9f/e8/7d9fe8f725a71e4f00f10b090b41368e.jpg",
        "title" => "Thomas IT",
        "desc"  => "Menyewakan jasa ngoding 24 jam membuat CRUD pada website anda",
        "price" => 350_000,
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <body class="bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto py-10 px-4">
            <h1 class="text-2xl font-semibold text-center mb-8">Katalog Produk</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($produk as $item): ?>
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="<?= $item['thumb'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="font-semibold text-lg mb-1">
                                <?= htmlspecialchars($item['title']) ?>
                            </h2>
                            <p class="text-gray-600 text-sm mb-3">
                                <?= htmlspecialchars($item['desc']) ?>
                            </p>
                            <span class="text-blue-600 font-bold">
                                Rp <?= number_format($item['price'], 0, ',', '.') ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</body>

</html>
<!-- iterasi fibonachi-->

<?php  
    // fungsi fibonachi 
    function fibonachi(int $n, int $F1 = 0, int $F2 = 1): array
    {
        if ($n <= 0) return [];
        if ($n === 1) return [$F1];

        $fib = [$F1, $F2];
        while (count($fib) < $n) {
            $count = count($fib);
            $fib[] = $fib[$count - 1] + $fib[$count - 2];
        }
        return $fib;
    }

    // untuk mengambil nilai dari input yang nanti di pakai
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    $input = $method === 'POST' ? $_POST : $_GET;

    $n = isset($input['n']) ? max(0, (int)$input['n']) : null;
    $f1 = isset($input['f1']) ? (int)$input['f1'] : 0;
    $f2 = isset($input['f2']) ? (int)$input['f2'] : 1;

    if ($n !== null) {
        $n = min($n, 500);
        $sequence = fibonachi($n, $f1, $f2);
        $nth = count($sequence) ? $sequence[count($sequence) - 1] : null;
        $sum = array_sum($sequence);
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumus Fibonachi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Poppins:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#ffffff;--muted:#d6d6d6;--dark:#1e1e1e;--card-radius:28px}
        *{box-sizing:border-box}
        body{font-family:'IBM Plex Mono',monospace;background:var(--bg);color:#111;margin:0;padding:0}
        .container.py-4{max-width:1200px;padding:40px 24px;margin:0 auto}
        h1.mb-3{font-size:32px;text-align:left;margin-bottom:18px}

        .figma-form{background:var(--dark);color:#f2f2f2;border-radius:var(--card-radius);box-shadow:-14px 14px 13px rgba(18,18,18,0.25);padding:28px}
        .figma-form .form-label{color:#e6e6e6}
        .figma-form .form-control{border-radius:12px;border:1px solid rgba(255,255,255,0.06);background:rgba(255,255,255,0.02);color:#fff}
        .figma-form .btn-primary{background:#ffffff;border-color:#3a82ff; color: #111; height:45px; align-self: center; font-weight: bold;}
        .figma-form .btn-outline-secondary{color:#f2f2f2;border-color:rgba(255,255,255,0.12); font-size: 10px;}

        .figma-info{border-radius:18px;padding:20px;background:#fafafa}

        .result-card{border-radius:24px;overflow:hidden}
        .result-card .card-body{background:#ffffff}
        .result-list{background:var(--dark);color:#f2f2f2;padding:16px;border-radius:12px;margin-top:8px;font-family:'Poppins',sans-serif}

        footer.mt-4{color:#666;margin-top:24px}

        @media (max-width:1000px){.container.py-4{padding:20px}.lp-cards{flex-direction:column}}
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="mb-3">
            <button type="button" class="btn btn-outline-secondary" onclick="history.back()">← Kembali</button>
            <a class="btn btn-outline-secondary d-none" href="../Landing_page.php">Fallback</a>
        </div>
        <h1 class="mb-3">Rumus Fibonachi About</h1>

        <div class="row">
            <div class="col-md-6">
                <form method="post" class="card card-body figma-form">
                    <div class="mb-3">
                        <label class="form-label">Jumlah elemen (n)</label>
                        <input type="number" name="n" class="form-control" min="1" max="500" value="<?php echo htmlspecialchars($n ?? 8); ?>">
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">F1 (nilai awal)</label>
                            <input type="number" name="f1" class="form-control" value="<?php echo htmlspecialchars($f1); ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">F2 (nilai kedua)</label>
                            <input type="number" name="f2" class="form-control" value="<?php echo htmlspecialchars($f2); ?>">
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Hitung</button>
                        <a href="?n=8&f1=0&f2=1" class="btn btn-outline-secondary">Method: klasik (n=8)</a>
                        <a href="?n=10&f1=2&f2=3" class="btn btn-outline-secondary">Method: variasi (2,3)</a>
                        <a href="?n=12&f1=1&f2=1" class="btn btn-outline-secondary">Method: lucas-like</a>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card card-body figma-info">
                    <h5>Penjelasan singkat</h5>
                    <p class="small mb-0">Deret Fibonacci klasik dimulai dari 0 dan 1, lalu setiap angka berikutnya adalah jumlah dua angka sebelumnya: F(n)=F(n-1)+F(n-2). Form ini mendukung variasi nilai awal `F1` dan `F2`.</p>
                </div>
            </div>
        </div>

        <?php if (isset($sequence)): ?>
            <div class="mt-4">
                <div class="card result-card">
                    <div class="card-body">
                        <h5 class="card-title">Hasil</h5>
                        <p><strong>Jumlah elemen:</strong> <?php echo count($sequence); ?></p>
                        <p><strong>Deret:</strong> <?php echo htmlspecialchars(implode(', ', $sequence)); ?></p>
                        <p><strong>Nilai ke-<?php echo count($sequence); ?> (terakhir):</strong> <?php echo $nth; ?></p>
                        <p><strong>Jumlah semua elemen:</strong> <?php echo $sum; ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <footer class="mt-4 small text-muted"> <i class="ri-information-line"></i> All Reserved Better</footer>
    </div>
</body>
    <script>
        function randomize(){
            const n = Math.floor(Math.random()*15)+5;
            const f1 = Math.floor(Math.random()*10);
            const f2 = Math.floor(Math.random()*10);
            const form = document.querySelector('form');
            form.n.value = n;
            form.f1.value = f1;
            form.f2.value = f2;
            form.submit();
        }

        function resetForm(){
            const form = document.querySelector('form');
            form.reset();
        }

        function showSumOnly(){
            const series = document.getElementById('resultSeries');
            if (!series) return alert('Tidak ada hasil untuk ditampilkan');
            if (series.style.display === 'none'){
                series.style.display = '';
            } else {
                series.style.display = 'none';
            }
        }

        function exportCSV(){
            const seriesEl = document.getElementById('resultSeries');
            if (!seriesEl) return alert('Tidak ada data untuk diekspor');
            const text = seriesEl.textContent || seriesEl.innerText;
            // remove label 'Deret:' if present
            const values = text.replace(/^[^:]*:\s*/,'').trim();
            const rows = values.split(/,\s*/).map(v=>v.trim());
            const csv = rows.join('\n');
            const blob = new Blob([csv], {type: 'text/csv'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'fibonacci.csv';
            document.body.appendChild(a);
            a.click();
            a.remove();
            URL.revokeObjectURL(url);
        }
    </script>
</html>
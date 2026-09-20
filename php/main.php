<?php
require_once __DIR__ . '/Film.php';
session_start();

// Menyiapkan penyimpanan data film.
if (!isset($_SESSION['film'])) {
    $_SESSION['film'] = [];
}
$daftar = &$_SESSION['film'];
$pesan = '';
$aksi = $_POST['aksi'] ?? $_GET['aksi'] ?? '';
$id = $_POST['id_film'] ?? $_GET['id_film'] ?? '';

// Mencari indeks film berdasarkan ID.
function cariFilm(array $daftar, string $id): int {
    foreach ($daftar as $i => $film) {
        if ($film->getIdFilm() === $id) {
            return $i;
        }
    }
    return -1;
}

if ($aksi === 'tambah') {
    // Menambahkan data film baru.
    if (cariFilm($daftar, $id) !== -1) {
        $pesan = 'ID sudah digunakan.';
    } else {
        $daftar[] = new Film($id, $_POST['judul'], $_POST['genre'], (int) $_POST['harga_tiket'], $_POST['poster_path']);
        $pesan = 'Data berhasil ditambahkan.';
    }
} elseif ($aksi === 'update') {
    // Mengubah data film yang dipilih.
    $i = cariFilm($daftar, $id);
    if ($i === -1) {
        $pesan = 'Data tidak ditemukan.';
    } else {
        $daftar[$i]->setJudul($_POST['judul']);
        $daftar[$i]->setGenre($_POST['genre']);
        $daftar[$i]->setHargaTiket((int) $_POST['harga_tiket']);
        $daftar[$i]->setPosterPath($_POST['poster_path']);
        $pesan = 'Data berhasil diubah.';
    }
} elseif ($aksi === 'hapus') {
    // Menghapus data film yang dipilih.
    $i = cariFilm($daftar, $id);
    if ($i === -1) {
        $pesan = 'Data tidak ditemukan.';
    } else {
        array_splice($daftar, $i, 1);
        $pesan = 'Data berhasil dihapus.';
    }
}

$filmEdit = null;
if ($aksi === 'form_update') {
    $i = cariFilm($daftar, $id);
    if ($i !== -1) {
        $filmEdit = $daftar[$i];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Film Bioskop</title>
    <style>body{font-family:Arial,sans-serif;max-width:1100px;margin:30px auto;padding:0 18px}h1{color:#1d3557}form{display:grid;gap:8px;margin-bottom:24px}input,button{padding:8px}button{cursor:pointer}table{border-collapse:collapse;width:100%}th,td{border:1px solid #bbb;padding:8px;text-align:left}th{background:#1d3557;color:white}img{width:55px;height:75px;object-fit:cover}.pesan{padding:10px;background:#e8f5e9}</style>
</head>
<body>
    <h1>Manajemen Film Bioskop</h1>
    <?php if ($pesan !== ''): ?><p class="pesan"><?= htmlspecialchars($pesan) ?></p><?php endif; ?>
    <h2><?= $filmEdit ? 'Update Film' : 'Tambah Film' ?></h2>
    <form method="post">
        <input type="hidden" name="aksi" value="<?= $filmEdit ? 'update' : 'tambah' ?>">
        <label>ID Film <input name="id_film" required value="<?= htmlspecialchars($filmEdit?->getIdFilm() ?? '') ?>" <?= $filmEdit ? 'readonly' : '' ?>></label>
        <label>Judul <input name="judul" required value="<?= htmlspecialchars($filmEdit?->getJudul() ?? '') ?>"></label>
        <label>Genre <input name="genre" required value="<?= htmlspecialchars($filmEdit?->getGenre() ?? '') ?>"></label>
        <label>Harga Tiket <input type="number" name="harga_tiket" min="0" required value="<?= $filmEdit?->getHargaTiket() ?? '' ?>"></label>
        <label>Path Poster Lokal <input name="poster_path" required value="<?= htmlspecialchars($filmEdit?->getPosterPath() ?? '') ?>"></label>
        <button type="submit"><?= $filmEdit ? 'Simpan Perubahan' : 'Tambah Data' ?></button>
    </form>
    <h2>Daftar Film</h2>
    <table>
        <tr><th>ID</th><th>Judul</th><th>Genre</th><th>Harga</th><th>Poster</th><th>Aksi</th></tr>
        <?php foreach ($daftar as $film): ?>
            <tr><td><?= htmlspecialchars($film->getIdFilm()) ?></td><td><?= htmlspecialchars($film->getJudul()) ?></td><td><?= htmlspecialchars($film->getGenre()) ?></td><td>Rp <?= number_format($film->getHargaTiket(), 0, ',', '.') ?></td><td><img src="<?= htmlspecialchars($film->getPosterPath()) ?>" alt="Poster film"></td><td><a href="?aksi=form_update&id_film=<?= urlencode($film->getIdFilm()) ?>">Update</a> | <a href="?aksi=hapus&id_film=<?= urlencode($film->getIdFilm()) ?>" onclick="return confirm('Hapus data ini?')">Hapus</a></td></tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

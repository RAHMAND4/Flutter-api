<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Detail : {{ $news['judul'] }}</title>
</head>
<body>
    <h5><?= $news['judul'] ?></h5>
    <img src="<?= base_url('public/uploads/img/'.$news['gambar']) ?>" alt="">
    <p><?= $news['isi'] ?></p>
</body>
</html>
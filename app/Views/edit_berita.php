<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
</head>
<body>
    <h5>Form Edit Berita</h5>
    <form action="<?= base_url('berita/update/'). $news['id'] ?>" method="post">
        <?= csrf_field() ?>
        <table>
            <tr>
                <td>Judul : </td>
                <td><input type="text" name="judul" value="<?= $news['judul'] ?>" placeholder="Ketikan Judul"></td>
            </tr>
            <tr>
                <td>Isi berita : </td>
                <td><input type="text" name="isi" value="<?= $news['isi'] ?>" placeholder="Ketikan Isi berita"></td>
            </tr>
            <tr>
                <td>Gambar : </td>
                <td><input type="text" name="gambar" value="<?= $news['gambar'] ?>" placeholder="Pilih Gambar"></td>
            </tr>
            <td></td>
            <td>
                <button type="button" onclick="window.history.go(-1)">Kembali</button>
                <input type="submit" value="Simpan" name="simpan">
            </td>
        </table>
    </form>
</body>
</html>
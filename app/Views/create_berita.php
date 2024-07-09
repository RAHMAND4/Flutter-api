<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
</head>
<body>
    <h5>Tambah Berita</h5>
    <form action="<?= base_url('berita/create') ?>" method="post">
        <?= csrf_field() ?>
        <table>
            <tr>
                <td>Judul : </td>
                <td><input type="text" name="judul" value="" placeholder="Ketikan Judul"></td>
            </tr>
            <tr>
                <td>Isi berita : </td>
                <td><input type="text" name="isi" value="" placeholder="Ketikan Isi berita"></td>
            </tr>
            <tr>
                <td>Gambar : </td>
                <td><input type="text" name="gambar" value="" placeholder="Pilih Gambar"></td>
            </tr>
            <td></td>
            <td>
                <input type="submit" value="Simpan" name="simpan">
            </td>
        </table>
    </form>
</body>
</html>
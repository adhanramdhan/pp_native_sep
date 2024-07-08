<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pertanyaan</title>
</head>
<body>
    <h2>Tambah Pertanyaan</h2>
    <form action="add_question.php" method="post">
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required><br><br>
        <label for="nama">Pertanyaan:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>

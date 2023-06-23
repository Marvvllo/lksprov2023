<?php
// Deteksi jika sudah submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $imagePath = $_FILES['image']['tmp_name'];
  $logoPath = $_FILES['logo']['tmp_name'];

  // Periksa jika kedua gambar sudah submit
  if (!empty($imagePath) && !empty($logoPath)) {
    // Memuat kedua gambar
    $image = imagecreatefromstring(file_get_contents($imagePath));
    $logo = imagecreatefromstring(file_get_contents($logoPath));

    // Mendapatkan dimensi gambar logo
    $logoWidth = imagesx($logo);
    $logoHeight = imagesy($logo);

    // Kalkulasi posisi logo (pojok kanan bawah)
    $imageWidth = imagesx($image);
    $imageHeight = imagesy($image);
    $logoPositionX = $imageWidth - $logoWidth - 10; // Menyesuaikan margin
    $logoPositionY = $imageHeight - $logoHeight - 10; // Menyesuaikan margin

    // Taruh logo di atas image
    imagecopy($image, $logo, $logoPositionX, $logoPositionY, 0, 0, $logoWidth, $logoHeight);

    // Keluarkan hasil
    header('Content-Type: image/jpeg');
    imagejpeg($image, null, 90);

    // Kosongkan penyimpanan
    imagedestroy($image);
    imagedestroy($logo);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Image Watermark</title>
</head>

<body>
  <form method="POST" enctype="multipart/form-data">
    <label for="image">Select Image:</label>
    <input type="file" name="image" accept="image/*" required><br><br>

    <label for="logo">Select Logo:</label>
    <input type="file" name="logo" accept="image/*" required><br><br>

    <input type="submit" value="Apply Watermark">
  </form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $imagePath = $_FILES['image']['tmp_name'];
  $logoPath = $_FILES['logo']['tmp_name'];

  // Check if both image and logo are uploaded
  if (!empty($imagePath) && !empty($logoPath)) {
    // Load the main image
    $image = imagecreatefromstring(file_get_contents($imagePath));

    // Load the logo image
    $logo = imagecreatefromstring(file_get_contents($logoPath));

    // Get the dimensions of the logo image
    $logoWidth = imagesx($logo);
    $logoHeight = imagesy($logo);

    // Calculate the position to place the logo on the main image (bottom-right corner)
    $imageWidth = imagesx($image);
    $imageHeight = imagesy($image);
    $logoPositionX = $imageWidth - $logoWidth - 10; // Adjust the position as needed
    $logoPositionY = $imageHeight - $logoHeight - 10; // Adjust the position as needed

    // Apply the logo as a watermark on the main image
    imagecopy($image, $logo, $logoPositionX, $logoPositionY, 0, 0, $logoWidth, $logoHeight);

    // Output the final image to a file or browser
    header('Content-Type: image/jpeg');
    imagejpeg($image, null, 90);

    // Clean up memory
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
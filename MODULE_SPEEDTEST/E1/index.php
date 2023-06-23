<?php
function xmlToJson($xmlString)
{
  // Load the XML string
  $xml = simplexml_load_string($xmlString);

  // Convert the XML object to an associative array
  $json = json_encode($xml);
  $array = json_decode($json, true);

  return $array;
}

// Check if XML data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['xmlData'])) {
  $xmlString = $_POST['xmlData'];
  $jsonArray = xmlToJson($xmlString);
  $jsonData = json_encode($jsonArray, JSON_PRETTY_PRINT);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>XML to JSON Converter</title>
</head>

<body>
  <form method="POST">
    <label for="xmlData">Enter XML Data:</label><br>
    <textarea name="xmlData" rows="10" cols="50" required><?php if (isset($xmlString)) echo htmlspecialchars($xmlString); ?></textarea><br><br>
    <input type="submit" value="Convert to JSON">
  </form>

  <?php if (isset($jsonData)) : ?>
    <h2>JSON Output:</h2>
    <pre><?php echo htmlspecialchars($jsonData); ?></pre>
  <?php endif; ?>
</body>

</html>
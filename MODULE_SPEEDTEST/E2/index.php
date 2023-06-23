<?php

// Baca file JSON
$jsonData = file_get_contents('./result.json');

// Decode data JSON
$data = json_decode($jsonData, true);

// Deklarasi dan inisialisasi variabel
$totalSentMessages = 0;
$totalReceivedMessages = 0;
$characterCountSent = 0;
$characterCountReceived = 0;
$wordCount = array();

// Analisa setiap pesan
foreach ($data['messages'] as $message) {
  if ($message['type'] === 'message') {
    $text = $message['text'];
    $words = explode(' ', $text);
    $wordCount = array_merge($wordCount, $words);

    if ($message['from'] === 'Bot') {
      $totalReceivedMessages++;
      $characterCountReceived += strlen($text);
    } else {
      $totalSentMessages++;
      $characterCountSent += strlen($text);
    }
  }
}

// Hitung seberapa sering kata disebutkan
$wordFrequency = array_count_values($wordCount);

// Urutkan kata menurut seringnya digunakan
arsort($wordFrequency);

// Dapatkan 5 kata yang paling banyak digunakan
$topWords = array_slice($wordFrequency, 0, 5, true);

// Hitung rata-rata
$averageCharacterLengthSent = ($totalSentMessages > 0) ? $characterCountSent / $totalSentMessages : 0;
$averageCharacterLengthReceived = ($totalReceivedMessages > 0) ? $characterCountReceived / $totalReceivedMessages : 0;

// Perlihatka hasil
echo "<h1>Message Analytics</h1>";
echo "<p>Total messages sent: $totalSentMessages</p>";
echo "<p>Total messages received: $totalReceivedMessages</p>";
echo "<p>Average character length of sent messages: $averageCharacterLengthSent</p>";
echo "<p>Average character length of received messages: $averageCharacterLengthReceived</p>";
echo "<h2>Top 5 words</h2>";
echo "<ul>";
foreach ($topWords as $word => $frequency) {
  echo "<li>$word (Frequency: $frequency)</li>";
}
echo "</ul>";

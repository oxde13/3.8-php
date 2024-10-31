<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars(trim($_POST['username']));
    $rating = intval($_POST['rating']);
    $review = htmlspecialchars(trim($_POST['review']));

    $pdo = new PDO('mysql:host=localhost;dbname=reviews', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO reviews (username, review, rating) VALUES (:username, :review,
:rating)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'review' => $review, 'rating' => $rating]);
    echo "Отзыв успешно добавлен!";

} else {
    echo "Неправильный метод запроса.";
}
$sql = "SELECT * FROM reviews";
$stmt = $pdo->query($sql);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($reviews as $review) {
    echo "<p><strong>{$review['username']}</strong>: {$review['review']} (Рейтинг:
    {$review['rating']})</p>";
    }
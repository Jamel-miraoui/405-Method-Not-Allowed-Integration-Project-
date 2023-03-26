<?php
// Get the uploaded file data
$file_data = file_get_contents($_FILES['pdf_file']['tmp_name']);

// Insert the file data into the database ||| still not finiched 
$stmt = $pdo->prepare("INSERT INTO books (title, author_name, publisher_name, ISBN, publication_date, number_of_pages, category, pdf_file) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$title, $author_name, $publisher_name, $isbn, $publication_date, $num_pages, $category, $file_data]);
?>
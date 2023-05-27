<?php 
// Query the database for the book
$stmt = $pdo->prepare("SELECT * FROM books WHERE book_id = $msg");
$stmt->execute([$book_id]);
$book = $stmt->fetch();

// Output the PDF file to the user
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $book['title'] . '.pdf"');
echo $book['pdf_file'];

?>
<?php
require_once('sessonchek.php');

$filename = $_GET['filename'];
echo $filename;
// Validate and sanitize the filename to prevent directory traversal attacks
// $filename = basename($filename);

// Specify the path to the uploads directory
$uploadsDirectory = '';

// Full path to the file
$file = $uploadsDirectory . $filename;
echo $file;

// Check if the file exists and is readable
if (file_exists($file) && is_readable($file)) {
    // echo "file exists";
    // Get the file extension
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    // Set appropriate headers for the file type
    switch ($extension) {
        case 'pdf':
            $contentType = 'application/pdf';
            break;
        case 'jpg':
        case 'jpeg':
            $contentType = 'image/jpeg';
            break;
        case 'png':
            $contentType = 'image/png';
            break;
        // Add more cases for other file types as needed
        default:
            $contentType = false;
    }

    if ($contentType) {
        header("Content-Type: $contentType");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        readfile($file);
    } else {
        // File type not supported
        echo $filename;
        displayErrorMessage("File type not supported.");
        
    }
} else {
    // File not found or inaccessible
    displayErrorMessage("File not found or inaccessible.");
}

function displayErrorMessage($message) {
    echo "<h1>Error</h1>";
    echo "<p>$message</p>";
}
?>

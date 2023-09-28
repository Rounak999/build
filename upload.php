<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES["file"];

    // Check if a file was uploaded
    if (isset($file) && $file["error"] === UPLOAD_ERR_OK) {
        // Check if the file extension is allowed
        $allowedExtensions = ["jpg", "jpeg", "png","svg"];
        $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);

        // Check if the content type is allowed
        $allowedContentTypes = ["image/jpeg", "image/png","image/svg+xml"];
        $fileContentType = mime_content_type($file["tmp_name"]);

        if (
            in_array(strtolower($fileExtension), $allowedExtensions) &&
            in_array($fileContentType, $allowedContentTypes)
        ) {
            // Move the uploaded file to a desired location
            $uploadDir = "upload/";
            $uploadedFile = $uploadDir . basename($file["name"]);

            if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
                echo "File uploaded successfully to upload directory";
            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            echo "Error: Invalid file format or content type.";
        }
    } else {
        echo "Error: No file uploaded.";
    }
}
?>

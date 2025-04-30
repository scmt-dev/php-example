<?php
// upload.php
session_start();
require_once 'db.php'; // Include your database connection

// Create uploads directory if not exists
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $file = $_FILES['document'] ?? null;
    
    // Validate inputs
    if (empty($title) || empty($file)) {
        $error = 'Please fill all required fields';
    } else {
        // File validation
        $allowed_types = ['application/pdf', 'image/jpeg', 'image/png', 'text/plain'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $error = 'File upload error: ' . $file['error'];
        } elseif (!in_array($file['type'], $allowed_types)) {
            $error = 'Invalid file type. Allowed types: PDF, JPG, PNG, TXT';
        } elseif ($file['size'] > $max_size) {
            $error = 'File too large. Max size: 5MB';
        } else {
            // Generate unique filename
            $file_name = uniqid() . '_' . basename($file['name']);
            $file_path = 'uploads/' . $file_name;
            
            if (move_uploaded_file($file['tmp_name'], $file_path)) {
                // Insert into database
                try {
                    $stmt = $db->prepare("
                        INSERT INTO documents 
                        (title, file_name, file_path, file_type, file_size)
                        VALUES (?, ?, ?, ?, ?)
                    ");
                    
                    $stmt->execute([
                        $title,
                        $file['name'],
                        $file_path,
                        $file['type'],
                        $file['size'] / 1024 / 1024 // Convert to MB
                    ]);
                    
                    $success = 'File uploaded successfully!';
                } catch (PDOException $e) {
                    $error = 'Database error: ' . $e->getMessage();
                    unlink($file_path); // Remove uploaded file
                }
            } else {
                $error = 'Failed to save file';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-6">Upload Document</h1>
            
            <?php if ($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form action="upload-file.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Document Title
                    </label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="document">
                        Choose File
                    </label>
                    <input type="file" id="document" name="document" required
                        class="w-full px-3 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700
                               hover:file:bg-blue-100">
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded
                               focus:outline-none focus:shadow-outline">
                        Upload Document
                    </button>
                    <a href="documents.php" class="text-gray-600 hover:text-gray-800">
                        View All Documents →
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
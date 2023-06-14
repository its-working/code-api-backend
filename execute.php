<?php
//This support local environment
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['code']) && isset($_POST['language'])) {
        // Retrieve the code from the request payload
        $code = $_POST['code'];
        $lang = $_POST['language'];

        $command = '';
        if ($lang === "PYTHON") {
            $tempFile = tempnam(sys_get_temp_dir(), 'code_') . '.py';
            file_put_contents($tempFile, $code);
            $command = 'python ' . $tempFile;
        } else if ($lang === "PHP") {
            $tempFile = tempnam(sys_get_temp_dir(), 'code_') . '.php';
            file_put_contents($tempFile, $code);
            $command = 'php ' . $tempFile;
        }
        if ($command === '') {
            die('Invalid Language');
        }

        $output = '';
        $returnCode = '';

        // Execute the code and capture the output and return code
        exec($command, $output, $returnCode);
        $output = implode("\n", $output);

        if ($returnCode === 0) {
            // Execution was successful
            echo $output;
        } else {
            // An error occurred
            echo "Error: $output";
        }

        // Clean up the temporary file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }
    } else {
        // Handle the case when 'code' or 'language' key is not present in the request payload
        echo "Missing 'code' or 'language' parameter";
    }
} else {
    // Handle the case when the request method is not POST
    echo "Invalid request method";
}

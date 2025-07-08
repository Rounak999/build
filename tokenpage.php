<?php
session_start();
$response = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Generate a secure token and store in session
    $token = base64_encode(random_bytes(16));
    $_SESSION['token'] = $token;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST;
    if (!isset($input['token']) || !isset($input['build'])) {
        $response = ["status" => "error", "message" => "Missing token or build parameter"];
    } else {
        $providedToken = $input['token'];
        $expectedToken = $_SESSION['token'] ?? '';
        if (!hash_equals($expectedToken, $providedToken)) {
            $response = ["status" => "error", "message" => "Invalid token"];
        } else {
            $response = ["status" => "verified", "build" => $input['build']];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Token Verifier</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body { font-family: Arial, Helvetica, sans-serif; background-color: #f8f9fa; }
        .form-section {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .token-box {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            font-weight: bold;
            word-break: break-all;
        }
    </style>
</head>
<body>


<!-- Content -->
<div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
    <div class="form-section">
        <h3 class="text-center">Token Generator & Verifier</h3>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['token'])): ?>
            <p class="text-success">Generated Token:</p>
            <div class="token-box"><?php echo htmlspecialchars($_SESSION['token']); ?></div>
        <?php endif; ?>

        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="token">Enter Token</label>
                <input type="text" class="form-control" name="token" id="token" required>
            </div>
            <div class="form-group">
                <label for="build">Select Build</label>
                <select class="form-control" name="build" id="build">
                    <option value="isdebug">isdebug</option>
                    <option value="isrelease">isrelease</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Verify</button>
        </form>

        <?php if ($response): ?>
            <div class="alert mt-4 <?php echo $response['status'] === 'verified' ? 'alert-success' : 'alert-danger'; ?>">
                <pre><?php echo json_encode($response, JSON_PRETTY_PRINT); ?></pre>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Scripts -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script> AOS.init(); </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

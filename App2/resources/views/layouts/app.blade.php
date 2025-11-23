<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<div class="container">
    @yield('content')
</div>
</body>

<script>
    // Sau 1 giây (1000ms) sẽ ẩn alert
    setTimeout(function() {
        let alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.display = 'none';
        }
    }, 3000);

    setTimeout(function() {
        let alertBox = document.getElementById('danger-alert');
        if (alertBox) {
            alertBox.style.display = 'none';
        }
    }, 3000);
</script>
</html>

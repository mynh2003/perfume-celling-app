<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Middleware</title>
</head>
<body>
    <h1>Kiểm Tra Middleware</h1>
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>

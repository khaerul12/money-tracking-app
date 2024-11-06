<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script>
        window.onload = function() {
            // Check if the user is authenticated
            const isAuthenticated = @json($isAuthenticated);

            // If not authenticated, show the alert
            if (!isAuthenticated) {
                alert("You have to log in first.");
            }
        };
    </script>
</head>
<body>
    <h1>Welcome to the Application</h1>

    <!-- Add a login link -->
    @if (!$isAuthenticated)
        <p>
            <a href="{{ route('login') }}">Login</a>
        </p>
    @endif

    <!-- Your other HTML content -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/get_password.css') }}">
</head>
<body>
    <div class="container">
        <h2>
            Create new password
        </h2>
        <p>
            Enter your new password to complete the reset.
        </p>
        <form>
        @csrf
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
        <button type="submit">Reset password</button>
        </form>
    </div> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
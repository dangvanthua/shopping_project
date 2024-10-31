<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/forgot_password.css') }}">
</head>
<body>
    <div class="container">
    <div class="left">
        <img alt="Logo" height="40" src="https://storage.googleapis.com/a1aa/image/QfZ4pv5paAVdECfpQBk8h8WP7MgvzGKHjQ1tCjsF80HGCOsTA.jpg" width="40"/>
        <h1>
        Forgot password?
        </h1>
        <p>
        No worries, we'll send you reset instructions.
        </p>
        <form method="POST" action="{{route('auth.sumitReset')}}">
            @csrf
            <div class="form-group">
                <label for="email">Enter your email address</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
                @error('email') 
                    <small class="help-block">{{$message}}</small>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Reset password</button>
        </form>
        <a href="#">
            <i class="fas fa-arrow-left"></i>
                Back to log in
        </a>
        </div>
        <div class="right">
            <div class="overlay">
            <div class="logo">
            </div>
                <div class="navigation">
                    <i class="fas fa-circle">
                    </i>
                    <i class="fas fa-circle">
                    </i>
                    <i class="fas fa-circle">
                    </i>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
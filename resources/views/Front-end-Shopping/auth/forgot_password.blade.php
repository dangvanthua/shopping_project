
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <div class="form-email">
            <img alt="Logo" height="40" src="{{asset('images/users/logo.jpg')}}" width="40"/>
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
                    <button type="submit" class="btn btn-primary btn-block">Send email</button>
            </form>
            <a href="#">
                <i class="fas fa-arrow-left"></i>
                    Back to log in
            </a>
        </div>
    </div>
  
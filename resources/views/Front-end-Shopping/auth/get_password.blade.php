@extends('LayOut.shopping.master_shopping')
@section('content')

    <div class="container">
        <h2>
            Create new password
        </h2>
        <p>
            Enter your new password to complete the reset.
        </p>
        <form method="POST" action="{{ route('auth.submitPassword', ['customer' => $customer->id_customer, 'token' => $token]) }}">
            @csrf
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
            <button type="submit">Reset password</button>
        </form>
    </div> 
    
@endsection
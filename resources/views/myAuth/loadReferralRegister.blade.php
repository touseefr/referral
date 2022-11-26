@extends('layout.master')


@section('content')
    <h1>Register by Referral Link</h1>
    <div class="" style="width:15%;margin-left:20px;">
        <form action="{{ url('user-registered') }}" method="post">
            @csrf
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   placeholder="enter your name" value="{{old('name')}}">
            @error('name')
            <span style="color:red;">{{ $message }}</span>
            @enderror <br><br>

            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                   placeholder="enter your email" value="{{old('email')}}">
            @error('email')
            <span style="color:red;">{{ $message }}</span>
            @enderror <br><br>


            <input type="text" class="form-control" name="referral_code" value="{{ $referral }}" readonly>
            <br><br>

            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="enter your password">
            @error('password')
            <span style="color:red;">{{ $message }}</span>
            @enderror <br><br>

            <input type="password" class="form-control" name="password_confirmation"
                   placeholder="enter your confirm password">
            <br><br>
            <input type="submit" value="Register">
            <div class='notifications top-right'></div>

        </form>
    </div>

@endsection

@section('js')
    <script>
        var error = "{{ session('error') ? session('error') : '' }}";
        if (error !== '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error,
            })
        }
        //success session
        var success = "{{ session('success') ? session('success') : '' }}";
        if (success !== '') {
            Swal.fire(
                'Good job!',
                'Your Registration',
                'success'
            )
        }
    </script>
@endsection

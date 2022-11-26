@extends('layout.master')

@section('content')

    <h1>
        Login PAge
    </h1>
    <div style="width:15%;margin-left:20px;">
    <form action="{{ url('userLogin') }}" method="POST">
        @csrf
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="enter your email" value="{{old('email')}}">
        @error('email')
        <span style="color:red;">{{ $message }}</span>
        @enderror <br><br>

        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="enter your password" value="{{old('password')}}">
        @error('password')
        <span style="color:red;">{{ $message }}</span>
        @enderror <br><br>

        <input type="submit">

    </form>
    </div>
@endsection

@section('js')
    <script>
        var err = "{{ session('error') ? session('error') : '' }}";
        if(err !== ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: err,
            })
        }
    </script>
@endsection

@extends('dashboard.layout.master')

@section('content')
<a href="javascript:void(0)" id="code" onclick="myFunction()" data-code="{{ Auth::user()->referral_code }}"><h6 style="cursor:pointer;" >Referral Code link</h6></a>
<h2 class="mb-4" style="float: left;">Sidebar #04</h2>
<h2 class="mb-4" style="float: right;">{{ $networkCount*10 }} Points</h2>



<table class="table">
  <thead>
    <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Email</th>
        <th>is_verified</th>
    </tr>
  </thead>
  <tbody>
    @if(count($networkData) > 0 )
    @php $x=1; @endphp
    @foreach($networkData as $data) 
    <tr>
        <td>{{ $x++ }}</td>
        <td>{{ $data->user->name }}</td>
        <td>{{ $data->user->email }}</td>
        <td>{{ $data->user->is_verified == 1 ? "YES" : "NO" }}</td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="4">No Reffetals Found!</td>
    </tr>
    @endif

  </tbody>
</table>




<script>
  function myFunction(){
    var text = $('#code').data("code");
   // text.select();
    navigator.clipboard.writeText(text);

// Alert the copied text
alert("Copied the text: " + text);
  }
</script>


@endsection
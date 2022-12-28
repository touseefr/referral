@extends('dashboard.layout.master')

@section('content')
<style>
  #social-links ul {
    padding-left: 0;
  }

  #social-links ul li {
    display: inline-block;
  }

  #social-links ul li a {
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 1px;
    font-size: 25px;
  }

  #social-links .fa-facebook {
    color: #0d6efd;
  }

  #social-links .fa-twitter {
    color: deepskyblue;
  }

  #social-links .fa-linkedin {
    color: #0e76a8;
  }

  #social-links .fa-whatsapp {
    color: #25D366
  }

  #social-links .fa-reddit {
    color: #FF4500;
    ;
  }

  #social-links .fa-telegram {
    color: #0088cc;
  }
</style>

<div class="social-btn-sp">
  
</div>
<a href="javascript:void(0)" id="code" onclick="myFunction()" data-code="{{ Auth::user()->referral_code }}">
  <h6 style="cursor:pointer;">Referral Code link</h6>
</a>
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
  function myFunction() {
    var text = $('#code').data("code");
    // text.select();
    var url = "{{ URL::to('/') }}/referral-register?ref=" + text;

    navigator.clipboard.writeText(url);

    // Alert the copied text
    alert("Copied the text: " + url);
  }
</script>


@endsection
@extends('dashboard.layout.master')

@section('content')
<h2 class="" style="float: center;">Reffetal Tracker</h2>

<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

   var test = @json($datesLabel);
   console.log(test);

   var datesLabel = JSON.parse(@json($datesLabel));
   console.log('aa');
   console.log(datesLabel);
   var datesData = JSON.parse(@json($datesData));

  const ctx = document.getElementById('myChart');
  
  new Chart(ctx, {
    type: 'line',
    data: {
        labels: datesLabel,
    datasets: [
        {
            label: "Referral User",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            pointHitRadius: 10,
            data: datesData,
        }
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<style>
    #myChart{
        width: 100% !important;
    }
</style>
@endsection
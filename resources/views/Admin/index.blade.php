@php $hName='Panel de Control' @endphp

<x-layouts.panel  headerName="Panel de Control" index='1'>
    <x-slot name="content">
        <div class="continer mx-auto ">

            <!--history-->
            <div class="historyLink">
              <a href="#" class="active">{{$hName}} /</a>
              <h1><i class="fa-solid fa-chart-pie fa-xs"></i>
                {{$hName}}</h1>
            </div>
            
             <!--data-->
            <div class="">
                <div class="dashboard__data">
                    <div class="my-24">
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="my-12">
                        <canvas id="barChart1"></canvas>
                        </div>
                        <div class="my-12">
                        <canvas id="barChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
          </div>
          <script>
            
            var ctx = document.getElementById('barChart').getContext('2d');
            var ctx1 = document.getElementById('barChart1').getContext('2d');
            var ctx2 = document.getElementById('barChart2').getContext('2d');


            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($inscripciones['labels']),
                    datasets: [{
                        label: 'Total Inscripciones',
                        data: @json($inscripciones['data']),
                        backgroundColor: 'rgb(113, 211, 249)',
                        borderColor: 'rgb(113, 211, 249)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            var myChart = new Chart(ctx1, {
                type: 'polarArea',
                data: {
                    labels: @json($usersData['labels']),
                    datasets: [{
                        label: 'Usuarios',
                        data: @json($usersData['data']),
                        backgroundColor: ['rgb(113, 211, 249)','rgb(156, 111, 247)','rgb(228, 73, 163)'],
                        borderColor: 'rgb(255, 255, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            var myChart = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: @json($cursosData['labels']),
                    datasets: [{
                        label: 'Cursos',
                        data: @json($cursosData['data']),
                        backgroundColor: ['rgb(113, 211, 249)','rgb(156, 111, 247)','rgb(228, 73, 163)'],
                        borderColor: 'rgb(255, 255, 255)',
                        borderWidth: 1
                    }]
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
    </x-slot>
</x-layouts.panel>
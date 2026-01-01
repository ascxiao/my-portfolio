@extends('dashboard')

@section('content')
    <div class="flex p-16 bg-white rounded gap-1">
        <div class="flex flex-wrap w-1/4 gap-2">
            <div class="card flex-col p-8 items-center border rounded w-full text-center">
                <h2>Total No. of Projects</h2>
                <div class="text-5xl font-bold text-green-500 mb-2">{{$projects->count()}}</div>
            </div>

            <div class="card flex-col p-8 items-center border rounded w-full text-center">
                <h2>Total No. of Certificates</h2>
                <div class="text-5xl font-bold text-green-500 mb-2">{{$certificates->count()}}</div>
            </div>

            <div class="card flex-col p-8 items-center border rounded w-full text-center">
                <h2>Total No. of Case Studies</h2>
                <div class="text-5xl font-bold text-green-500 mb-2">{{$cases->count()}}</div>
            </div>
        </div>

        <div class="w-3/4">
            <div class="w-full bg-white rounded-xl shadow-md p-4 border border-gray-100">
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-4 text-gray-700">Top Skills (Categories)</h3>
                    <canvas id="techStackChart"></canvas>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-4 text-gray-700">Portfolio Content Mix</h3>
                    <div class="h-64 flex justify-center"> 
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const techData = @json($categoriesCount);
    
     new Chart(document.getElementById('techStackChart'), {
        type: 'bar',
        data: {
            labels: techData.map(item => item.name),
            datasets: [{
                label: 'Projects',
                data: techData.map(item => item.count),
                
                backgroundColor: '#10b981', 
                
                borderRadius: 6, 
                
                borderWidth: 0 
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                legend: { display: false } 
            },
            scales: {
                x: {
                    grid: { display: false }, 
                    ticks: {
                        font: { family: "'Roboto', sans-serif" }, 
                        color: '#6b7280'
                    }
                },
                y: {
                    grid: { display: false },
                    ticks: {
                        font: { family: "'Roboto', sans-serif" },
                        color: '#1f2937' 
                    }
                }
            }
        }
    });

    const distData = @json($distribution);

    new Chart(document.getElementById('distributionChart'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(distData),
            datasets: [{
                data: Object.values(distData),
                backgroundColor: [
                    '#14532d', // dark green
                    '#166534', // green
                    '#22c55e', // emerald
                    '#34d399', // light emerald
                    '#86efac'  // pale green
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right' }
            }
        }
    });
    </script>
@endsection
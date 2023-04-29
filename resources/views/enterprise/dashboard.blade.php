@extends('layouts.enterprise')
@section('content')
@section('title', 'Dashboard')
<div class="container">
    <div class="mx-auto border border-dark rounded-2 p-2">
        <div class="row row-cols-1 row-cols-lg-2">
            <div class="col mt-2">
                <h3 class="fw-bol">Revernue</h3>
            </div>
            <div class="col mt-2">
                <form action="/dashboard" method="GET">
                    <div class="row text-end pe-5">
                        <div class="col mt-2">
                            <label for="year">Choose Year:</label>
                            <select name="year" id="year" onchange="this.form.submit()">
                                <option value="{{$currentYear-4}}" @if ($currentYear-4 == $select) selected @endif>{{$currentYear-4}}</option>
                                <option value="{{$currentYear-3}}" @if ($currentYear-3 == $select) selected @endif>{{$currentYear-3}}</option>
                                <option value="{{$currentYear-2}}" @if ($currentYear-2 == $select) selected @endif>{{$currentYear-2}}</option>
                                <option value="{{$currentYear-1}}" @if ($currentYear-1 == $select) selected @endif>{{$currentYear-1}}</option>
                                <option value="{{$currentYear}}" @if ($currentYear == $select) selected @endif>{{$currentYear}}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="layouts divider"></div>
        <div class='mx-auto'>
            <div>
                <canvas id="scatterChart" class="m-3 w-100 h-100 mx-auto" height="350"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("scatterChart").getContext('2d');
    var mixedChart = new Chart(ctx, {
        type: 'scatter',
        data: {
            datasets: [{
                label: 'Bar Revenue',
                type: 'bar',
                data: [{{ $revenue1 }}, {{ $revenue2 }}, {{ $revenue3 }},
                    {{ $revenue4 }},
                    {{ $revenue5 }}, {{ $revenue6 }}, {{ $revenue7 }},
                    {{ $revenue8 }},
                    {{ $revenue9 }}, {{ $revenue10 }}, {{ $revenue11 }},
                    {{ $revenue12 }},
                ],
                backgroundColor: 'rgb(133, 255, 231)',
                order: 2
            }, {
                label: 'Line Revenue',
                data: [{{ $revenue1 }}, {{ $revenue2 }}, {{ $revenue3 }},
                    {{ $revenue4 }},
                    {{ $revenue5 }}, {{ $revenue6 }}, {{ $revenue7 }},
                    {{ $revenue8 }},
                    {{ $revenue9 }}, {{ $revenue10 }}, {{ $revenue11 }},
                    {{ $revenue12 }},
                ],
                type: 'line',
                borderColor: 'rgb(255,0,0)',
                order: 1
            }],
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December']
        },
        options: {
            plugins: {
                resposive: true,
                legend: {
                    display: false,
                }
            }
        }
    });
</script>
@endsection

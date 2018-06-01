@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Brecha de Mercado') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div id="containerDO"></div>
                            <hr>
                            <div id="containerG"></div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>
	let demand = []
	let offer = []
	let gap = []
	@foreach($projection as $key => $value)
		demand.push({{$value->demand}})
		offer.push({{$value->offer}})
		gap.push({{$value->gap}})
	@endforeach	
		
	Highcharts.chart('containerDO', {

	    title: {
	        text: 'Oferta y Demanda'
	    },

	    yAxis: {
	        title: {
	            text: ''
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'middle'
	    },

	    plotOptions: {
	        series: {
	            label: {
	                connectorAllowed: false
	            },
	            pointStart: {{$year}}
	        }
	    },

	    series: [{
	        name: 'Demanda',
	        data: demand
	    }, {
	        name: 'Oferta',
	        data: offer
	    }],

	    responsive: {
	        rules: [{
	            condition: {
	                maxWidth: 500
	            },
	            chartOptions: {
	                legend: {
	                    layout: 'horizontal',
	                    align: 'center',
	                    verticalAlign: 'bottom'
	                }
	            }
	        }]
	    }
	});
	Highcharts.chart('containerG', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Brecha'
	    },
	    xAxis: {
	        crosshair: true
	    },
	    yAxis: {
	        title: {
	            text: ''
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y:.3f}</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        series: {
	            label: {
	                connectorAllowed: false
	            },
	            pointStart: {{$year}}
	        }
	    },
	    series: [{
	        name: 'Brecha',
	        data: gap

	    }]
	});
</script>
@endsection

@extends('Admin.layout')

@section('content')
<div class="col-12">
    <label for="inputEmail4" class="form-label">Other sale</label>
    <form  id="myForm"  action="{{url('admin/company/yearly')}}" method="GET">
        <input type="hidden" name="id" class="form-control" value="{{$id}}">
        <select id="inputState" class="form-select" name="period" onchange="submitForm()">
          <option selected>Choose...</option>

          <option value="week" >weekly sale
          </option>
          <option  value="year">yearly sale
        </option>
        <option  value="month">Monthly sale
        </option>

        </select>
    </form>

</div>
<br>
<br>
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Monthly sale</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="chart-container">
            <div class="chart" id="google-column"></div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }
    </script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    var GoogleColumnBasic = function() {
        var _googleColumnBasic = function() {
            // Initialize chart
            google.charts.load('current', {
                callback: function () {

                    // Draw chart
                    drawColumn();

                    // Resize on sidebar width change
                    $(document).on('click', '.sidebar-control', drawColumn);

                    // Resize on window resize
                    var resizeColumn;
                    $(window).on('resize', function() {
                        clearTimeout(resizeColumn);
                        resizeColumn = setTimeout(function () {
                            drawColumn();
                        }, 200);
                    });
                },
                packages: ['corechart']
            });

            // Chart settings
            function drawColumn() {

                // Define charts element
                var line_chart_element = document.getElementById('google-column');

                // Data
                var data = google.visualization.arrayToDataTable([
                    ['day', 'Sale'],
                    @foreach($days as $day)
                    ['{{$day->date}}',  {{$day->amount}}],
                    @endforeach
                ]);



                // Options
                var options_column = {
                    fontName: 'Roboto',
                    height: 400,
                    fontSize: 12,
                    chartArea: {
                        left: '5%',
                        width: '94%',
                        height: 350
                    },
                    tooltip: {
                        textStyle: {
                            fontName: 'Roboto',
                            fontSize: 13
                        }
                    },
                    vAxis: {
                        title: 'Amount in PKR',
                        titleTextStyle: {
                            fontSize: 13,
                            italic: false
                        },
                        gridlines:{
                            color: '#e5e5e5',
                            count: 10
                        },
                        minValue: 0
                    },

                    legend: {
                        position: 'top',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 12
                        }
                    },

                    colors:['red'],
                    is3D:true
                };

                // Draw chart
                var column = new google.visualization.ColumnChart(line_chart_element);
                column.draw(data, options_column);
            }
        };

        return {
            init: function() {
                _googleColumnBasic();
            }
        }
    }();

    GoogleColumnBasic.init();
</script>
@endsection

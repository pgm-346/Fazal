@extends('layout')
@section('content')

    <div class="container box">
        <div class="row justify-content-center pad-bot ">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert"  align="center">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
                    

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4" align="left">Account Holder - <b><span>{{Auth::user()->name}}</span></b></div>
                    <div class="col-md-4" align="right">
                        <div class="input-group input-daterange">
                            <input type="text" name="from_date" id="from_date" readonly class="form-control" />
                            <div class="input-group-addon">to</div>
                            <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3" align="right">
                        <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
                        <a href="{{url('dashboard') }}" class="btn btn-success btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered ta_cnt" id="panel-body">
                    <thead>
                        <tr class="ta">
                        <th class="ta_cnt" width="30%">Transaction Date</th>
                        <th class="ta_cnt" width="20%">Debit</th>
                        <th class="ta_cnt" width="20%">Credit</th>
                        <th class="ta_cnt" width="30%">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                    </table>
                {{ csrf_field() }}
                </div>
                
            </div>
        </div>
    </div>    

             
   



<script>
$(document).ready(function(){
    $("#panel-body").hide();
    var date = new Date();

    $('.input-daterange').datepicker({
    todayBtn: 'linked',
    format: 'yyyy-mm-dd',
    autoclose: true
    });

    var _token = $('input[name="_token"]').val();

    fetch_data();

 function fetch_data(from_date, to_date)
 {
     
    $.ajax({
        url:"{{ route('daterange.fetch_data') }}",
    method:"POST",
    data:{from_date:from_date, to_date:to_date, _token:_token},
    dataType:"json",
    success:function(data)
    {
        $("#panel-body").show();
        // console.log();
        var output = '';
        
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
          if(data[count].debit == null )
          {
            var debit = '';
          }
          
          else
          {
            var debit = data[count].debit;
          }

          if(data[count].credit == null )
          {
            var credit = '';
          }

          else
          {
            var credit = data[count].credit;
          }
         if(data[count].created_at)
         {
           var date = data[count].created_at;
           var date = date.split('T')[0];
         }
                   
        output += '<tr>';
        output += '<td>' + date + '</td>'; 
        output += '<td>' + debit + '</td>';
        output += '<td>' + credit + '</td>';
        output += '<td>' + data[count].balance + '</td></tr>';
    
        }
        $('tbody').html(output);
    }
    })
 }

 $('#filter').click(function(){
    
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
           
        fetch_data(from_date, to_date);
        }
        else
        {
           
        alert('Both Date is required');
        }
    });

    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $("#panel-body").hide();
        fetch_data();
    });


});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

@endsection

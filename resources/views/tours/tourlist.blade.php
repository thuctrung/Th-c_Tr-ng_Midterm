<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	table, th, td {
		font-size:20px;
		width:2000px;
		margin-top: 20px;
	}

	th {
		background-color: #8181F7;
		font-size: 25px;
		color: black;
	}
    .btn{
        font-size: 25px;
    }

	td {
		background-color: #E0E0F8;
		
		color: black;
	}
/* .containe{
    margin-left:50px ;
    margin-right:50px ;
} */

</style>
<body>
@if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
    
    <center><h2>Danh sách tour </h2></center>
    <button type="button" class="btn btn-warning" onclick="window.location='{{ route('tour.create') }}'">Add a new tour</button>
    <br/>

    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Image</th>
                <th>Typetour</th>
                <th>Schedule</th>
                <th>Depart</th>                
                <th>Number People</th>
                <th>Price</th>
            </tr>
        </thead>
		
        <tbody>
            @php
                $stt=0;
            @endphp
            @foreach($tours as $tour)

            <tr>
                <td>{{ ++$stt }}</td>
                <td>{{ $tour->name }}</td>
                <td><img src="/tours/{{ $tour->image}}" style="width: 50px; height:50px;" onclick="window.location='/tours/{{ $tour->id }}'" /></td>
                <td>{{ $tour->typetour}}</td>
                <td>{{ $tour->schedule }}</td>
                <td>{{ $tour->depart }}</td>
                <td>{{ $tour->number }}</td>
                <td>{{ $tour->price }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>


	</div>
    
</body>
</html>
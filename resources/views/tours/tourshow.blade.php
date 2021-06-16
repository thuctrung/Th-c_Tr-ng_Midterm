<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</head>
<style>

 .card-columns{
    display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
 }
 .card {
     padding: 5px 5px;
     text-align: center;
 }
 .card-body{
     color: blue;
     background: #E3CEF6;
 }
 .card-columns{
     background: #A9A9F5;
 }
</style>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>
</nav>
    <div class="container">
        
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <center>
            <h2>List Tours</h2>
        </center>
        <div class="tab">

        </div>



    
        @php
        $stt=0;
        @endphp
        <div class="card-columns">
        @foreach($tours as $tour)
            
                <div class="card" style="width:300px">
                <td><img src="/tours/{{ $tour->image}}" style="width: 200px; height:150px;" onclick="window.location='/tours/{{ $tour->id }}'" /> 
                    <div class="card-body">
                        <h4 class="card-title">{{ $tour->nam }}</h4>
                        <p class="card-title">{{ $tour->typetour }}</p>
                        <p class="card-title">{{ $tour->schedul }}</p>
                        <p class="card-title">{{ $tour->depart }}</p>
                        <p class="card-title">{{ $tour->number }}</p>
                        <p class="card-title">{{ $tour->price }}</p>
                        <!-- <a href="#" class="btn btn-primary stretched-link">See Profile</a> -->
                
                </div>
            </div>
    
   
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>Laravel Search with pagination</title>
</head>
<body>
    <div class="container">
        <div class="row">
           <div class="col-md-6" style="margin-top:40px">
              <h4>Search Everything</h4><hr>
              <form method="GET" action="{{ route('web.search')}}">

                <div class="form-group">
                   <label for="">Enter keyword</label>
                   <input type="text" class="form-control" name="query" placeholder="Search here....." >
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary mt-3">Search</button>
                </div>
             </form>
             <br>
             <br>
             <hr>
             <br>
             @if(isset($countries))
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Independance Year</th>
                           <th>Continent</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($countries) > 0)
                           @foreach($countries as $countrie)
                              <tr>
                                  <td>{{ $countrie->Name }}</td>
                                  <td>{{ $countrie->IndepYear }}</td>
                                  <td>{{ $countrie->Continent }}</td>
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>
               <div class="pagination-block">
                <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
                {{  $countries->appends(request()->input())->links('layouts.paginationlinks') }}
            </div>

               @endif

           </div>
        </div>
    </div>
</body>
</html>

<!doctype html>
<html lang="tr">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body class="vh-100">

    


    <div class="dropdown open mx-auto text-center pt-5">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
            {{ session()->has('unit') ? session()->get('unit') : 'Select Unit' }}
      </button>
      <div class="dropdown-menu" aria-labelledby="triggerId">
        @foreach($result['units'] as $item)
        <a class="dropdown-item" href="{{route('unit-convert', ['unit' => $item])}}">{{$item}}</a>
        @endforeach
      </div>
    </div>


      <div class="h-100 d-flex flex-column justify-content-center align-items-center">
        @if($errors->any())
        <div class="alert alert-danger w-100 text-center" role="alert">
            <strong>{{ implode('', $errors->all(':message')) }}</strong>
        </div>
        @endif
        <div class="alert alert-success w-100 text-center" role="alert">
          <strong>Price:</strong>&nbsp; <span id="price">{{ 50 * session('rate') }}</span>
                                                         {{-- 50 = My product price --}}
      </div>
  
    </div>    

           
    
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
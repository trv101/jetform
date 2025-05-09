<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif

  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add your personal details
    </div>
    <div class="card-body">
        <form action="{{url('store-form')}}" method="POST">
            @csrf
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required>
            <br><br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required>
            <br><br>
            <button type="submit">Submit</button>
        </form>
        
    </div>
  </div>
</div>  
</body>
</html>
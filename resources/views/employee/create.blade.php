<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Add Employee</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
</head>

<body>
  <div class="container my-5">
    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name"
          class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>

        @error('name')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email"
          class="form-control @error('email') is-invalid @enderror" value="{{ old('email' )}}"/>
        @error('email')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="department" class="form-label">Department</label>
        <input type="department" name="department" id="department" placeholder="Enter department"
          class="form-control @error('department') is-invalid @enderror" value="{{ old('depart ment')}}"/>
        @error('department')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>

      <button class="btn btn-success">Submit </button>
      <button type="button" class="btn btn-primary">
        <a class="text-light text-decoration-none" href="{{ route('employees.index') }}">Back to home</a>
      </button>
    </form>
  </div>
</body>

</html>
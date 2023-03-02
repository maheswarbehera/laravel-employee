<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container my-5">
        <button type="button" class="btn  btn-primary">
          <a class="text-light text-decoration-none" href="{{route('employees.create')}}">Add Employee</a>
        </button>
    </div>
   @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="container ">
        <table class="table table-hover "  id="myTable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Department</th>                
              <th scope="col">Action</th>                
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <td>1</td>
            <td>Maheswar</td>
            <td>Maheswar@gmail.com</td>
            <td>Dev</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">
                    <a class="text-light text-decoration-none" href="">Update</a>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                    <a class="text-light text-decoration-none" href="">Delete</a>
                </button> 
            </td>
          </tbody>
        </table>
      </div>
</body>
</html>
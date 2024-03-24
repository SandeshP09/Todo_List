<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Todo List</title>
</head>
<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card rounded-3">
            <div class="card-body p-4">
  
              <h4 class="text-center my-3 pb-3">To Do App</h4>
  
              <form method="post" action="{{url('/savetask')}}" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" >
   @csrf
                <div class="col-12">
                  <div class="form-outline">
                    <br>
                    <input type="text" id="description" class="form-control" name="description"/>
                    
                    <label class="form-label" for="form1">Enter a task here</label>
                  </div>
                </div>
  
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
  
                
              </form>
  
              <table class="table mb-4">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Todo item</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $sn= 1;
                  @endphp
                  @foreach($TodoData as $todo)
                  <tr>
                    <td class="text-center">{{ $sn }}</td>
                    <td class="text-center">{{ $todo->description }}</td>
                    <td class="text-center">{{ $todo->status }}</td>
                    <td class="text-center">
                      <a href="edit-todo-{{ $todo->id }}" class="btn btn-warning">Edit</a>
                      <a href="delete-todo-{{ $todo->id }}"  class="btn btn-danger text-white">Delete</a>
                      <a href="completed-todo-{{ $todo->id }}"  class="btn btn-success ms-1">Finished</a>
                  </td>
                  </tr>
                  @php
                  $sn++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
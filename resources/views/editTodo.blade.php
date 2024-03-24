<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Edit Todo</title>
</head>
<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card rounded-3">
            <div class="card-body p-4">
  
              <h4 class="text-center my-3 pb-3">Edit Todo</h4>
  
              <form method="post" action="{{url('/edittodovalid')}}" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" >
   @csrf
                <div class="col-12">
                  <div class="form-outline">
                    <input type="text" id="description" class="form-control" name="description" value="{{$todoData->description}}"/>
                    <input type="hidden" name="id" id="id" value="{{$todoData->id}}">
                    
                    <label class="form-label" for="form1">Enter a task here</label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
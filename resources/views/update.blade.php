<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h1 class="form">Update Book</h1>
      <form class="form" action="{{route('update', ['id' => $library->id])}}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{$library->title}}" placeholder="Input The Title">
        </div>

            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror


        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input name= "author" type="text" class="form-control" id="author" value="{{$library->author}}" placeholder="Input The Author">
        </div>

            @error('author')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror


        <div class="mb-3">
            <label for="page" class="form-label">Page</label>
            <input name= "page" type="numeric" class="form-control" id="page" value="{{$library->page}}" placeholder="Input How Many Page">
        </div>

            @error('page')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror


        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input name= "year" type="numeric" class="form-control" id="year" value="{{$library->year}}" placeholder="Input The Year of Publication">
        </div>

            @error('year')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="file" class="form-label">Image</label>
            <input name= "file" type="file" class="form-control" id="file" placeholder="Upload Image">
        </div>

            @error('file')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <button type="submit" class="btn btn-success">Update</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

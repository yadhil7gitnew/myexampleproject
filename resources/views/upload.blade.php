<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>image upload demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form  method="POST"   action={{route("upload.post")}} enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <br>
                <label for="formFile" class="form-label"><h4>IMAGE UPLOAD EXAMPLE;</h4></label><hr>
                <input class="form-control" name="file" type="file" id="formFile">
              </div>
              <input type="submit" class="btn btn-primary" style="background-color: red; " value="Submit">
                   </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

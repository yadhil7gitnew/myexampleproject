 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = $('<img>').attr('src', e.target.result).css('max-width', '75px'); // Create img element using jQuery
                        const chosenImageContainer = $('#chosenImageContainer');
                        chosenImageContainer.empty(); // Clear previous image
                        chosenImageContainer.append(img); // Append img element to chosenImageContainer
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
</head>
<body>



<h2> EDIT USER FORM<h2><br>
  <form action="{{ url('update/'.$user->id) }}" method="POST" enctype="multipart/form-data">

        <label for="">Name</label><input type="text" name="name" value="{{$user->name}}"><br>
             <label for="">Age</label><input type="number" name="age" value="{{$user->age}}"><br>
                   <label for="">Phone</label><input type="number" name="phone" value="{{$user->phone}}"><br>
             <label for="">Email</label><input type="text" name="email" value="{{$user->email}}"><br>
        <label for="">Department</label>
               <select name="department">
        <option value="1" @if($user->department == 1) selected @endif>Manager</option>
              <option value="2" @if($user->department == 2) selected @endif>Admin</option>
                     <option value="3" @if($user->department == 3) selected @endif>Sales</option>
              <option value="4" @if($user->department == 4) selected @endif>Developer</option>
        </select><br>
        <label for="">Image:</label>
       <input type="file" id="image" name="image">
       <div id="chosenImageContainer">
        @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="Image" style="max-width: 75px;">
        @endif
        </div>

        <br>
        @csrf
        <input type="submit" value="Update User">

    </form>


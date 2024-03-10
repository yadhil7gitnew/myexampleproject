
<h2> CREATE USER FORM<h2>
<h5>
    @if($errors->any())
    @foreach($errors->all() as $error)
    {{ $error}}<br>
    @endforeach
    @endif
</h5>

<form action="store" method="POST" enctype="multipart/form-data">

    <label for="">Name</label>
    <input type="text" name="name">
    <br><br>
    <label for="">Age</label>
    <input type="number" id="age" name="age" max="99">
    <br><br>
    <label for="">Phone</label>
    <input type="number" name="phone">
    <br><br>
    <label for="">Email</label>
    <input type="text" name="email">
    <br><br>
    <label for="">Department</label>

    <select name="department">
        <option value="1">manager</option>
        <option value="2">admin</option>
        <option value="3">sales</option>
        <option value="4">developer</option>
    </select>
    <br><br>

    <label for="">Image</label>
    <input type="file" id="image" name="image" accept=".jpg, .jpeg">
    <div id="chosenImageContainer"></div>
   <br><br>

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

    <input type="submit" class="btn btn-primary" style="background-color: green; " value="create user">

    @csrf

</form>

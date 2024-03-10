<h3> User list </h3>
@if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <style>
        table,th,td{
        border:1px solid black;
        border-collapse: collapse;
    }
    </style>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Department</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>

        @foreach($users as $user)
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->email}}</td>
        <td> @if($user->department == 1)
        Manager
        @elseif($user->department == 2)
        Admin
        @elseif($user->department == 3)
        Sales
        @elseif($user->department == 4)
        Developer
        @endif
         </td>
         <td><img src="{{ asset('storage/' . $user->image) }}" alt="User Image" style="max-width: 75px;"style="max-height:75px;" ></td>
        <td><a href="edit/{{$user->id}}">Edit</a></td>
        <td><a href="delete/{{$user->id}}">Delete</a></td>

        </tr>
        @endforeach
    </tbody>
</table>


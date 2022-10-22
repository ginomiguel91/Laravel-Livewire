<div class="card-header">

    <h3 class="card-title">DataTable Users</h3>


</div>
<div class="card-body">
    <a href="{{ route('users.store') }}" class="btn btn-success">
        <i class="fas fa-plus">Add User</i>
    </a>
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Dni</th>
                <th>Status</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->dni }}</td>
                    <td>{{ $user->status }}</td>
                    <td>



                        <a href="#" class="fas fa-trash">

                        </a>

                    </td>



                </tr>
            @endforeach


        </tbody>

    </table>
</div>

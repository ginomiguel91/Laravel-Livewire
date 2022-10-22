<div class="card-header">

    <h3 class="card-title">DataTable Roles</h3>


</div>
<div class="card-body">
    <a href="{{ route('roles.store') }}" class="btn btn-success">
        <i class="fas fa-plus">Add Role</i>
    </a>
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>



                        <a href="#" class="fas fa-trash">

                        </a>

                    </td>



                </tr>
            @endforeach


        </tbody>

    </table>
</div>

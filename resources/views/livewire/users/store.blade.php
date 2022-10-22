<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Store User</h3>
    </div>


    <form wire:submit.prevent="addUser"class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  wire:model="name"placeholder="Name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Lastname</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  wire:model="last_name"placeholder="Lastname">
                    @error('last_name') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  wire:model="username"placeholder="Username">
                    @error('username') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control"  wire:model="email"placeholder="Email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control"  wire:model="password"placeholder="*****">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="active|suspended" value="active"
                    wire:model.="status">                
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                    {{-- <select wire:model.="status" class="form-control select2" style="width: 100%;">
                        <option selected="selected" value="active">active</option>
                    
                      
                        </select> --}}
                
                </div>
            </div>
            <div class="form-group row">
                <label for="dni" class="col-sm-2 col-form-label">Dni</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  wire:model="dni"placeholder="XXXXXXXX">
                    @error('dni') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Save</button>
            {{-- <a type="submit" href="{{ route(user.index) }}"class="btn btn-default float-right">Cancel</button> --}}
        </div>

    </form>
</div>

</div>

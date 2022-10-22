<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Store Role</h3>
    </div>


    <form wire:submit.prevent="addRole"class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  wire:model="name"placeholder="Name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Save</button>
            {{-- <a type="submit" href="{{ route(roles.index) }}"class="btn btn-default float-right">Cancel</button> --}}
        </div>

    </form>
</div>

</div>

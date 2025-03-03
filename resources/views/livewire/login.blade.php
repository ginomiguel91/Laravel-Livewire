<div class="login-box">
    
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form wire:submit.prevent="login">
        
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Username" wire:model="username">
      @error('username') <span class="error">{{ $message }}</span> @enderror
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control" placeholder="Password" wire:model="password">
      @error('password') <span class="error">{{ $message }}</span> @enderror
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      {{-- <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div> --}}
      <!-- /.col -->
      <div class="col-4">
        <button  type="submit" class="btn btn-primary btn-block" >Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
</div>
</div>
</div>
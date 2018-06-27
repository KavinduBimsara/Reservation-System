<!-- Username-->
<div class="form-group col-md-12">
  <label for="name">Username</label>
  <input type="text" class="form-control" placeholder="John Doe" name="name" value="{{ $user->name }}">
</div>

<!-- Email-->
<div class="form-group col-md-12">
  <label for="email">Email</label>
  <input type="email" class="form-control"  name="email" value="{{ $user->email }}">
</div>

<!-- Password-->
<div class="form-group col-md-12">
  <label for="password">Password</label>
  <input type="password" class="form-control" name="password">
</div>

<!-- Password Confirmation-->
<div class="form-group col-md-12">
  <label for="password_confirmation">Password Confirmation</label>
  <input type="password" class="form-control" name="password_confirmation">
</div>

</div> <!-- closes the panel body div-->


<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('users.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ?  : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>
<!-- Title -->
<div class="form-group col-md-2">
  <label for="name">Title</label>
  <select class="form-control" name="title" >
    <option value="Mr.">Mr.</option>
    <option value="Mrs.">Mrs.</option>
    <option value="Ms.">Ms.</option>
  </select>
</div>

<!-- Title -->
<div class="form-group col-md-5">
  <label for="name">First Name</label>
  <input type="text" class="form-control" placeholder="John " name="first_name" value="{{ $customer->first_name }}">
</div>

<!-- Title -->
<div class="form-group col-md-5">
  <label for="name">Last Name</label>
  <input type="text" class="form-control" placeholder="Doe" name="last_name" value="{{ $customer->last_name }}">
</div>

<!-- Email-->
<div class="form-group col-md-6">
  <label for="email">Email</label>
  <input type="email" class="form-control"  placeholder="Watch out for typos" name="email" value="{{ $customer->email }}">
</div>

<!-- Email Confirmation -->
<div class="form-group col-md-6">
  <label for="email">Confirm Email</label>
  <input type="email" class="form-control"  placeholder="Confirm the email" name="email_confirmation" value="{{ $customer->email }}">
</div>


</div> <!-- closes the panel body div-->


<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('customers.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ?  : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>
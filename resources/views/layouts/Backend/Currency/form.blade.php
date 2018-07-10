<div class="form-group col-md-12">
<label for="name">Currency Name</label>
<input type="text" class="form-control"  name="name" value="{{ $currency->name }}">
</div>

<div class="form-group col-md-12">
  <label for="code">Code</label>
  <input type="text" class="form-control"  name="code" value="{{ $currency->code }}">
</div>

</div> <!-- closes the panel body div-->

<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('currencies.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">
          {{ $submitButtonText ? : 'Create' }}
        </button>
      </div>
    </div>
  </div>
</div>
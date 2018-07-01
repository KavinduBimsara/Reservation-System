<div class="form-group col-md-12">
  <label for="name">Amenity Name</label>
  <input type="text" class="form-control" placeholder="Free Parking" name="name" value="{{ $amenities->name }}">
</div>

<div class="form-group col-md-12">
  <label for="email">Description</label>
  <input type="text" class="form-control"  placeholder="free parking for cars" name="description" value="{{ $amenities->description }}">
</div>

</div> <!-- closes the panel body div-->

<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('amenities.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ? : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>
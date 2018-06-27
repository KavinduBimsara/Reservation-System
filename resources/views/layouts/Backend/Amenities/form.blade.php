<div class="form-group col-md-12">
  <label for="name">Amenity Name</label>
  <input type="text" class="form-control" placeholder="John Doe" name="name" value="{{ $amenities->name }}">
</div>

<div class="form-group col-md-12">
  <label for="email">Description</label>
  <input type="text" class="form-control"  name="description" value="{{ $amenities->description }}">
</div>


  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('amenities.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ?  : 'Create' }} 
        </button>
      </div>
    </div>
  </div>
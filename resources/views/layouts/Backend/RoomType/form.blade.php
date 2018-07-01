<div class="form-group col-md-12">
  <label for="name">Name</label>
  <input type="text" class="form-control" placeholder="Give the room type a name" name="name" value="{{ $roomType->name }}">
</div>

<div class="form-group col-md-12">
  <label for="email">Description</label>
  <input type="text" class="form-control" placeholder="Briefly  describe the room type" name="description" value="{{ $roomType->description }}">
</div>


<div class="form-group col-md-12">
  <label for="email">Capacity</label>
  <input type="text" class="form-control" placeholder="How many people can this type of room host?" name="capacity" value="{{ $roomType->description }}">
</div>


</div> <!-- closes the panel body div-->

<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('room-type.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save"
                class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ? : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>
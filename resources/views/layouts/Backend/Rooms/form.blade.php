<div class="form-group col-md-12">
  <label for="name">Room Number</label>
  <input type="text" class="form-control" name="room_no" value="{{ $room->room_no }}">
</div>

<div class="form-group col-md-12">
  <label for="email">Name</label>
  <input type="text" class="form-control" name="name" value="{{ $room->name }}">
</div>


<div class="form-group col-md-12">
  <label for="email">Description</label>
  <input type="text" class="form-control" name="description" value="{{ $room->description }}">
</div>

<div class="form-group col-md-12">
  <label for="email">Room Type</label>
  <select class="form-control" name="room_type_id" id="roomType">
    @foreach($roomTypes as $roomType)
      <option value="{{ $roomType->id }}"> {{ $roomType->name }} | Room Capacity: {{$roomType->capacity  }} guests</option>
  @endforeach
  </select>
</div>


<div class="form-group col-md-12">
  <label for="email">Amenity</label>
  <select class="form-control" name="amenities[]" id="amenities" multiple>
    @foreach($amenities as $amenity)
      <option value="{{ $amenity->id }}"> {{ $amenity->name }}</option>
    @endforeach
  </select>
</div>


</div> <!-- closes the panel body div-->

<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('rooms.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save"
                class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ? : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>

<!-- Start Date -->
<div class="form-group col-md-6">
  <label for="name">Start Date</label>
  <input type="text" class="form-control" name="start_date" id="start_date" data-theme="green-style">
</div>

<!-- End Date -->
<div class="form-group col-md-6">
  <label for="name">End Date</label>
  <input type="text" class="form-control" name="end_date" id="end_date">
</div>

<!-- Room -->
<div class="form-group col-md-6">
  <label for="name">Room Number</label>
  <select class="form-control" name="room_id" id="room_id">
    @foreach($rooms as $room)
      <option value="{{$room->id}}">{{ $room->room_no }}</option>
      @endforeach
  </select>
</div>

<!-- Customer -->
<div class="form-group col-md-6">
  <label for="name">Customer</label>
  <select class="form-control" name="customer_id" id="customer_id">
    @foreach($customers as $customer)
      <option value="{{$customer->id}}">{{ $customer->fullname }}</option>
  @endforeach
  </select>
</div>

</div> <!-- closes the panel body div-->


<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('reservations.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ?  : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>
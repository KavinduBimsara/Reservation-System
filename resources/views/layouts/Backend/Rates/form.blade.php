<!-- Currency -->
<div class="form-group col-md-12">
  <label for="name">Currency</label>
  <input type="text" class="form-control" name="currency_id" value="{{ $rate->currency_id }}">
</div>


<!-- Rate -->
<div class="form-group col-md-12">
  <label for="name">Rate</label>
  <input type="text" class="form-control" name="rate" value="{{ $rate->rate }}">
</div>

<!-- Room -->
<div class="form-group col-md-12">
  <label for="name">Room </label>
  <select class="form-control" name="rooms[]"  id="room_id" multiple>
    @foreach($rooms as $room)
      <option value="{{ $room->id }}"> {{ $room->name }}</option>
    @endforeach
  </select>
</div>

<!-- Start Date-->
<div class="form-group col-md-12">
  <label for="email">Start Date</label>
  <input type="email" class="form-control"  name="start_date" value="{{ $rate->start_date }}">
</div>

<!-- End Date-->
<div class="form-group col-md-12">
  <label for="email">End Date</label>
  <input type="email" class="form-control" name="end_date" value="{{ $rate->end_date }}">
</div>

</div> <!-- closes the panel body div-->


<div class="panel-footer">
  <div class="row">
    <div class="col-md-12">
      <div class="form-action">
        <a href="{{route('rates.index')}}" class="btn btn-sm btn-default">Cancel</a>
        <button type="submit" id="btn-save" class="btn bg-olive btn-sm pull-right">{{ $submitButtonText ?  : 'Create' }} </button>
      </div>
    </div>
  </div>
</div>
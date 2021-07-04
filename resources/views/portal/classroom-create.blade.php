@extends('layouts.dashboard ')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">เพิ่มข้อมูลชั้นเรียน</h4>
      </div>
      <div class="card-body ">
        <form method="POST" action="{{route('classroom.store')}}">
          @csrf
          <label>ชั้นเรียน</label>
          <div class="form-group">
            <input type="text" class="form-control" name="classrooms_name" value="">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-info btn-round">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    // initialise Datetimepicker and Sliders
    demo.initDateTimePicker();
    if ($('.slider').length != 0) {
      demo.initSliders();
    }
  });
</script>
@endsection

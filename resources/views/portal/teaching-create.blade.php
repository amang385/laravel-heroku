@extends('layouts.dashboard ')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title">ข้อมูลการสอน {{$classroom->classrooms_name}}</h4>
      </div>
      <div class="card-body ">
        <form method="POST" action="{{route('teaching.store')}}" enctype='multipart/form-data'>
          @csrf
          {{-- @method('POST') --}}
          <label>วันเวลาเข้าสอน</label>
          <div class="form-group">
            {{-- {{dd( date('d/m/Y h:i:a'))}} --}}
            <input type="text" class="form-control datetimepicker" name="teachings_datetime" value="{{date('d/m/Y H:i')}}" readonly>
          </div>
          <label>คาบ</label>
          <div class="form-group">
            <input type="number" class="form-control" name="teachings_class"  required>
          </div>
          <label>วิชา</label>
          <div class="form-group">
            <input type="text" class="form-control" name="teachings_subject"  required>
          </div>
          <label>ลายเซ็น</label>
          <div class="form-group">
            <input type="text" class="form-control" name="teachings_signature"  required>
          </div>
          <label>หมายเหตุ</label>
          <div class="form-group">
            <input type="text" class="form-control" name="teachings_note">
          </div>
          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
              <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
            </div>
            
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
              <span class="btn btn-rose btn-round btn-file">
                <span class="fileinput-new">กรุณาเลือกรูปภาพ</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="teachings_image" />
              </span>
              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
              <small>-ขนาดไฟล์ไม่ควรเกิน 64 kb</small>
            </div>
          </div>
          <input type="hidden" name="classrooms_id" value="{{$id}}">
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

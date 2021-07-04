@extends('layouts.dashboard ')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
          <h4 class="card-title"> ข้อมูลการสอน {{$classroom->classrooms_name}}</h4>
            <a href="{{route('teaching.create', ['id' => $id])}}" rel="tooltip" class="btn btn-info btn-icon btn-sm float-right">
                <i class="fa fa-plus"></i>
            </a>
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="datatable">
              <thead class="text-primary">
                <th class="text-center">
                  #
                </th>
                <th>
                  วันเวลาเข้าสอน
                </th>
                <th>
                  คาบ
                </th>
                <th>
                  วิชา
                </th>
                <th>
                  ผู้สอน
                </th>
                <th>
                  หมายเหตุ
                </th>
                <th width="100">
                  รูปภาพ
                </th>
                <th class="text-right">
                  จัดการ
                </th>
              </thead>
              <tbody>
                  @forelse ($teachings as $teaching)
                  <tr>
                    <td class="text-center">
                      {{$loop->iteration}}
                    </td>
                    <td>
                      {{date('d/m/Y H:i:s', strtotime($teaching->teachings_datetime))}}
                    </td>
                    <td>
                      {{$teaching->teachings_class}}
                    </td>
                    <td>
                      {{$teaching->teachings_subject}}
                    </td>
                    <td>
                      {{$teaching->teachings_signature}}
                    </td>
                    <td>
                      {{$teaching->teachings_note}}
                    </td>
                    <td>
                      <img src="{{asset('storage/'.$teaching->teachings_image)}}" style="max-width: 150px" alt="">
                    </td>
                    <td class="text-right">
                      @if (Auth()->user()->type == 1)
                      <form method="POST" action="{{route('teaching.destroy', ['id' => $teaching->id])}}">
                          @method('delete')
                          @csrf
                        <button type="submit" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-submit ">
                            <i class="fa fa-times"></i>
                        </button>
                      </form>
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td class="text-center" colspan="6">
                      <p>ไม่มีข้อมูล</p>
                    </td>
                  </tr>
                  @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->

<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
  $(".btn-submit").on('click', function(){
      if ( confirm('คุณแน่ใจว่าต้องการลบ ?') ) {
          return true
      } else {
          return false
      }
  })
</script>
@if (Auth()->user()->type == 1)
    <script>
    //   $(document).ready(function() {
      $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
           'excel'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });
    </script>  
@else
    <script>
      $('#datatable').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //    'excel'
        // ],
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });
</script>
@endif
@endsection

@section('style')
<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet" />
@endsection
@extends('layouts.dashboard ')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
            <h4 class="card-title">ชั้นเรียน</h4>
            @if (Auth()->user()->type == 1)
            <a href="{{route('classroom.create')}}" rel="tooltip" class="btn btn-info btn-icon btn-sm float-right">
                <i class="fa fa-plus"></i>
            </a>
            @endif
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%"" id="datatable">
              <thead class="text-primary">
                <th class="text-center" width="50">
                  #
                </th>
                <th>
                  ชั้นเรียน
                </th>
                <th class="text-right">
                  จัดการ
                </th>
              </thead>
              <tbody>
                  @foreach ($classrooms as $classroom)
                  <tr>
                    <td class="text-center">
                      {{$loop->iteration}}
                    </td>
                    <td>
                      {{$classroom->classrooms_name}}
                    </td>
                    <td class="text-right">
                      {{-- <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm ">
                        <i class="fa fa-user"></i>
                      </button> --}}
                      <a href="/portal/classroom/{{$classroom->id}}/teaching" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                        <i class="fa fa-edit"></i>
                      </a>
                      <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
                        <i class="fa fa-times"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach
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
<script src="../../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script>
    //   $(document).ready(function() {
      $('#datatable').DataTable({
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

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    // });
    </script>
@endsection
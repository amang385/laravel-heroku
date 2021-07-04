@extends('layouts.dashboard ')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
          <h4 class="card-title"> ข้อมูลการสอน</h4>
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
                    <td class="text-right">
                      <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
                        <i class="fa fa-times"></i>
                      </button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td class="text-center" colspan="5">
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

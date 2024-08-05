@extends('layouts.page')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>الإسم</th>
                <th>البريد الالكتروني</th>
                <th>الموبايل</th>
                <th>أب الإعتراف</th>
                <th>العنوان</th>
                <th>تاريخ الميلاد</th>
                <th>الإجتماع</th>
              </tr>
            </thead>


            <tbody>
              <tr>
                <td>{{ $user->fullName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->father }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ $user->meeting }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
    </div>
  </div>
      </div>
    </div>
  </div>
@endsection
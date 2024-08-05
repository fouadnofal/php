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
                <th>دور المستخدم</th>
                <th>الوظيفة</th>
                <th></th>
                
              </tr>
            </thead>


            <tbody>
             @foreach ($users as $user)
               
             
              <tr>
                <td>{{ $user->fullName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->father }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->dob }}</td>
                <td>
                @if ($user->userRole == 'moderator')
                  <span class="badge badge-success" style="font-size: 11px">خادم مسئول</span>
                
                @elseif ($user->userRole == 'admin')
                  <span class="badge badge-warning" style="font-size: 11px">خادم</span>
                
                @elseif ($user->userRole =='user')
                  <span class="badge badge-danger" style="font-size: 11px">مخدوم</span>
                
                @endif
                </td>
                
                <td>
                @if ($user->servant == 1)
                  <span class="badge badge-success">خادم</span>
                @else
                  <span class="badge badge-danger">مخدوم</span>
                @endif
              </td>
              <td>
                <form action="{{ route('served.restore',$user->id) }}" method="POST">
                  @csrf
                  @method('get')
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <button type="submit" class="btn btn-primary">اعادة</button>
                </form>
                <form action="{{ route('served.showTrash',$user->id) }}" method="POST">
                  @csrf
                  @method('get')
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <button type="submit" class="btn btn-info"> عرض </button>
                </form>
              </tr>
              @endforeach
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
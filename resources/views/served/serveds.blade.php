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
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>الموبايل</th>
                <th>أب الإعتراف</th>
                <th>العنوان</th>
                <th>تاريخ الميلاد</th>
                <th>أدوات</th>
              </tr>
            </thead>

            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->fullName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->father }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->dob }}</td>
                <td>
                <a href="{{ route('served.edit', $user->id) }}" class="btn btn-primary">تعديل</a><br>

                <form action="{{ route('served.show',$user->id) }}" method="POST">
                  @csrf
                  @method('get')
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <button type="submit" class="btn btn-info" > عرض </button>
                </form>


                <form method="POST" action="{{ route('served.destroy', $user->id) }}">
                  @csrf
                  @method('get')
                  <button type="submit" class="btn btn-danger" >حذف</button>
                </form>

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
    </div>
  </div>
@endsection
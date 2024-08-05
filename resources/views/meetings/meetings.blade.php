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
                <th>اسم الإجتماع</th>
                <th>الموعد</th>
                <th>المكان</th>
                <th>أمين الخدمة</th>
                <th></th>
              </tr>
            </thead>


            <tbody>
              @foreach($meetings as $meeting)
              <tr>
                <td>{{ $meeting->meetingName }}</td>
                <td>{{ $meeting->meetingTime }}</td>
                <td>{{ $meeting->meetingPlace }}</td>
                
                <td>
                
                    @foreach($users as $user)
                    @if($user->id==$meeting->userID)
                    {{ $user->userName }}
                    @endif
                    @endforeach
                </td>
                 
                
                <td>  <a href="{{ route('meeting.edit', $meeting->id) }}" class="btn btn-primary">تعديل</a><br>
<form action="{{ route('meeting.show',$meeting->id) }}" method="POST">
  @csrf
  @method('get')
  <input type="hidden" name="id" value="{{ $meeting->id }}">
  <button type="submit" class="btn btn-info" > عرض </button>
</form>


<form method="POST" action="{{ route('meeting.destroy', $meeting->id) }}">
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
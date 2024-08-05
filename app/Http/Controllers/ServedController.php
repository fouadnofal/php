<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServedRequest;
use App\Http\Requests\UpdateServedRequest;
use App\Models\User;
use App\Models\Meeting;

class ServedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "إضافة مخدوم";
        $parent = "المخدومين";

        $users = User::where('userRole', 'user')->get();
        return view('served.serveds',compact('users','title','parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "إضافة مخدوم";
        $parent = "المخدومين";
        $meetings = Meeting::where('id', '!=', 1)->select('id','meetingName')->get();
        return view('served.addServed',compact('meetings', 'title','parent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServedRequest $request)
    {
        $data = $this->prepareData($request->all());
        User::create($data);
        if(isset($request->save)){
            $page='served.index';
        }elseif(isset($request->saveAdd)){
            $page='served.create';
        }
        return redirect()
            ->route($page)
            ->with(['messages' => json_encode(['success' => ['Admin created Successfully']])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "عرض مخدوم";
        $parent = "المخدومين";
        $user = User::findOrFail($id);
        $user['meeting'] = $this->getMeeting($id);

        return view('served.showServed',compact('title','parent','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "تعديل مخدوم";
        $parent = "المخدومين";
        $user = User::findOrFail($id);
        $meetings = Meeting::where('id', '!=', 1)->select('id','meetingName')->get();

        return view('served.editServed',compact('title','parent','user', 'meetings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServedRequest $request, string $id)
    {   
        if(isset($request->save)){
            $data = $this->prepareData($request->all());
            User::where('id',$id)->update($data);
        }
        
        return redirect()->route('served.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('served.index');   
    }

    public function trashed()
    {
        $title = "مخدومين محذوفين";
        $parent = "المخدومين";
        $users=User::where('userRole', 'user')->onlyTrashed()->get();

        return view('served.servedsTrashed',compact('title','parent','users'));
    }

    public function showTrash(string $id){
        $title = "عرض مخدومين محذوفين";
        $parent = "المخدومين";
        $user=User::onlyTrashed()->where('id',$id)->first();
        $user['meeting'] = $this->getMeeting($id);
        return view('served.showServed',compact('title','parent','user'));
    }

    public function restore(string $id)
    {
        User::where('id',$id)->restore();
        return redirect()->route('served.index');
    }

    private function prepareData(array $data)
    {
        $userData = [
            'fullName' => $data['fullName'],
            'meeting_id' => $data['meeting_id'],
            'userName' => str()->random(20),
            'email' => $data['email'],
            'password' => str()->random(20),
            'mobile' => $data['mobile'],
            'father' => $data['father'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'userRole' => 'user',
            'servant' => 0,
        ];
        return $userData;
    }

    private function getMeeting($id){
        $meetings = DB::table('users')
         ->join('meetings', 'users.meeting_id', '=', 'meetings.id')
         ->select('meetings.meetingName')
         ->where('users.id', $id)
         ->first();

         return $meetings->meetingName;
    }
}

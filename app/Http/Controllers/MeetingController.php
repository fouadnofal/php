<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "قائمة الإجتماعات";
        $parent = "الإجتماعات";

        $meetings = Meeting::where('meetingName', '!=', 'System')->get();
        // $meetings = Meeting::with('user')->get();
        $users = User::all();
        return view('meetings.meetings',compact('meetings','title','parent','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "إضافة اجتماع";
        $parent = "الإجتماعات";      
        $users = User::where('servant', 1)->get();

        return view('meetings.addMeeting',compact('title','parent','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetingRequest $request)
    {
        
        try {
            
            $meetingData = $this->prepareData($request->all());
            $meetings = Meeting::create($meetingData);
            
            return redirect()
                ->route('meeting.index')
                ->with(['messages' => json_encode(['success' => ['Meeting created Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('meeting.index')
                ->with(['messages' => json_encode(['error' => ['Error creating Meeting: ' . $exception->getMessage()]])]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "عرض إجتماع";
        $parent = "الإجتماعات";
        $meeting = Meeting::findOrFail($id);
        $users = User::all();

        

        return view('meetings.showMeeting',compact('title','parent','meeting','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "تعديل اجتماع";
        $parent = "الإجتماعات";
        $meeting = Meeting::findOrFail($id);
        $users = User::where('servant', 1)->get();

        

        return view('meetings.editmeeting',compact('title','parent','meeting','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Meeting::where('id',$id)->delete();
        return redirect()->route('meeting.index');
    }

    public function trashed()
    {
        $title = "اجتماعات محذوفة";
        $parent = "الإجتماعات";
        $meetings=Meeting::onlyTrashed()->get();
        $users = User::all();
        return view('meetings.meetingsTrashed',compact('title','parent','meetings','users'));
    }

    public function showTrash(string $id){
        $title = "عرض الإجتماعات المحذوفة";
        $parent = "الإجتماعات";
        $meeting=Meeting::onlyTrashed()->where('id',$id)->first();
        //$meeting=Meeting::onlyTrashed()->find($id);
        $users = User::all();
        return view('meetings.showmeeting',compact('title','parent','meeting','users'));
    }

    public function restore(string $id)
    {
        Meeting::where('id',$id)->restore();
        return redirect()->route('meeting.index');
    }

    private function prepareData(array $data)
    {
        $meetingData = [
            'meetingName' => $data['meetingName'],
            'meetingTime' => Carbon::parse($data['meetingTime'])->format('H:i:s'),
            'meetingPlace' => $data['meetingPlace'],
            'userID' => $data['userID'],
            
        ];

        return $meetingData;
    }

    public function messages()
    {
        return [
        
        'meetingName' => 'يرجي ادخال اسم الاجتماع',
        'meetingTime' => 'يرجي ادخال موعد الاجتماع',
        'meetingPlace' => 'يرجي ادخال مكان الاجتماع',
        'userID' => 'يرجي اختيار اسم امين الخدمة',

        ];


}

}

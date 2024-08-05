<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "عرض المستخدمين";
        $parent = "المستخدمين";

        $users = User::whereIn('userRole', ['admin', 'moderator'])->get();
        return view('users.users',compact('users','title','parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "إضافة مستخدم";
        $parent = "المستخدمين";
        return view('users.addUser',compact('title','parent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $this->prepareData($request->all());
        $data['meeting_id'] = 1;
        User::create($data);
        
        return redirect()
            ->route('user.index')
            ->with(['messages' => json_encode(['success' => ['Admin created Successfully']])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "عرض مستخدم";
        $parent = "المستخدمين";
        $user = User::findOrFail($id);

        return view('users.showUser',compact('title','parent','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "تعديل مستخدم";
        $parent = "المستخدمين";
        $user = User::findOrFail($id);

        return view('users.editUser',compact('title','parent','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {   
        $data['servant']=isset($request->servant);
        $data = $this->prepareData($request->all());
        User::where('id',$id)->update($data);
        return redirect()->route('user.index');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('user.index');   
    }

    public function trashed()
    {
        $title = "مستخدمين محذوفين";
        $parent = "المستخدمين";
        $users=User::where('userRole', '!=', 'user')->onlyTrashed()->get();
        return view('users.usersTrashed',compact('title','parent','users'));
    }

    public function showTrash(string $id){
        $title = "عرض مستخدمين محذوفين";
        $parent = "المستخدمين";
        $user=User::onlyTrashed()->where('id',$id)->first();
        return view('users.showUser',compact('title','parent','user'));
    }

    public function restore(string $id)
    {
        // $title = "إضافة مستخدم";
        // $parent = "المستخدمين";
        User::where('id',$id)->restore();
        return redirect()->route('user.index');
    }

    private function prepareData(array $data)
    {
        $userData = [
            'fullName' => $data['fullName'],
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => $data['password'],
            'mobile' => $data['mobile'], 
            'father' => $data['father'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'userRole' => $data['userRole'],
        ];
        return $userData;
    } 
}

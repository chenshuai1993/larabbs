<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest; #表单请求验证
use App\Handlers\ImageUploadHandler; #工具类

class UsersController extends Controller
{
    //
    public function show(User $user)
    {
    	# code...
    	return view('users.show', compact('user'));
    	
    }

    public function edit(User $user)
    {
    	# code...
    	return view('users.edit', compact('user'));
    	
    }

    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
    	
        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 416);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}

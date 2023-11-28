<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AboutUserInterface;
use App\Http\Requests\StoreAboutUserRequest;
use App\Http\Requests\UpdateAboutUserRequest;
use App\Models\AboutUser;
use App\Models\User;

class AboutUserRepository implements AboutUserInterface
{
    public function __construct(public AboutUser $aboutUser)
    {
    }
    public function getAboutUserByUserId(int $userId)
    {
        $user = User::getWithAboutUser($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return $user;
    }

    public function createAboutUser(StoreAboutUserRequest $request)
    {

        $filePath = $request->file('cv_file')->store('upload/cvFile', 'public');

        $about = AboutUser::create([
            'user_job' => $request->user_job,
            'interest_topic' => $request->interest_topic,
            'cv_file' => $filePath,
            'user_id' => auth()->user()->id,
        ]);
        $about->load('users');
        return $about;
    }
    public function updateAboutUser(UpdateAboutUserRequest $request, int $id)
    {

        $about = AboutUser::find($id);
        if (auth()->user()->id != $about->user_id) {
            return response()->json(['error' => 'you are not allowed to this '], 401);
        }

        $about->update([
            'user_job' => $request->user_job,
            'interest_topic' => $request->interest_topic,
            'cv_file' => $request->cv_file,
        ]);

        return $about;
    }

    public function deleteAboutUser(int $id)
    {
        $about = AboutUser::find($id);
        if (auth()->user()->id != $about->user_id) {
            return response()->json(['error' => 'you are not allowed to this '], 401);
        }
        return $about->delete();
    }
}

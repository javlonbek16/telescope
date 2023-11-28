<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutUserInterface;
use App\Http\Requests\StoreAboutUserRequest;
use App\Http\Requests\UpdateAboutUserRequest;
use App\Models\AboutUser;

class AboutUserController extends Controller
{
    public function __construct(public AboutUserInterface $aboutUser)
    {
    }

    public function store(StoreAboutUserRequest $request)
    {
        return  $this->aboutUser->createAboutUser($request);
    }
    public function show(int $id)
    {
        return  $this->aboutUser->getAboutUserByUserId($id);
    }

    public function update(UpdateAboutUserRequest $request, int $id)
    {
        return $this->aboutUser->updateAboutUser($request, $id);
    }
    public function destroy($id)
    {
        return  $this->aboutUser->deleteAboutUser($id);
    }


    public function test()
    {
        $data = AboutUser::get();
        foreach($data as $user){
            $user->users;
        }
        return 'ok';
    }

}

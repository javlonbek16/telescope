<?php

namespace App\Http\Interfaces;

use App\Http\Requests\StoreAboutUserRequest;
use App\Http\Requests\UpdateAboutUserRequest;

interface AboutUserInterface
{
    public function getAboutUserByUserId(int $userId);
    public function createAboutUser(StoreAboutUserRequest $request);
    public function updateAboutUser(UpdateAboutUserRequest $request,int $id);
    public function deleteAboutUser(int $id);
}

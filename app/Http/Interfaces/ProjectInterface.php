<?php

namespace App\Http\Interfaces;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

interface ProjectInterface
{
    public function getProject();
    public function createProject(StoreProjectRequest $request);
    public function updateProject(int $id, UpdateProjectRequest $request);
    public function deleteProject(int $id);
    public function getByIdProject(int $id);
}

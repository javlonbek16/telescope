<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProjectInterface;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function __construct(public ProjectInterface $project)
    {
    }
    public function index()
    {
        return $this->project->getProject();
    }
    public function store(StoreProjectRequest $request)
    {
        return $this->project->createProject($request);
    }
    public function show($id)
    {
        return $this->project->getByIdProject($id);
    }
    public function update(UpdateProjectRequest $request,  $id)
    {
        return $this->project->updateProject($id, $request);
    }
    public function destroy($id)
    {
        return $this->project->deleteProject($id);
    }
}

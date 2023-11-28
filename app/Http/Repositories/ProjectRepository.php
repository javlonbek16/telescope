<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProjectInterface;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectRepository implements ProjectInterface
{
    public function __construct(public Project $project)
    {
    }

    public function getProject()
    {
        $project = Project::paginate(10);
        return $project;
    }
    public function createProject(StoreProjectRequest $request)
    {
        $filePath = $request->file('project_image')->store('upload/project', 'public');

        $project = Project::create([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_link' => $request->project_link,
            'project_image' => $filePath,
            'user_id' => auth()->user()->id,
        ]);
        return $project;
    }

    public function updateProject(int $id, UpdateProjectRequest $request)
    {
        $project = Project::find($id);
        if (auth()->user()->id != $project->user_id) {
            return response()->json(['error' => 'you are not allowed to this '], 401);
        }

        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        $filePath = $request->file('project_image')->store('upload/project', 'public');

        $project->update([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_link' => $request->project_link,
            'project_image' => $filePath,
        ]);
        return $project;
    }
    public function deleteProject(int $id)
    {
        $project = Project::find($id);
        if (auth()->user()->id != $project->user_id) {
            return response()->json(['error' => 'you are not allowed to this '], 401);
        }

        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        $project->delete();
        return ($project);
    }

    public function getByIdProject(int $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        return ($project);
    }
}

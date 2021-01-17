<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('list', compact('projects'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $project = new Project();

        $project->room_id = request('room_id');
        $project->price = request('price');

        $project->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('edit', compact('project'));
    }

    public function update()
    {
        dd('hello');
    }


}

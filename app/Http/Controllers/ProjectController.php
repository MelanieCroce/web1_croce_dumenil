<?php

namespace App\Http\Controllers;
use App\Models\Project;

use App\Http\Requests\ProjectFormRequest;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.project');
    }

    public function store(ProjectFormRequest $request)
    {
        $project = new Project;
        $project->name = $request->name;
        $project->radio = $request->radio;
        $project->projet = $request->projet;
        $project->contexte = $request->contexte;
        $project->demande = $request->demandde;
        $project->objectifs = $request->objectifs;
        $project->email = $request->email;
        $project->number = $request->number;
        $project->postale = $request->postale;
        $project->identité = $request->identité;
        $project->contrainte = $request->contrainte;


        return redirect()->route(articles.index);

    }

    public function show()

    {
        $project = Project::find($id);
        $project->name = $project->name;
        $prpject->demande = $project->demande;
        return redirect()->route('articles.index', $project->id);

    }
}
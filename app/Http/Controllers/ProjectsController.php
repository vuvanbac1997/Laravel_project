<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()){
            $project = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', ['project'=>$project]);
       }
       return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()){
            $project = Project::All();
            $company = Company::where('user_id', Auth::user()->id)->get();
            //dd($project);
            return view('projects.create', ['project'=>$project, 'company'=>$company]);
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id,
                'company_id' => $request->input('company_id'),
                'days'=>$request->input('days')
            ]);

            if ($project){
                return redirect() -> route('projects.show', ['project'=>$project->id])-> with('success', 'Thêm dự án thành công');
            }
            return back()->withInput()->with('errors', 'Thêm dự thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
        //$project = project::where('id', $project->id)->first();
        $project = Project::find($project->id);
        return view('projects.show', ['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);
        return view('projects.edit', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $projectUpdate = project::where('id', $project->id)
        ->update([
            'name'=> $request->input('name'),
            'description' => $request->input('description'),
            'company_id' => $request->input('company')
        ]);
        if ($projectUpdate){
            return redirect()->route('projects.show', ['project'=>$project->id])
            ->with('success', 'Cập nhật thành công');
        }
        else{
             return redirect()->route('projects.show', ['project'=>$project->id])
            ->with('errors', 'Cập nhật thất bại');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $findproject = project::find($project->id);
        if ($findproject->delete() ){
            return redirect()->route('projects.index')->with('success', 'Đã xóa dự án thành công');
        }
        return back()->withInput()->with('error', 'Xoá dự án thất bại');
    }
}

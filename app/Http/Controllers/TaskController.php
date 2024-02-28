<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;
 
class TaskController extends Controller
{
    public function index()
    {
        $task = Task::where('user_id', Auth::user()->id)->paginate(5);
        return view('task.index', compact('task'));
    }
 
    public function create()
    {
        $user_id = Auth::user()->id;
        return view('task.create', compact('user_id'));
    }
 

    public function store(Request $request)
    {
        $task = new Task([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id 
        ]);
    
        $task->save();
    
        return redirect()->route('task.index')->with('success', 'Task added successfully');
    }
 

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
    
        return view('task.show', compact('task'));
    }
 
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $user_id = Auth::user()->id;
        return view('task.edit', compact('task', 'user_id'));
    }
 

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

    if ($request->has('status')) {
        $task->update(['status' => !$task->status]);
    } else {
        $task->update($request->except('user_id')); 
    }

    return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }
 

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
 
        $task->delete();
 
        return redirect()->route('task.index')->with('success', 'task deleted successfully');
    }
    public function updateStatus(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->update(['status' => $request->has('status')]);

    return redirect()->back()->with('success', 'Task status updated successfully.');
}
}
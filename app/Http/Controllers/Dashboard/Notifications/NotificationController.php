<?php

namespace App\Http\Controllers\Dashboard\Notifications;

//use App\DataTables\NotificationDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\DashboardNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
//    protected string $datatable = NotificationDataTable::class;
//    protected string $routeName = 'admin.notification';
//    protected string $viewPath = 'dashboard.notification.list';
//
//
//    public function __construct()
//    {
//        $this->middleware('permission:show_notification')->only(['index']);
//        $this->middleware('permission:create_notification')->only(['create', 'store']);
//    }
    public function index()
    {
        return $this->datatable::create($this->routeName)
            ->render($this->viewPath);
    }
    public function create()
    {
        $roles=Role::all();
        return view('dashboard.notification.add',compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'role_id'=>'required'
        ]);
        $user = User::find($request->user_id);
        $role=Role::find($request->role_id);
        if ($user) {
            $message = [
                'title' => $request->title,
                'body' => $request->body,
                'role'=>$role->name,
                'serial' => Str::random(20),
                'receiver' => $user->name
            ];
            \Illuminate\Support\Facades\Notification::send($user, new DashboardNotification($message));
            return redirect()->route('admin.notification.index')->with('success',__('notification send successfully'));
        }
        $users=Role::find($request->role_id)->users;
        $message = [
            'title' => $request->title,
            'body' => $request->body,
            'role'=>$role->name,
            'serial' => Str::random(20),
            'receiver' => 'All'
        ];
        foreach ($users as $user) {
            \Illuminate\Support\Facades\Notification::send($user, new DashboardNotification($message));
        }
        return redirect()->route('admin.notification.index')->with('success',__('notification send successfully'));

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
    public function markAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return to_route('admin.dashboard');
    }
    public function getUsersByRole(Request $request)
    {
        $role=Role::find($request->role_id);

        return  response()->json($role->users()->get());
    }
    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['message'=>'all notifications marked as read']);
    }

}

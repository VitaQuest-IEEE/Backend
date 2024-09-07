<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UsersDataTable;
use App\Enum\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponseDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AdminsController extends Controller
{
    use ApiResponseDashboard;
    protected string $datatable = UsersDataTable::class;
    protected string $route = 'admin.admins';
    protected string $viewPath = 'dashboard.admins.list';

    public function index()
    {
        $users=User::where('type',UserTypeEnum::ADMIN)->paginate(10);
        return view('dashboard.admins.list',compact('users'));
    }
    public function create()
    {
        return view('dashboard.admins.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|email|required|max:255',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['type']=UserTypeEnum::ADMIN;
        unset($validated['confirm_password']);
        User::create($validated);
        return redirect()->route('admin.admins.index')->with('success', __('dashboard.created'));
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('dashboard.admins.edit',compact('user'));
    }
    public function updatePersonal(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|email|required|max:255',
        ]);
        //dd($validated);
        $request->user()->update($validated);

        return redirect()->route('admin.admins.index')->with('success', __('dashboard.personal-updated'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePassword(Request $request, User $user)
    {
        $user = auth()->user();
        $currentPassword = $request->input('current_password');
        if ( !(Hash::check($currentPassword,auth()->user()->password))){
            return throw ValidationException::withMessages([
                'current_password' => [__('false_password')]
            ]);
        } else {
            $validated = $request->validate( [
                'password' => ['required', 'string', 'confirmed', Password::defaults()],
            ] );
            $user->update([
                'password' => Hash::make($validated['password'])
            ]);
            return redirect()->route('admin.admins.index')->with('success', __('dashboard.password-updated'));
        }

    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.admins.index')->with('success', __('dashboard.deleted'));
    }
    public  function test($id){
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }
    }
}

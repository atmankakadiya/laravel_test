<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionController extends Controller
{
	public function Permission()
	{
		$editor_permission = Permission::where('slug', 'create-tasks')->first();
		$editor_permission_edit = Permission::where('slug', 'edit-tasks')->first();
		$viewer_permission = Permission::where('slug', 'view-tasks')->first();
		$admin_permission = Permission::where('slug', 'edit-users')->first();
		$admin_permission_add = Permission::where('slug', 'create-tasks')->first();
		$admin_permission_edit = Permission::where('slug', 'edit-tasks')->first();
		$admin_permission_delete = Permission::where('slug', 'delete-tasks')->first();

		//RoleTableSeeder.php
		$user_role = new Role();
		$user_role->slug = 'editor';
		$user_role->name = 'Editor_Name';
		$user_role->save();
		$user_role->permissions()->attach($editor_permission);
		$user_role->permissions()->attach($editor_permission_edit);


		$user_role = new Role();
		$user_role->slug = 'viewer';
		$user_role->name = 'Viewer_Name';
		$user_role->save();
		$user_role->permissions()->attach($viewer_permission);


		$admin_role = new Role();
		$admin_role->slug = 'admin';
		$admin_role->name = 'Admin_Name';
		$admin_role->save();
		$admin_role->permissions()->attach($admin_permission);
		$admin_role->permissions()->attach($admin_permission_add);
		$admin_role->permissions()->attach($admin_permission_edit);
		$admin_role->permissions()->attach($admin_permission_delete);

		$editor_role = Role::where('slug', 'editor')->first();
		$viewer_role = Role::where('slug', 'viewer')->first();
		$admin_role = Role::where('slug', 'admin')->first();

		$createTasks = new Permission();
		$createTasks->slug = 'create-tasks';
		$createTasks->name = 'Create Tasks';
		$createTasks->save();
		$createTasks->roles()->attach($editor_role);
		$createTasks->roles()->attach($admin_role);

		$ViewTasks = new Permission();
		$ViewTasks->slug = 'view-tasks';
		$ViewTasks->name = 'View Tasks';
		$ViewTasks->save();
		$ViewTasks->roles()->attach($viewer_role);

		$EditTasks = new Permission();
		$EditTasks->slug = 'edit-tasks';
		$EditTasks->name = 'Edit Tasks';
		$EditTasks->save();
		$EditTasks->roles()->attach($editor_role);
		$EditTasks->roles()->attach($admin_role);


		$EditTasks = new Permission();
		$EditTasks->slug = 'delete-tasks';
		$EditTasks->name = 'Delete Tasks';
		$EditTasks->save();
		$EditTasks->roles()->attach($admin_role);


		$editUsers = new Permission();
		$editUsers->slug = 'edit-users';
		$editUsers->name = 'Edit Users';
		$editUsers->save();
		$editUsers->roles()->attach($admin_role);

		$editor_role = Role::where('slug', 'editor')->first();
		$admin_role = Role::where('slug', 'admin')->first();
		$viewer_role = Role::where('slug', 'viewer')->first();


		$editor_permission = Permission::where('slug', 'create-tasks')->first();
		$editor_permission_edit = Permission::where('slug', 'edit-tasks')->first();
		$viewer_permission = Permission::where('slug', 'view-tasks')->first();
		$admin_permission = Permission::where('slug', 'edit-users')->first();
		$admin_permission_add = Permission::where('slug', 'create-tasks')->first();
		$admin_permission_edit = Permission::where('slug', 'edit-tasks')->first();
		$admin_permission_delete = Permission::where('slug', 'delete-tasks')->first();


		$user = new User();
		$user->name = 'Test_Editor';
		$user->email = 'test_editor@gmail.com';
		$user->password = bcrypt('1234567');
		$user->save();
		$user->roles()->attach($editor_role);
		$user->permissions()->attach($editor_permission);
		$user->permissions()->attach($editor_permission_edit);

		$user = new User();
		$user->name = 'Test_Viewer';
		$user->email = 'test_viewer@gmail.com';
		$user->password = bcrypt('1234567');
		$user->save();
		$user->roles()->attach($viewer_role);
		$user->permissions()->attach($viewer_permission);

		$admin = new User();
		$admin->name = 'Test_Admin';
		$admin->email = 'test_admin@gmail.com';
		$admin->password = bcrypt('admin1234');
		$admin->save();
		$admin->roles()->attach($admin_role);
		$admin->permissions()->attach($admin_permission);
		$admin->permissions()->attach($admin_permission_add);
		$admin->permissions()->attach($admin_permission_edit);
		$admin->permissions()->attach($admin_permission_delete);


		

		return redirect()->back();
	}
}

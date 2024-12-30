<?php
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
if(!function_exists('user_count_admin'))
{
    function user_count_admin()
    {
       $admins = Admin::get();
       return $admins->count();
    }
}
if(!function_exists('roles_count_admin'))
{
    function roles_count_admin()
    {
       $Role = Role::get();
       return $Role->count();
    }
}

?>

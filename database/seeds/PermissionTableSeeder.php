<?php
namespace database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'مشاهدة العينات',
            'أضافة عينات',
            'حذف عينات',
            'تعديل عينات',
            'مشاهدة المحللين',
            'أضافة محللين',
            'تعديل المحللين',
            'حذف المحللين',
            'مشاهدة الأصناف',
            'أضافة الأصناف',
            'تعديل الأصناف',
            'حذف الأصناف',
            'المستخدمين',
            'أضافة مستخدين',
            'تعديل مستخدمين',
            'حذف مستخدمين',
            ' الصلاحيات',
            'أضافة صلاحيات',
            'تعديل صلاحيات',
            'حذف صلاحيات',
            'المستخدمين والصلاحيات',
            'أحصائيات العينات',
            'الأحصائيات',
            'الأعدادات',
            'تقاريرالعينات',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}

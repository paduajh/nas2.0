<?php

namespace App\Console\Commands;

use App\Models\Acl\Role;
use Illuminate\Support\Str;
use App\Models\Acl\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cria permissões default';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $models = [];
        $models  = array_merge($models,$this->getModels(app_path() . "/Models"));
        $models  = array_merge($models,$this->getModels(app_path() . "/Models/Acl"));
        $models  = array_merge($models,$this->getModels(app_path() . "/Models/PreCadastro"));

        $defaultPermissions = [
            'create_',
            'edit_',
            'show_',
            'list_',
            'delete_',
            'restore_',
            'audit_'
        ];
        $insertData = [];

        $perfilAdmin = Role::where('name','admin')->first();
        $perfilDefault = Role::where('name','default')->first();
        foreach($models as $model ) {

            foreach($defaultPermissions as $defaultPermission) {
                $name = $defaultPermission.$model;
                $guard = 'web';
                $created_at = now()->format("Y-m-d H:i:s");
                $updated_at = now()->format("Y-m-d H:i:s");
                $insertData[] = ['name'=>$name,'guard_name'=>$guard,'created_at'=>$created_at,'updated_at'=>$updated_at];
            }

        }

        DB::table('permissions')->upsert($insertData,['name','guard_name']);

        $permissions = Permission::all()->pluck('id');
        $defaultPermissions = Permission::where('name','LIKE','%list_%')->get()->pluck('id');
        $perfilAdmin->syncPermissions($permissions);
        $perfilDefault->syncPermissions($defaultPermissions);
    }

    private function getModels($path){
        $out = [];
        $results = scandir($path);

        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                continue;
            }
            else{
                $arrFile = explode("/",$filename);
                $x = array_pop($arrFile);
                $y = explode(".",$x);
                $name = array_shift($y);

                $out[] = Str::lower($name);
            }
        }
        return $out;
    }
}

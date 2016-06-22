<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        //administradores por defecto
        User::create([
            'name' => 'brayan',
            'email' => 'brayan@mail.com',
            'password' => Hash::make('123456')
        ]);
        User::create([
            'name' => 'wendy',
            'email' => 'wendy@mail.com',
            'password' => Hash::make('123456')
        ]);
        User::create([
            'name' => 'carlos',
            'email' => 'carlos@mail.com',
            'password' => Hash::make('123456')
        ]);
        //usuarios normales
        User::create(['name' => 'gabriel','email' => 'gabriel@mail.com','password' => Hash::make('123456')]);
        User::create(['name' => 'ximena','email' => 'ximena@mail.com','password' => Hash::make('123456')]);
        User::create(['name' => 'max','email' => 'max@mail.com','password' => Hash::make('123456')]);


        //roles
        $administrador= new Role();
        $administrador->name="administrador";
        $administrador->display_name = 'usuario administrador'; 
        $administrador->description  = 'adicionara nuevos productos y los editara'; 
        $administrador->save();

        $usuario= new Role();
        $usuario->name="usuario";
        $usuario->display_name="usuario normal";
        $usuario->description="solo ve productos y añade productos al carrito";
        $usuario->save();


        //permisos
        $adiciona_productos = new Permission();
        $adiciona_productos->name = 'adiciona_productos';
        $adiciona_productos->display_name = 'adicionara productos'; 
        $adiciona_productos->description  = 'adicionara nuevos productos'; 
        $adiciona_productos->save();

        $edita_productos= new Permission();
        $edita_productos->name="edita_productos";
        $edita_productos->display_name="editara los productos";
        $edita_productos->description="editara cualquier producto";
        $edita_productos->save();

        $ver_productos= new Permission();
        $ver_productos->name="ver_productos";
        $ver_productos->display_name="vera los productos";
        $ver_productos->description="vera cualquier producto";
        $ver_productos->save();

        $adiciona_productos_carrito = new Permission();
        $adiciona_productos_carrito->name = 'adiciona_productos_carrito';
        $adiciona_productos_carrito->display_name = 'adicionara productos al carrito'; 
        $adiciona_productos_carrito->description  = 'adicionara nuevos productos al carrito'; 
        $adiciona_productos_carrito->save();

        //enlazar permisos
        $administrador->attachPermissions(array($adiciona_productos,$edita_productos));
        $usuario->attachPermissions(array($ver_productos,$adiciona_productos_carrito));
        //administradores por defecto
        $user = User::where('name','=','brayan')->first();
        $user->attachRole($administrador); 
        $user = User::where('name','=','wendy')->first();
        $user->attachRole($administrador);
        $user = User::where('name','=','carlos')->first();
        $user->attachRole($administrador);

        //usuarios por defecto normales
        $user = User::where('name','=','gabriel')->first();
        $user->attachRole($usuario);
        $user = User::where('name','=','ximena')->first();
        $user->attachRole($usuario);
        $user = User::where('name','=','max')->first();
        $user->attachRole($usuario);



        
        
    }
}

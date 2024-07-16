<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaPermisos;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'admin']);
        $vendedor = Role::create(['name' => 'vendedor']);


        $c_dashboard = CategoriaPermisos::create(['nombre' => 'Dashboard']);

        $permisos_dashboard = [
            [
                'name' => 'dashboard.ver',
                'description' => 'Ver el dashboard',
            ]
        ];
        foreach ($permisos_dashboard as $permiso) {
            $c_dashboard->permisos()->create($permiso);
        }


        $c_punto_venta = CategoriaPermisos::create(['nombre' => 'Punto de venta']);

        $permisos_punto_venta = [
            [
                'name' => 'punto.venta.ver',
                'description' => 'Ver el punto de venta',
            ]
        ];

        foreach ($permisos_punto_venta as $permiso) {
            $c_punto_venta->permisos()->create($permiso);
        }

        $c_comprobantes = CategoriaPermisos::create(['nombre' => 'Comprobantes']);
        $permisos_comprobantes = [
            [
                'name' => 'comprobantes.ver',
                'description' => 'Ver los comprobantes',
            ],
            [
                'name' => 'comprobantes.crear',
                'description' => 'Emitir comprobantes',
            ],
            [
                'name' => 'comprobantes.anular',
                'description' => 'Anular comprobantes',
            ],
            [
                'name' => 'comprobantes.enviar',
                'description' => 'Enviar comprobantes',
            ],
            [
                'name' => 'comprobantes.ver_pdf',
                'description' => 'Ver PDF de comprobantes',
            ],
            [
                'name' => 'comprobantes.ver_xml',
                'description' => 'Ver XML de comprobantes',
            ],
            [
                'name' => 'comprobantes.cambiar_estado',
                'description' => 'Cambiar estado de comprobantes',
            ],
            [
                'name' => 'comprobantes.emitir.notas',
                'description' => 'Emitir notas de crédito y débito',
            ],
            [
                'name' => 'comprobantes.ver_notas',
                'description' => 'Ver notas de crédito y débito',
            ]
        ];

        foreach ($permisos_comprobantes as $permiso) {
            $c_comprobantes->permisos()->create($permiso);
        }

        $c_cotizaciones = CategoriaPermisos::create(['nombre' => 'Cotizaciones']);
        $permisos_cotizaciones = [
            [
                'name' => 'cotizaciones.ver',
                'description' => 'Ver las cotizaciones',
            ],
            [
                'name' => 'cotizaciones.crear',
                'description' => 'Crear cotizaciones',
            ],
            [
                'name' => 'cotizaciones.editar',
                'description' => 'Editar cotizaciones',
            ],
            [
                'name' => 'cotizaciones.eliminar',
                'description' => 'Eliminar cotizaciones',
            ],
            [
                'name' => 'cotizaciones.enviar',
                'description' => 'Enviar cotizaciones',
            ],
            [
                'name' => 'cotizaciones.ver_pdf',
                'description' => 'Ver PDF de cotizaciones',
            ],

            [
                'name' => 'cotizaciones.cambiar_estado',
                'description' => 'Cambiar estado de cotizaciones',
            ]
        ];

        foreach ($permisos_cotizaciones as $permiso) {
            $c_cotizaciones->permisos()->create($permiso);
        }

        $c_compras = CategoriaPermisos::create(['nombre' => 'Compras']);
        $permisos_compras = [
            [
                'name' => 'compras.ver',
                'description' => 'Ver las compras',
            ],
            [
                'name' => 'compras.crear',
                'description' => 'Crear compras',
            ]

        ];

        foreach ($permisos_compras as $permiso) {
            $c_compras->permisos()->create($permiso);
        }


        $c_productos = CategoriaPermisos::create(['nombre' => 'Productos']);
        $permisos_productos = [
            [
                'name' => 'productos.ver',
                'description' => 'Ver los productos',
            ],
            [
                'name' => 'productos.crear',
                'description' => 'Crear productos',
            ],
            [
                'name' => 'productos.editar',
                'description' => 'Editar productos',
            ],
            [
                'name' => 'productos.eliminar',
                'description' => 'Eliminar productos',
            ]
        ];

        foreach ($permisos_productos as $permiso) {
            $c_productos->permisos()->create($permiso);
        }

        $c_categoria_productos = CategoriaPermisos::create(['nombre' => 'Categoría de productos']);
        $permisos_categoria_productos = [
            [
                'name' => 'categoria_productos.ver',
                'description' => 'Ver las categorías de productos',
            ],
            [
                'name' => 'categoria_productos.crear',
                'description' => 'Crear categorías de productos',
            ],
            [
                'name' => 'categoria_productos.editar',
                'description' => 'Editar categorías de productos',
            ],
            [
                'name' => 'categoria_productos.eliminar',
                'description' => 'Eliminar categorías de productos',
            ],
            [
                'name' => 'categoria_productos.cambiar_estado',
                'description' => 'Cambiar estado de categorías de productos',
            ]
        ];
        foreach ($permisos_categoria_productos as $permiso) {
            $c_categoria_productos->permisos()->create($permiso);
        }


        $c_clientes = CategoriaPermisos::create(['nombre' => 'Clientes']);
        $permisos_clientes = [
            [
                'name' => 'clientes.ver',
                'description' => 'Ver los clientes',
            ],
            [
                'name' => 'clientes.crear',
                'description' => 'Crear clientes',
            ],
            [
                'name' => 'clientes.editar',
                'description' => 'Editar clientes',
            ],
            [
                'name' => 'clientes.eliminar',
                'description' => 'Eliminar clientes',
            ],
            [
                'name' => 'clientes.cambiar_estado',
                'description' => 'Cambiar estado de clientes',
            ]

        ];

        foreach ($permisos_clientes as $permiso) {
            $c_clientes->permisos()->create($permiso);
        }
        $c_proveedores = CategoriaPermisos::create(['nombre' => 'Proveedores']);
        $permisos_proveedores = [
            [
                'name' => 'proveedores.ver',
                'description' => 'Ver los proveedores',
            ],
            [
                'name' => 'proveedores.crear',
                'description' => 'Crear proveedores',
            ],
            [
                'name' => 'proveedores.editar',
                'description' => 'Editar proveedores',
            ],
            [
                'name' => 'proveedores.eliminar',
                'description' => 'Eliminar proveedores',
            ],
            [
                'name' => 'proveedores.cambiar_estado',
                'description' => 'Cambiar estado de proveedores',
            ]
        ];

        foreach ($permisos_proveedores as $permiso) {
            $c_proveedores->permisos()->create($permiso);
        }

        // $c_usuarios = CategoriaPermisos::create(['nombre' => 'Usuarios']);
        // $permisos_usuarios = [
        //     [
        //         'name' => 'usuarios.ver',
        //         'description' => 'Ver los usuarios',
        //     ],
        //     [
        //         'name' => 'usuarios.crear',
        //         'description' => 'Crear usuarios',
        //     ],
        //     [
        //         'name' => 'usuarios.editar',
        //         'description' => 'Editar usuarios',
        //     ],
        //     [
        //         'name' => 'usuarios.eliminar',
        //         'description' => 'Eliminar usuarios',
        //     ],
        //     [
        //         'name' => 'usuarios.cambiar_estado',
        //         'description' => 'Cambiar estado de usuarios',
        //     ]
        // ];
        // foreach ($permisos_usuarios as $permiso) {
        //     $c_usuarios->permisos()->create($permiso);
        // }

        //DAR PERMISOS AL ROL ADMIN
        $admin->givePermissionTo(Permission::all());
    }
}

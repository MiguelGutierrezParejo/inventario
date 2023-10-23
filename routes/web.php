<?php

use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\I_consumiblesController;
use App\Http\Controllers\I_detallespedidosController;
use App\Http\Controllers\I_impresorasController;
use App\Http\Controllers\I_mantenimientoimpresorasController;
use App\Http\Controllers\I_modeloimpresorasController;
use App\Http\Controllers\I_pedidosController;
use App\Http\Controllers\I_proveedoresController;
use App\Http\Controllers\I_recepcionpedidosController;
use App\Http\Controllers\I_relacionconsumiblesController;
use App\Http\Controllers\LineasController;
use App\Http\Controllers\MantenimientoequiposController;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\RelacionequiposController;
use App\Http\Controllers\RelacionLineasController;
use App\Http\Controllers\RelacionTerminalesController;
use App\Http\Controllers\S_relacionequipossoftwaresController;
use App\Http\Controllers\S_relacionusuariossoftwaresController;
use App\Http\Controllers\S_softwaresController;
use App\Http\Controllers\TerminalesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

//Bloquear acceso a todos los usuarios no definidos en can:solo-admins
Route::middleware(['auth', 'can:solo-admins'])->group(function () {

///////////////////////////////////////////////////EQUIPOS////////////////////////////////////////////////////////////////////////////
Route::get('/', [EquiposController::class, 'index'])
    ->name('equipos');

Route::get('/equipos', [EquiposController::class, 'index2']);
Route::get('/equipos/create', [EquiposController::class, 'create']);
Route::post('/equipos', [EquiposController::class, 'store']);
Route::get('/equipos/edit/{id}', [EquiposController::class, 'edit']);
Route::get('/equipos/generaretiqueta/{tipo}/{tipo2}', [EquiposController::class, 'generaretiqueta']);
Route::get('/equipos/etiquetar/{Tipo}', [EquiposController::class, 'etiquetar']);
Route::get('/equipos/quitaretiquetar/{Tipo}', [EquiposController::class, 'quitaretiquetar']);
Route::put('/equipos/{id}', [EquiposController::class, 'update']);
Route::get('/equipos/recabar', [EquiposController::class, 'recabar']);
Route::post('/equipos/generar', [EquiposController::class, 'generar']);
Route::get('/equipos/{id}', [EquiposController::class, 'show']);

Route::get('/etiquetar/{Tipo}', [EquiposController::class, 'indexetiquetar'])
->name('etiquetar');

///////////////////////////////////////////////////RELACIÓN EQUIPOS///////////////////////////////////////////////////////////////////

Route::get('/relequip/create/{id}', [RelacionequiposController::class, 'create']);
Route::post('/relequip/{id}', [RelacionequiposController::class, 'store'])
    ->name('relequip.store');
Route::get('/relequip/edit/{id}', [RelacionequiposController::class, 'edit']);
Route::put('/relequip/{id}', [RelacionequiposController::class, 'update'])
    ->name('relequip.update');
Route::get('/relequip/baja/{id}', [RelacionequiposController::class, 'baja']);
Route::delete('/relequip/{id}', [RelacionequiposController::class, 'destroy']);

///////////////////////////////////////////////////MANTENIMIENTO//////////////////////////////////////////////////////////////////////

Route::get('/mantequip/create/{id}', [MantenimientoequiposController::class, 'create']);
Route::post('/mantequip/{id}', [MantenimientoequiposController::class, 'store'])
    ->name('mantequip.store');
Route::get('/mantequip/edit/{id}', [MantenimientoequiposController::class, 'edit']);
Route::put('/mantequip/{id}', [MantenimientoequiposController::class, 'update'])
    ->name('mantequip.update');
Route::get('/mantequip/baja/{id}', [MantenimientoequiposController::class, 'baja']);
Route::delete('/mantequip/{id}', [MantenimientoequiposController::class, 'destroy']);

///////////////////////////////////////////////////FOTOS//////////////////////////////////////////////////////////////////////////////

// Ruta para mostrar la vista de creación de fotos
Route::get('/equipos/{id}/fotos/create', [FotosController::class, 'create'])->name('fotoequipos.create');

// Ruta para almacenar una foto en el servidor
Route::post('/equipos/{id}/fotos', [FotosController::class, 'store'])->name('fotoequipos.store');

// Ruta para eliminar una foto
Route::delete('/equipos/{equipoId}/fotos/{fotoId}', [FotosController::class, 'destroy'])->name('fotoequipos.destroy');


///////////////////////////////////////////////////RELACIÓN TERMINALES////////////////////////////////////////////////////////////////

Route::get('/relterm/create/{id}', [RelacionTerminalesController::class, 'create']);
Route::post('/relterm/{id}', [RelacionTerminalesController::class, 'store'])
    ->name('relterm.store');
Route::get('/relterm/edit/{id}', [RelacionTerminalesController::class, 'edit']);
Route::put('/relterm/{id}', [RelacionTerminalesController::class, 'update'])
    ->name('relterm.update');
Route::delete('/relterm/{id}', [RelacionTerminalesController::class, 'destroy']);

///////////////////////////////////////////////////RELACIÓN LINEAS////////////////////////////////////////////////////////////////////

Route::get('/relinea/create/{id}', [RelacionLineasController::class, 'create']);
Route::post('/relinea/{id}', [RelacionLineasController::class, 'store'])
    ->name('relinea.store');
Route::get('/relinea/edit/{id}', [RelacionLineasController::class, 'edit']);
Route::put('/relinea/{id}', [RelacionLineasController::class, 'update'])
    ->name('relinea.update');
Route::delete('/relinea/{id}', [RelacionLineasController::class, 'destroy']);

///////////////////////////////////////////////////USUARIOS///////////////////////////////////////////////////////////////////////////

Route::get('/usuarios', [UsuariosController::class, 'index'])
    ->name('usuarios');
Route::get('/usuarios/create', [UsuariosController::class, 'create']);
Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'edit']);
Route::put('/usuarios/{id}', [UsuariosController::class, 'update']);
Route::get('/usuarios/{id}', [UsuariosController::class, 'show']);

///////////////////////////////////////////////////LINEAS/////////////////////////////////////////////////////////////////////////////

Route::get('/lineasindex/{tipo}', [LineasController::class, 'index'])
    ->name('lineas');
Route::get('/lineas/create', [LineasController::class, 'create']);
Route::post('/lineas', [LineasController::class, 'store']);
Route::get('/lineas/edit/{id}', [LineasController::class, 'edit']);
Route::put('/lineas/{id}', [LineasController::class, 'update']);
Route::get('/lineas/recabar', [LineasController::class, 'recabar']);
Route::post('/lineas/generar', [LineasController::class, 'generar']);
Route::get('/lineas/{id}', [LineasController::class, 'show']);

///////////////////////////////////////////////////TERMINALES/////////////////////////////////////////////////////////////////////////

Route::get('/terminales', [TerminalesController::class, 'index'])
    ->name('terminales');
Route::get('/terminales/todos', [TerminalesController::class, 'index2']);
Route::get('/terminales/create', [TerminalesController::class, 'create']);
Route::post('/terminales', [TerminalesController::class, 'store']);
Route::get('/terminales/edit/{id}', [TerminalesController::class, 'edit']);
Route::put('/terminales/{id}', [TerminalesController::class, 'update']);
Route::get('/terminales/recabar', [TerminalesController::class, 'recabar']);
Route::post('/terminales/generar', [TerminalesController::class, 'generar']);
Route::get('/terminales/{id}', [TerminalesController::class, 'show']);

///////////////////////////////////////////////////DOCUMENTOS/////////////////////////////////////////////////////////////////////////

Route::get('/docum/create/{tabla}/{id}', [DocumentosController::class, 'create']);
Route::post('/docum/{tabla}/{id}', [DocumentosController::class, 'store'])
    ->name('docum.store');
Route::get('/docum/edit/{id}', [DocumentosController::class, 'edit']);
Route::put('/docum/{id}', [DocumentosController::class, 'update']);
Route::delete('/docum/{id}', [DocumentosController::class, 'destroy']);

///////////////////////////////////////////////////IMPRESORAS/////////////////////////////////////////////////////////////////////////

Route::get('/impresorasindex/{tipo}', [I_impresorasController::class, 'index'])
    ->name('impresoras');
Route::get('/impresoras/create', [I_impresorasController::class, 'create']);
Route::post('/impresoras', [I_impresorasController::class, 'store']);
Route::get('/impresoras/edit/{id}', [I_impresorasController::class, 'edit']);
Route::get('/impresoras/recabar/', [I_impresorasController::class, 'recabar']);
Route::post('/impresoras/generar', [I_impresorasController::class, 'generar']);
Route::put('/impresoras/{id}', [I_impresorasController::class, 'update']);
Route::get('/impresoras/{id}', [I_impresorasController::class, 'show']);

///////////////////////////////////////////////////MODELO DE IMPRESORAS///////////////////////////////////////////////////////////////

Route::get('/modeloimpresoras/create', [I_modeloimpresorasController::class, 'create']);
Route::post('/modeloimpresoras', [I_modeloimpresorasController::class, 'store']);
Route::get('/modeloimpresoras/edit/{id}', [I_modeloimpresorasController::class, 'edit']);
Route::put('/modeloimpresoras/{Id}', [I_modeloimpresorasController::class, 'update'])
    ->name('modeloimpresoras.update');
Route::get('/modeloimpresoras', [I_modeloimpresorasController::class, 'index'])
    ->name('modelosimpresoras');
Route::get('/modeloimpresoras/{id}', [I_modeloimpresorasController::class, 'show']);

///////////////////////////////////////////////////MANTENIMIENTO IMPRESORAS///////////////////////////////////////////////////////////

Route::get('/mantenimientoimpresoras/create/{Id}', [I_mantenimientoimpresorasController::class, 'create']);
Route::post('/mantenimientoimpresoras', [I_mantenimientoimpresorasController::class, 'store']);
Route::get('/mantenimientoimpresoras/{Id}', [I_mantenimientoimpresorasController::class, 'show']);
Route::get('/mantenimientoimpresoras/{dato?}/{orden?}', [I_mantenimientoimpresorasController::class, 'index'])
    ->name('mantenimientoimpresoras');

///////////////////////////////////////////////////CONSUMIBLES////////////////////////////////////////////////////////////////////////

Route::get('/consumibles/create', [I_consumiblesController::class, 'create']);
Route::post('/consumibles', [I_consumiblesController::class, 'store']);
Route::get('/consumibles/generar', [I_consumiblesController::class, 'generar']);
Route::get('/consumibles/edit/{id}', [I_consumiblesController::class, 'edit']);
Route::put('/consumibles/{Id}', [I_consumiblesController::class, 'update'])
    ->name('consumibles.update');
Route::get('/consumibles/pasar', [I_consumiblesController::class, 'editarconsumible'])
    ->name('pasar');
Route::get('/consumibles/stock', [I_consumiblesController::class, 'editarstock'])
    ->name('stock');
Route::get('/consumibles/{id}', [I_consumiblesController::class, 'show']);
Route::get('/consumibles/{dato?}/{orden?}', [I_consumiblesController::class, 'index'])
    ->name('consumibles');

///////////////////////////////////////////////////PEDIDOS////////////////////////////////////////////////////////////////////////////

Route::get('/pedidos/proveedor', [I_pedidosController::class, 'proveedor']);
Route::get('/pedidos/create', [I_pedidosController::class, 'create']);
Route::post('/pedidos', [I_pedidosController::class, 'store'])
    ->name('pedidos.store');
Route::get('/pedidos/{id}', [I_pedidosController::class, 'show']);
Route::get('/pedidos/{dato?}/{orden?}', [I_pedidosController::class, 'index'])
    ->name('pedidos');

///////////////////////////////////////////////////DETALLES PEDIDOS///////////////////////////////////////////////////////////////////

Route::put('/detallespedidos/{Id}/{IdPedido}', [I_detallespedidosController::class, 'update'])
    ->name('detallespedidos.update');
Route::get('/detallespedidos/editar', [I_detallespedidosController::class, 'editarpedidos'])
    ->name('detallespedidos');

///////////////////////////////////////////////////RECEPCIÓN DE PEDIDOS///////////////////////////////////////////////////////////////

Route::get('/recepcion/create/{IdPedido}', [I_recepcionpedidosController::class, 'create'])
    ->name('recepcion.create');
Route::post('/recepcion', [I_recepcionpedidosController::class, 'store'])
    ->name('recepcion.store');
Route::get('/recepcion/todos/{IdPedido}', [I_recepcionpedidosController::class, 'todos'])
    ->name('recepcion.createtodos');
Route::post('/recepcion/recepciontodos', [I_recepcionpedidosController::class, 'recepciontodos'])
    ->name('recepcion.recepciontodos');

///////////////////////////////////////////////////SOFTWARE///////////////////////////////////////////////////////////////////////////

Route::get('/softwares', [S_softwaresController::class, 'index'])
    ->name('softwares');
Route::get('/softwares/create', [S_softwaresController::class, 'create']);
Route::post('/softwares', [S_softwaresController::class, 'store']);
Route::get('/softwares/{Id}', [S_softwaresController::class, 'show']);
Route::get('/softwares/edit/{id}', [S_softwaresController::class, 'edit']);
Route::put('/softwares/{id}', [S_softwaresController::class, 'update']);

///////////////////////////////////////////////////PROVEEDORES////////////////////////////////////////////////////////////////////////

Route::get('/proveedores/create', [I_proveedoresController::class, 'create']);
Route::post('/proveedores', [I_proveedoresController::class, 'store']);
Route::get('/proveedores/edit/{id}', [I_proveedoresController::class, 'edit']);
Route::put('/proveedores/{id}', [I_proveedoresController::class, 'update']);
Route::get('/proveedores', [I_proveedoresController::class, 'index'])
    ->name('proveedores');
Route::get('/proveedores/{id}', [I_proveedoresController::class, 'show']);

///////////////////////////////////////////////////RELACIÓN USUARIOS//////////////////////////////////////////////////////////////////

Route::get('/relacionusuariossoftwares/create/{id}', [S_relacionusuariossoftwaresController::class, 'create']);
Route::get('/relacionusuariossoftwares/createdesdeuser/{id}', [S_relacionusuariossoftwaresController::class, 'createdesdeuser']);
Route::post('/relacionusuariossoftwares/{id}/{Origen}', [S_relacionusuariossoftwaresController::class, 'store'])
    ->name('relacionusuariossoftwares.store');
Route::delete('/relacionusuariossoftwares/{id}', [S_relacionusuariossoftwaresController::class, 'destroy']);

///////////////////////////////////////////////////RELACIÓN DE EQUIPOS////////////////////////////////////////////////////////////////

Route::get('/relacionequipossoftwares/create/{id}', [S_relacionequipossoftwaresController::class, 'create']);
Route::get('/relacionequipossoftwares/createdesdeequipo/{id}', [S_relacionequipossoftwaresController::class, 'createdesdeequipo']);
Route::post('/relacionequipossoftwares/{id}/{Origen}', [S_relacionequipossoftwaresController::class, 'store'])
    ->name('relacionequipossoftwares.store');
Route::delete('/relacionequipossoftwares/{id}', [S_relacionequipossoftwaresController::class, 'destroy']);

///////////////////////////////////////////////////RELACIÓN CONSUMIBLES///////////////////////////////////////////////////////////////
Route::get('/relacionconsumibles/create', [I_relacionconsumiblesController::class, 'create']);
Route::post('/relacionconsumibles', [I_relacionconsumiblesController::class, 'store']);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

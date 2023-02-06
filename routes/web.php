<?php

use Faker\Extension\Helper;
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

Route::get('/', function () {
    return view('welcome');
});

/*
1.	Crea una ruta que tenga un parámetro que sea opcional y comprueba que funciona.
2.	Crea una ruta que tenga un parámetro que sea opcional y tenga un valor por defecto en caso de que no se especifique.
3.	Crea una ruta que atienda por POST y compruébala con Postman. Si obtienes un error de tipo VerifyCsrfToken comenta la línea correspondiente en el fichero kernel.php (carpeta Http). Esto es un filtro para evitar ataques XSS (Cross-Site Scripting). ¡Vuelve a descomentarla cuando termines con las prácticas!
4.	Crea una ruta que atienda por GET y por POST (en un único método) y compruébalas. Vuelve a habilitar el filtro VerifyCsrfToken en el fichero kernel.php (carpeta Http).
5.	Crea una ruta que compruebe que un parámetro está formado sólo por números.
6.	Crea una ruta con dos parámetros que compruebe que el primero está formado sólo por letras y el segundo sólo por números.

*/

Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
 
Route::get('/user/{name?}', function ($name = 'John') {
    return $name;
});

Route::post('/test/{data?}', function ($data = 'prueba') {
    return $data;
});

Route::match(array('GET', 'POST'), '/doble', function()
{
    return 'Hello World';
});

Route::get('prueba/{id}', function ($id) {
    return $id;
})
->where('id', '[0-9]+');

Route::get('test4/{num}/{letter}', function ($num,$letter) {
    return [$num,$letter];
})
->where('num', '[0-9]+')
->where('letter', '[a-z]+');

//Actividad 2

/*
1.	Utiliza el helper env para que cuando se acceda a la ruta /host nos devuleva la dirección IP donde se encuentra la base de datos de nuestro proyecto.
2.	Utiliza el helper config para que cuando se acceda a la ruta /timezone se muestre la zona horaria.
*/

Route::get('/host', function () {
    return env("DB_HOST"); 
});

Route::get('/timezone', function () {
    return config('app.timezone'); 
});


// Actividad 3

Route::view('/inicio', 'home')->name('home');

$dia = date("d");
$mes = date("m");
$año = date("y"); 
 
//Route::view('/fecha','fecha',['dia' => $dia, 'mes' => $mes, 'año' => $año]);

Route::view('/fecha','fecha',compact("dia","mes","año"));

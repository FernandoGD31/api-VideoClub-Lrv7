<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }



    //    /RegistrarContenido
    public function RegistrarContenido(Request $request)
    {
        $nombre = $request->get("nombre");
        $genero = $request->get("genero");
        $clasificacion = $request->get("clasificacion");
        $sinopsis = $request->get("sinopsis");
        $idioma = $request->get("idioma");
        $duracion = $request->get("duracion");
        $calificacion = $request->get("calificacion");
        $fecha_estreno = $request->get("fecha_estreno");
        $temporadas = $request->get("temporadas");
        $capitulos = $request->get("capitulos");
        $id_director = $request->get("id_director");


        try {
            DB::insert("INSERT INTO contenido VALUES 
            (NULL,
            '{$nombre}',
            '{$genero}',
            '{$clasificacion}',
            '{$sinopsis}',           
            '{$idioma}',
            '{$duracion}',
            {$calificacion}, 
            '{$fecha_estreno}',
            {$temporadas},
            {$capitulos},
            {$id_director}
            )");
            return "Registro exitoso";
        } catch (\Throwable $th) {
            return "ERROR AL INSERTAR" . $th;
        }
        return "ERROR";
    }

    //   /EditarContenido/id
    public function EditarContenido(Request $request, $id)
    {
        $nombre = $request->get("nombre");
        $genero = $request->get("genero");
        $clasificacion = $request->get("clasificacion");
        $sinopsis = $request->get("sinopsis");
        $idioma = $request->get("idioma");
        $duracion = $request->get("duracion");
        $calificacion = $request->get("calificacion");
        $fecha_estreno = $request->get("fecha_estreno");
        $temporadas = $request->get("temporadas");
        $capitulos = $request->get("capitulos");
        $id_director = $request->get("id_director");

        try {
            DB::insert(
                "UPDATE contenido SET 
            nombre = ?,  
            genero = ?,  
            clasificacion = ?,  
            sinopsis = ?,  
            idioma = ?,  
            duracion = ?,  
            calificacion = ?,  
            fecha_estreno = ?,  
            temporadas = ?,  
            capitulos = ?,  
            director_id = ? WHERE id = ?",

                [$nombre, $genero, $clasificacion, $sinopsis, $idioma, $duracion, $calificacion, $fecha_estreno, $temporadas, $capitulos, $id_director, $id]
            );
            return "Actualizacion exitosa";
        } catch (\Throwable $th) {
            return "ERROR AL INSERTAR ---->" . $th;
        }
        return "ERROR";
    }

    //   /EliminarContenido/{id}
    public function EliminarContenido($id)
    {
        try {
            DB::delete("DELETE FROM contenido WHERE id = {$id}");
            return "Eliminacion exitosa";
        } catch (\Throwable $th) {
            return "ERROR AL INSERTAR ---->" . $th;
        }
        return "ERROR";
    }

    //   /MostrarContenido
    public function MostrarContenido()
    {
        try {
            $data = DB::select("SELECT * FROM contenido");
            return $data;
        } catch (\Throwable $th) {
            return "ERROR AL MOSTRAR ---->" . $th;
        }
        return "ERROR";
    }

    //   /MostrarContenido/{nombreContenido}

    public function MostrarContenidoId($id)
    {
        try {
            $data = DB::select("SELECT * FROM contenido where id = {$id}");
            return $data;
        } catch (\Throwable $th) {
            return "ERROR AL MOSTRAR ---->" . $th;
        }
        return "ERROR";
    }

    /// MostrarPeliculas

    public function MostrarPeliculas()
    {
        try {
            $data = DB::select("SELECT * FROM contenido where temporadas IS NULL");
            return $data;
        } catch (\Throwable $th) {
            return "ERROR AL MOSTRAR ---->" . $th;
        }
        return "ERROR";
    }

    /// MostrarPeliculas

    public function MostrarSeries()
    {
        try {
            $data = DB::select("SELECT * FROM contenido where temporadas > 0");
            return $data;
        } catch (\Throwable $th) {
            return "ERROR AL MOSTRAR ---->" . $th;
        }
        return "ERROR";
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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

     // /GeneroPelicula/{genero}
     public function GeneroPelicula($genero)
     {
         
         try {
            $data2 = DB::select("SELECT nombre, genero from contenido WHERE genero = '{$genero}'");
             return $data2;
         } catch (\Throwable $th) {
            
         }
         return"Error al obtener";
         
     }
     
 
     //GeneroSeries/{genero}
     public function GeneroSerie($genero)
     {
         
         try {
            $data3 = DB::select("SELECT *  from contenido WHERE genero = '{$genero}' and temporadas  > 0");
             return $data3;
         } catch (\Throwable $th) {
            
         }
         return"Error al obtener";
         
     }
 
 
     //calificacion/{nombreContenido}
     public function Calificacion($nombre)
     {
         
         try {
            $data4 = DB::select("SELECT nombre, calificacion from contenido WHERE nombre = '{$nombre}'");
             return $data4;
         } catch (\Throwable $th) {
            
         }
         return"Error al obtener";
         
     }
 
     //Director/{nombreContenido}
      
     public function Director($nombre)
     {
         try {
            $data5 = DB::select("SELECT * from director where id =(SELECT director_id from contenido where nombre = '{$nombre}' )");
             return $data5;
         } catch (\Throwable $th) {
            
         }
         return"Error al obtener";
         
     }
    
 
     //Actor/{NombreContenido}
         public function Actor($nombre)
         {
         try {
            $data6 = DB::select("SELECT * FROM actor WHERE id IN (SELECT actor_id from actores_contenido WHERE  contenido_id = (SELECT id FROM contenido WHERE nombre = '$nombre'))");
             return $data6;
         } catch (\Throwable $th) {
            
         }
         return"Error al obtener";
         
         }
       
         
     // sinopsis/{nombreContenido}
     public function Sinopsis($nombre)
     {
         
         try {
             $data7 = DB::select("SELECT nombre, sinopsis from contenido WHERE nombre = '{$nombre}'");
             return $data7;
         } catch (\Throwable $th) {
            
         }
         return"Error al obtener";
 
     }
 
 

     //////////////
     public function MostrarIdioma($idioma){
        try {

            $datos = DB::select("SELECT * FROM contenido Where idioma= '{$idioma}'");
            return $datos;

        } catch (\Throwable $th) {
            return "no exiten contenido en ese idioma" . $th;
        }
        return "ERROR";
    }

    public function MostrarTempoCap($nombre){
        try {

            $datos = DB::select("SELECT nombre, temporadas, capitulos FROM contenido Where nombre= '{$nombre}' and temporadas >=0");
            return $datos;

        } catch (\Throwable $th) {
            return "no exiten contenido en ese idioma" . $th;
        }
        return "ERROR";
    }



    public function MostrarCliente()
    {
        try {
            $data = DB::select("SELECT * FROM cliente");
            return $data;
        } catch (\Throwable $th) {
            return "ERROR AL MOSTRAR ---->" . $th;
        }
        return "ERROR";
    }

    public function RegistrarCliente(Request $request)
    {
        $nombre = $request->get("nombre");
        $apellido_p = $request->get("apellido_p");
        $apellido_m = $request->get("apellido_m");
        $correo = $request->get("correo");
        $edad = $request->get("edad");
        $sexo = $request->get("sexo");
        $fecha_registro = $request->get("fecha_registro");
       


        try {
            DB::insert("INSERT INTO cliente VALUES 
            (NULL,
            '{$nombre}',
            '{$apellido_p}',
            '{$apellido_m}',
            '{$correo}',           
            '{$edad}',
            '{$sexo}',
            {$fecha_registro}
            )");
            return "Registro exitoso";
        } catch (\Throwable $th) {
            return "ERROR AL INSERTAR" . $th;
        }
        return "ERROR";
    }


    public function EditarCliente(Request $request, $id)
    {
        $nombre = $request->get("nombre");
        $apellido_p = $request->get("apellido_p");
        $apellido_m = $request->get("apellido_m");
        $correo = $request->get("correo");
        $edad = $request->get("edad");
        $sexo = $request->get("sexo");
        $fecha_registro = $request->get("fecha_registro");

        try {
            DB::insert( "UPDATE cliente SET 
            nombre = ?,  
            apellido_p = ?,  
            apellido_m = ?,  
            correo = ?,  
            edad = ?,  
            sexo = ?,  
            fecha_registro = ? WHERE id = ?",

                [$nombre, $apellido_p, $apellido_m, $correo, $edad, $sexo, $fecha_registro, $id]
            );
            return "Actualizacion exitosa";
        } catch (\Throwable $th) {
            return "ERROR AL INSERTAR ---->" . $th;
        }
        return "ERROR";
    }


    public function MostrarEstreno()
    {
        try {
            $data = DB::select("Select * from contenido WHERE fecha_estreno > curdate()");
            return $data;
        } catch (\Throwable $th) {
            return "ERROR AL MOSTRAR ---->" . $th;
        }
        return "ERROR";
    }

    
    public function MostrarSeriesIdioma($idioma)
    {
        try {
            $data = DB::select("Select nombre, genero, temporadas, capitulos from contenido WHERE idioma='{$idioma}' and temporadas > 0");
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

<?php

namespace App\Http\Controllers\repertorioSocios;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\Produccion;
use App\Models\SociosProduccion;

use function PHPSTORM_META\type;

class SocioController extends Controller
{

    public function listarTotalSocios()
    {
        $socios = Socio::all();
        return view('procesos.repertorio.repertorio')->with('socios', $socios);
    }

    public function detalleSocio($id)
    {
        $socio = Socio::find($id);
        $producciones = SociosProduccion::select(
            'socios_producciones.id',
            'producciones.tituloObra',
            'socios_producciones.personaje',
            'producciones.tipoProduccion',
            'producciones.pais',
            'producciones.anio',
            'producciones.director'
        )
            ->join('socios', 'socios_producciones.socio_id', '=', 'socios.id')
            ->join('producciones', 'socios_producciones.produccion_id', '=', 'producciones.id')
            ->where('socios_producciones.socio_id', $id)
            ->get();

        return view('procesos.repertorio.detalleSocio')->with('socio', $socio)->with('producciones', $producciones);
    }

    public function nuevoSocio(Request $request)
    {
        $request->validate([
            'inputIdentificacion' => 'required|numeric',
            'inputNombre' => 'required|string',
            'inputNumeroSocio' => 'required|numeric',
            'inputNumeroArtista' => 'required|numeric',
            'inputTipoSocio' => 'required',
            'inputFoto' => 'required|image|mimes:jpeg,png,jpg', // Validación para una imagen
        ]);


        // Procesar la foto
        if ($request->hasFile('inputFoto')) {
            $foto = $request->file('inputFoto');
            $rutaFoto = $foto->store('fotos', 'public');

            // Crear un nuevo socio con los datos del formulario y la ruta de la foto
            $socio = new Socio();
            $socio->identificacion = $request->input('inputIdentificacion');
            $socio->nombre = $request->input('inputNombre');
            $socio->numeroSocio = $request->input('inputNumeroSocio');
            $socio->numeroArtista = $request->input('inputNumeroArtista');
            $socio->tipoSocio = $request->input('inputTipoSocio');
            $socio->imagen = $rutaFoto; // Asignar la ruta de la foto aquí
            $socio->save();

            // Puedes retornar una respuesta de éxito, redirección, etc.
            return redirect()->back()->with('success', 'Socio registrado correctamente.');
        }

        // Manejo de error si no se pudo procesar la foto
        return redirect()->back()->with('error', 'Hubo un problema al registrar el socio.');
    }



}

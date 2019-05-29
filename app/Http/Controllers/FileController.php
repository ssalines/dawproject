<?php

namespace App\Http\Controllers;

use App\File;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Operation;
use App\User;
use App\Step;

class FileController extends Controller
{
    public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function index(Operation $operation, Step $step)
    {
        // Obtenemos todos los registros de la tabla files
        // y retornamos la vista files con los datos.
        $files = File::orderBy('created_at', 'desc')->get();

        return view('files', compact('files'));
    }

    public function store(Operation $operation, Step $step, Request $request)
    {
        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!

        $user = auth()->user();

        if(Storage::disk('dropbox')->has($operation->title)){

            $route = '/'.$operation->title;

        }else{

            Storage::disk('dropbox')->createDir($operation->title);
            $route = '/'.$operation->title;

        };

        if($request->file != null){

        $test = Storage::disk('dropbox')->putFileAs(
            $route,
            $request->file('file'),
            $archivo = $operation->title."_".$user->name."_".time()."_".$request->file('file')->getClientOriginalName()
        );



        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            $route.'/'.$archivo,
            ["requested_visibility" => "public"]

        );

        // Creamos un nuevo registro en la tabla files con los datos de la respuesta.
        $file = File::create([
            'name' => $response['name'],
            'extension' => $request->file('file')->getClientOriginalExtension(),
            'size' => $response['size'],
            'public_url' => $response['url']
        ]);

        $request->request->add(['file_id' => $file->id]);

        app(MessageController::class)->store($request);

        // Retornamos un redirección hacía operaciones
        return redirect('/operations');

        }else{

            $request->request->add(['file_id' => null]);

            app(MessageController::class)->store($request);

            // Retornamos un redirección hacía operaciones
            return redirect('/operations');

        }
    }

    public function download(Operation $operation, Step $step, File $file)
    {
        // Retornamos una descarga especificando el driver dropbox
        // e indicándole al método download el nombre del archivo.
        return Storage::disk('dropbox')->download($file->name);
    }

    public function destroy(Operation $opeation, Step $step, File $file)
    {
        // Eliminamos el archivo en dropbox llamando a la clase
        // instanciada en la propiedad dropbox.
        $this->dropbox->delete($file->name);
        // Eliminamos el registro de nuestra tabla.
        $file->delete();

        return back();
    }
}

<?php namespace lamanana\Http\Controllers;

use lamanana\Http\Requests;
use lamanana\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use lamanana\User;
use lamanana\Post;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$post = Post::orderBy('id', 'desc')->paginate(9);
		//mostrar la lista de post
		//$tags = Tag::all();
		return view('admin.index', ['post'=>$post]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//crear el post 
		$user = User::find(1);
		return view('admin.create')->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validacion 
		$reglas =  array
		(
			'editor' => 'required',
	        'titulo'  => 'required', 
	        'categorys'  => 'required',
	            // validamos que el nombre sea un campo obligatorio 
	        'contenido' => array('required', 'min:8'), 
	            // validamos que el usuario sea un campo obligatorio y de mínimo 8 caracteres
	        'imagen'  => array('unique:imgs'),
	            // validemos que el correo sea un campo obligatorio y con formato de email
    	);
    	$messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
            'email' => 'El campo :attribute debe ser un email válido.',
            'max' => 'El campo :attribute no puede tener más de :max carácteres.',
            'unique' => 'El la imagen ingresada ya existe en la base de datos'
        );
        $nuevo = array(
        	'editor' => Request::input('editor'),
        	'categorys' => Request::input('categorys');
        	'titulo' => Request::input('titulo');
        	'contenido' => Request::input('contenido');
        	'primeras' => Request::input('primeras');
        	'imagen' => Request::file('imagen');
        	);

        $validation = Validator::make($nuevo, $reglas, $messages);
		if ( $validation->fails())
		{
        // en caso de que la validación falle vamos a retornar al formulario 
        // pero vamos a enviar los errores que devolvió Validator
        // y también los datos que el usuario escribió 
        	return Redirect::to('admin/create')
                // Aquí se esta devolviendo a la vista los errores 
                ->withErrors($validation)
                // Aquí se esta devolviendo a la vista todos los datos del formulario
                ->withInput();
    	}
    	else
    	{

        	//'Datos Validos!';
        	$editor = Request::input('editor'),
        	'categorys' = Request::input('categorys');
        	$titulo = Request::input('titulo');
        	'contenido' = Request::input('contenido');
        	$primeras = Request::input('primeras');
        	'imagen' = Request::file('imagen');

        	$editor = Input::get('editor');
        	$subtitulo = Input::get('subtitulo');
        	$descripcion = Input::get('descripcion');
        	$titulo = Input::get('titulo');
        	$category = Input::get('categorys');
        	$primeras = Input::get('primeras');
			$users = User::find($editor);
			$post = new Post;
			$post->subtitulo = $subtitulo;
			$post->titulo = $titulo;
			$post->slugPost = Str::slug($titulo);
			$post->descripcion = $descripcion;
			$post->primeras = $primeras;
			$post->contenido = Input::get('contenido');

			//insertar categoria
			$users->post()->save($post);
			$categorys = Category::find($category);
			$categorys->posts()->save($post);
			//insertar tags
			$tag=Input::get('tags');
			if (isset($tag)) {
				foreach ($tag as $tagId) {
					$tags = Tag::find($tagId);
					$post->tags()->attach($tags);
				}
			}
			$date = time();
			//insertar image
			$file = Input::file("imagen");
			if (!empty($file))
			{
				//return "definida";
				$filename = $date.'__'.$file->getClientOriginalName();
				$extension = File::extension($filename);
				$filename = Str::slug($filename);
				$filename = $filename.'.'.$extension;
				$file->move('public/imgs/post', $filename);

				$Imgfile   =   new Img;
				$Imgfile->imagen = $filename;
				$post->img()->save($Imgfile);	
			}
		
			return Redirect::to('admin');
    	}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

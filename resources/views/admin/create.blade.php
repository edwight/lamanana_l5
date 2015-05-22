<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />



    <style>
        body {
            text-align: center;
        }
        .formulario {
          display: block;
          margin: 20px;

        }
        .formulario input {
          margin: 10px 0;
        }
        section, .side-by-side{
            width: 100%;
            max-width: 1200px;
            margin: auto;
            text-align: left;
        }
        .columna1--admin{
            width: 30%;
            border: 1px solid #ccc;
        }

    </style>
</head>

<body>
<div class="formulario">
{!! Form::open(array('action' => array('AdminController@store' ),'files'=>true, 'method' => 'POST')) !!}
    {!! Form::text('subtitulo', '', array('size' => '150','placeholder'=>'Ante Titulo')) !!}
    {!! Form::text('titulo', '', array('size' => '150','placeholder'=>'Titulo')) !!}
    {!! Form::textarea('descripcion','', array('size' => '150x5','placeholder'=>'Descripcion')) !!}

        <div class="columna1--admin">
            {!! Form::label('file','File',array('id'=>'file')) !!}
            {!! Form::file('imagen','',array('class'=>'imagen')) !!}
    
        </div>
        <div class="columna1--admin">
          {!! Form::label('primeras', 'Primeras') !!}
          {!! Form::checkbox('primeras', 1) !!}
        </div>
    </div>
    
    
    {{-- More fields... --}}
    
    {!! Form::submit('Save', ['name' => 'submit']) !!}
    
  
{!! Form::close() !!}

</body>
</html>

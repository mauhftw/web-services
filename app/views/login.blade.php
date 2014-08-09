<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
	<h1> Iniciar sesion </h1>
        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
<p> <strong>  {{ Session::get('mensaje_error') }} </strong> </p>
        @endif
        {{ Form::open(array('url' => '/login')) }}
            {{ Form::label('usuario', 'Username:') }}
            {{ Form::text('username', Input::old('username')); }} <BR>
            {{ Form::label('contraseña', 'Password:') }}
            {{ Form::password('password'); }} <BR>
            {{ Form::label('lblRememberme', 'Remember Password') }}
            {{ Form::checkbox('rememberme', true) }} <BR>
            {{ Form::submit('Login') }}
        {{ Form::close() }}
    </body>
</html>

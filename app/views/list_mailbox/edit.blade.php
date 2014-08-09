<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Edit mailbox </title>
 </head>
 <body>
    <h1> Edit mailbox </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif

    {{ Form::open(array('url' => 'list_mailbox/' . $register->username, 'method' => 'put')) }}

	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('username', 'Username:') }}
			
		</td>
		<td>
			{{ Form::label ('username', $register->username) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('password', 'New password:') }}	
		</td>
		<td>
			 {{ Form::password ('password') }} <font color="red" size="2"> * Password must be at least 6 characters long</font>
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('name', 'Name:') }}	
		</td>
		<td>
			{{ Form::text ('name') }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('active', 'Active:') }}
       		</td>
		<td>
       			{{ Form::checkbox('active') }}
		</td>
		</tr>

		
		<tr>
		<td></td>
		<td>
      			 {{ Form::submit('Edit mailbox') }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ link_to('list_mailbox', 'Cancel') }}
		</td>
		</tr>
	</tbody>
    {{ Form::close() }}
 </body>
</html>

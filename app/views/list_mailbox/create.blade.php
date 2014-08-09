<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Add mailbox </title>
 </head>
 <body>
    <h1> Add new mailbox </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    {{ Form::open(array('url' => 'list_mailbox/' . $mailbox->id)) }}
	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('username', 'Username:') }}        
			
		</td>
		<td>
			{{ Form::text ('username') }} @
			{{ Form::select('domain',array('sa05.um.edu.ar' => 'sa05.um.edu.ar')) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('password', 'Password:') }}	
		</td>
		<td>
       			{{ Form::password('password') }} <font color="red" size="2"> * Password must be at least 6 characters long</font>
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('name', 'Name:') }}
       		</td>
		<td>
       			{{ Form::text('name') }}
		</td>
		</tr>
		
		<tr>
		<td>
       			{{ Form::label ('active', 'Active:') }}
       		</td>
		<td>
       			{{ Form::checkbox('active','value','true') }}
		</td>
		</tr>
		<tr>
		<td></td>
		<td>
      			 {{ Form::submit('Add mailbox') }}
		</td>
		</tr>

		<tr>
		<td>
      			 {{ link_to('/', 'Cancel') }}
		</td>
	</tbody>
</table>
       {{ Form::close() }}
 </body>
</html>

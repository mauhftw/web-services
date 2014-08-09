<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Add zone </title>
 </head>
 <body>
    <h1> Add slave zone </h1>
@if(Session::has('notice'))
        <p> <strong> {{ Session::get('notice') }} </strong> </p>
@endif
    {{ Form::open(array('url' => 'add_slave/' . $slave->id)) }}
	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('name', 'Zone Name:') }}
			
		</td>
		<td>
			{{ Form::text ('name', $slave->name) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('owner', 'Owner:') }}	
		</td>
		<td>
       			{{ Form::select('owner',array('Administrator' => 'Administrator')) }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('nameserver', 'IP address of master NS:') }}
       		</td>
		<td>
       			{{ Form::text('nameserver', $slave->nameserver) }}
		</td>
		</tr>
		
		<tr>
		<td></td>
		<td>
      			 {{ Form::submit('Add zone') }}
		</td>
		</tr>

		<tr>
		<td>
      			 {{ link_to('/', 'Cancel') }}
		</td>
		</tr>
	</tbody>
</table>
       {{ Form::close() }}
 </body>
</html>

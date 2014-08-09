<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Add zone </title>
 </head>
 <body>
    <h1> Add master zone </h1>
@if(Session::has('notice'))
        <p> <strong> {{ Session::get('notice') }} </strong> </p>
@endif

    {{ Form::open(array('url' => '/add_master' . $master->id)) }}
	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('name', 'Name:') }}
			
		</td>
		<td>
			{{ Form::text ('name', $master->name) }}
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
       			{{ Form::label ('type', 'Type:') }}
       		</td>
		<td>
       			{{ Form::select('type',array('MASTER' => 'Master', 'NATIVE' => 'Native')) }}
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

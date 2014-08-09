<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Add domain </title>
 </head>
 <body>
    <h1> Add domain </h1>
@if(Session::has('notice'))
        <p> <strong> {{ Session::get('notice') }} </strong> </p>
@endif

    {{ Form::open(array('url' => 'list_domains/' . $domain->id)) }}
	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('name', 'Domain:') }}
			
		</td>
		<td>
			{{ Form::text ('name', $domain->name) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('description', 'Description:') }}	
		</td>
		<td>
       			{{ Form::text('description') }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('aliases', 'Aliases:') }}  (0 = Unlimited)
       		</td>
		<td>
       			{{ Form::text('aliases') }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('mailboxes', 'Mailboxes:') }}  (0 = Unlimited)	
		</td>
		<td>
       			{{ Form::text('mailboxes') }}
		</td>
		</tr>
		<tr>
		<td>
			{{ Form::label ('mailserver', 'Mail server is a backup MX:') }}	
		</td>
		<td>
       			{{ Form::checkbox('mailserver') }}
		</td>
		</tr>
		
		<tr>
		<td></td>
		<td>
      			 {{ Form::submit('Add domain') }}
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

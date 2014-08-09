<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Edit domain </title>
 </head>
 <body>
    <h1> Edit domain </h1>
    {{ Form::open(array('url' => 'list_domains/'. $item->domain,  'method' => 'put')) }}
	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('domain', 'Domain:') }}
			
		</td>
		<td>
			{{ Form::label ('domain', $item->domain) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('description', 'Description:') }}	
		</td>
		<td>
			{{ Form::text ('description' ) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('aliases', 'Aliases:') }}	
		</td>
		<td>
			{{ Form::text ('aliases', $item->aliases) }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('mailboxes', 'Mailboxes:') }}
       		</td>
		<td>
       			{{ Form::text('mailboxes',$item->mailboxes) }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('mailserver', 'Mail server is backup MX:') }}
       		</td>
		<td>
       			{{ Form::checkbox('mailserver') }}
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
      			 {{ Form::submit('Edit zone') }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ link_to('list_domains', 'Cancel') }}
		</td>
		</tr>
	</tbody>
    {{ Form::close() }}
 </body>
</html>

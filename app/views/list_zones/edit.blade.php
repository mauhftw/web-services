<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Editar zona </title>
 </head>
 <body>
    <h1> Editar zona </h1>
    {{ Form::open(array('url' => 'list_zones/' . $register->id, 'method' => 'put')) }}

	<table>
	<tbody>
		<tr>
		<td>
			{{ Form::label ('name', 'Zone Name:') }}
			
		</td>
		<td>
			{{ Form::text ('name', $register->name) }}
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('type', 'Type:') }}	
		</td>
		<td>
{{ Form::select('type', array('A'=> 'A', 'AAAA' => 'AAAA', 'CNAME' => 'CNAME', 'MX'=> 'MX', 'NAPTR' => 'NAPTR', 'NS' => 'NS', 'PTR' => 'PTR', 'SOA' => 'SOA', 'SPF' => 'SPF', 'SRV' => 'SRV', 'SSHFP' => 'SSHFP', 'TXT' => 'TXT', 'RP' => 'RP')) }} </td>
		</td>
		</tr>

		<tr>
		<td>
			{{ Form::label ('content', 'Content:') }}	
		</td>
		<td>
			{{ Form::text ('content', $register->content) }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('ttl', 'TTL:') }}
       		</td>
		<td>
       			{{ Form::text('ttl', $register->ttl) }}
		</td>
		</tr>

		<tr>
		<td>
       			{{ Form::label ('priority', 'Priority:') }}
       		</td>
		<td>
       			{{ Form::selectRange('priority', 1, 10, array('selected' => $register->prio) ) }}
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
       			{{ link_to('list_zones', 'Cancel') }}
		</td>
		</tr>
	</tbody>
    {{ Form::close() }}
 </body>
</html>

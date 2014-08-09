<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Add Record </title>
 </head>
 <body>
    <h1> Add new record </h1>
    {{ Form::open(array('url' => 'list_zones/' )) }}

       <table style="border: solid 1px #000;">
          <thead>
          <tbody>
             <tr>
                <td style="text-align: center;"> {{ Form::label ('name', 'Name') }} </td>
                <td style="text-align: center;"> {{ Form::text('name') }}. {{$query->name}}    </td>
                <td style="text-align: center;"> {{ Form::label ('type', 'Type') }} </td>
                <td style="text-align: center;"> {{ Form::select('type', array('A'=> 'A', 'AAAA' => 'AAAA', 'CNAME' => 'CNAME', 'MX'=> 'MX', 'NAPTR' => 'NAPTR', 'NS' => 'NS', 'PTR' => 'PTR', 'SOA' => 'SOA', 'SPF' => 'SPF', 'SRV' => 'SRV', 'SSHFP' => 'SSHFP', 'TXT' => 'TXT', 'RP' => 'RP')) }} </td>
                <td style="text-align: center;"> {{ Form::label ('content', 'Content') }} </td>
                <td style="text-align: center;"> {{ Form::text('content','ns1.sa05.um.edu.ar hostmasters.sa05.um.edu.ar 2014052004 28800 7200 604800 86400') }} </td>
                <td style="text-align: center;"> {{ Form::label ('priority', 'Priority') }} </td>
                <td style="text-align: center;"> {{ Form::text('priority','1') }} </td>
                <td style="text-align: center;"> {{ Form::label ('ttl', 'TTL') }} </td>
		{{ Form::hidden('id', $query->id) }}
		{{ Form::hidden('dominio', $query->name) }}
                <td style="text-align: center;"> {{ Form::text('ttl','86400') }} </td>
                <td style="text-align: center;"> 
			{{ Form::submit("Add record") }}
			{{ Form::close() }}
		 </td>
                <td style="text-align: center;">{{ link_to('/list_zones', 'Cancel') }} </td>
             </tr>
          </tbody>
       </table>
 </body>
</html>

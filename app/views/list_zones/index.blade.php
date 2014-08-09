<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> DNS </title>
 </head>
 <body>
    <h1> DNS </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    <p> List zones </p>
    @if($domains->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Name </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Type </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Records </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Actions </th>
          </tr>
          </thead>
          <tbody>
          @foreach($domains as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->name }} </td>
                <td style="text-align: center;"> {{ $item->type}} </td>
                <td style="text-align: center;"> {{ $item->records->count() }} </td>
		<td style="text-align: center;"> {{ link_to('list_zones/'.$item->id, 'Show records') }} </td>
		<td style="text-align: center;"> {{ link_to('list_zones/createRecord/'.$item->id, 'Add record') }} </td>
                <td style="text-align: center;"> 
			{{ Form::open(array('url' => 'list_zones/'.$item->id)) }}
			{{ Form::hidden("_method", "DELETE") }}
			{{ Form::submit("Delete") }}
			{{ Form::close() }}
		 </td>
             </tr>
          @endforeach
          </tbody>
       </table>
    @else
       <p> No se han encontrado registros </p>
    @endif
 </body>
</html>

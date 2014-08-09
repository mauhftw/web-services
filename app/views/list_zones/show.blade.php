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
    <p> List records </p>
    @if($records->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Name </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Type </th>
             <th style="width: 600px; border-bottom: solid 1px #000;"> Content </th>
             <th style="width: 100px; border-bottom: solid 1px #000;"> TTL </th>
             <th style="width: 100px; border-bottom: solid 1px #000;"> Priority </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Actions </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($records as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->name }} </td>
                <td style="text-align: center;"> {{ $item->type }} </td>
                <td style="text-align: center;"> {{ $item->content }} </td>
                <td style="text-align: center;"> {{ $item->ttl }} </td>
                <td style="text-align: center;"> {{ $item->prio }} </td>
		<td style="text-align: center;"> {{ link_to('list_zones/'.$item->id.'/edit', 'Edit') }} </td>
                <td style="text-align: center;">   
			{{ Form::open(array('url' => 'list_zones/'.$item->id)) }}
			{{ Form::hidden("_method", "DELETE") }}
			{{ Form::hidden("hidden", "record") }}
			{{ Form::hidden("tipo", $item->type) }}
			{{ Form::submit("Delete") }}
			{{ Form::close() }}
		</td>
             </tr>
          @endforeach
          </tbody>

    @else
       <p> No se han encontrado registros </p>
    @endif
 </body>
</html>

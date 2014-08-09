<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> MAIL </title>
 </head>
 <body>
    <h1> Mailbox </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    <p> List mailbox </p>
    @if($mailbox->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 200px; border-bottom: solid 1px #000;"> E-mail </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Name </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Last modified </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Active </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Actions </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($mailbox as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->username }} </td>
                <td style="text-align: center;"> {{ $item->name}} </td>
                <td style="text-align: center;"> {{ $item->modified }} </td>
                <td style="text-align: center;"> <?php if($item->active == '0') echo 'NO'; else echo 'YES'; ?>  </td>
		<td style="text-align: center;"> {{ link_to('list_mailbox/'.$item->username.'/edit', 'Editar') }} </td>
                <td style="text-align: center;">
			{{ Form::open(array('url' => 'list_mailbox/'.$item->username)) }}
			{{ Form::hidden("_method", "DELETE") }}
			{{ Form::submit("Delete") }}
			{{ Form::close() }}
		</td>
             </tr>
          @endforeach
          </tbody>
       </table>
    @else
       <p> No se han encontrado mailboxes </p>
    @endif
 </body>
</html>

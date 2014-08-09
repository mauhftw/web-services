<mDOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Mail </title>
 </head>
 <body>
    <h1> Mailbox list </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    @if($domains->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Domain </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Description </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Mailboxes </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Backup MX </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Last modified </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Active </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Actions  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($domains as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->domain }} </td>
                <td style="text-align: center;"> {{ $item->description}} </td>
                <td style="text-align: center;"> {{ $item->mailboxes }} </td>
                <td style="text-align: center;"> <?php if($item->backupmx == 0) echo 'NO'; else echo 'YES'; ?>  </td>
                <td style="text-align: center;"> {{ $item->modified }} </td>
                <td style="text-align: center;"> <?php if($item->active == 0) echo 'NO'; else echo 'YES'; ?> </td>
		<td style="text-align: center;"> {{ link_to('list_domains/'.$item->domain.'/edit', 'Edit') }} </td>
                <td style="text-align: center;"> 
                        {{ Form::open(array('url' => 'list_domains/'.$item->domain)) }}
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

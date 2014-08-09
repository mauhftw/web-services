<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Servicios de aplicacion</title>
</head>
<body>
    <div class="welcome">
        <h1>Welcome {{ Auth::user()->name; }}</h1>
@if(Session::has('notice'))
	<p> <strong> {{ Session::get('notice') }} </strong> </p>
@endif
	<dt> DNS</dt>
	<ul>
		<li><a href="/list_zones">List zones</a></li>
		<li><a href="/add_master/create">Add master zone</a></li>
		<li><a href="/add_slave/create">Add slave zone</a></li>
	</ul>
	<dt> Mail</dt>
	<ul>
		<li><a href="/list_domains">List domains</a></li>
		<li><a href="/list_domains/create">New domain</a></li>
		<li><a href="/list_mailbox">Mailbox list</a></li>
		<li><a href="/list_mailbox/create">Add mailbox</a></li>
	</ul>
	
        <a href="/logout">Logout</a>
	

    </div>
</body>
</html>

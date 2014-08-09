<?php
class mailboxController extends BaseController {

// realizo consulta a tabla domains (with -> domains es el nombre de la variable, y el $domains el contenido de la varaiable)

   public function index() {
	$mailbox = Mailbox::all();
	return View::make('list_mailbox.index')->with('mailbox', $mailbox);

   }
   public function show($id) { 
   }
   public function create() {
 	$mailbox = new Mailbox ();
	return View::make('list_mailbox.create')->with('mailbox', $mailbox);
   }
   public function store() {
	$length = strlen(Input::get('password'));
 	$name = Input::get('username',null);
	if ($length < 6) {
		return Redirect::to('list_mailbox/create')->with('notice', 'oops!');
	}
	if ($name != null) {
		$address = $name.'@'.Input::get('domain');  //usuario@dominio
		$usuario = Mailbox::where('username', '=', $address)->first();
	if ($usuario != null){
		return Redirect::to('list_mailbox/create')->with('notice', 'La direccion solicitada esta en uso');
	}
	
 	$current_timestamp = date("Y-m-d H:i:s");
	$mailbox = new Mailbox();
	$mailbox->username = Input::get('username').'@'.Input::get('domain');
	$pass = Input::get('password');
//	$hash = Crypt::encrypt($pass);
	$hash = crypt($pass);
	$mailbox->password = $hash;
	$mailbox->name = Input::get('name');
	$mailbox->maildir = Input::get('username').'@'.Input::get('domain').'/';
	$mailbox->quota = '0';
	$mailbox->local_part = Input::get('username');	
	$mailbox->domain = Input::get('domain');
	$mailbox->created = $current_timestamp;
	$mailbox->modified = $current_timestamp;
	if(Input::get('active') == ''){
		$mailbox->active = '0';
	}
	else {
		$mailbox->active ='1';
	}
	$mailbox->save();
	$alias = new Alias();
	$alias->address = $mailbox->username;
	$alias->goto = $mailbox->username;
	$alias->domain = $mailbox->domain;
	$alias->created = $mailbox->created;
	$alias->modified = $mailbox->modified;
	$alias->active = $mailbox->active;
	$alias->save();
	
	$address = new Address();
	$address->id = $mailbox->username;
	$address->address = $mailbox->username;
	$address->crypt = $hash;
	$address->clear = '';
	$address->name = $mailbox->name;
	$address->uid = '5000';
	$address->gid = '5000';
	$address->home = '/home/vmail/';
	$address->domain = $mailbox->domain;
	$address->maildir = $mailbox->domain.'/'.'test/Maildir/';
	$address->imapok = '1';
	$address->bool1 = '1';
	$address->bool2 = '1';
	$address->save();


	return Redirect::to('/')->with('notice', 'El mailbox ha sido creado correctamente.'); 
   }
else {
	return Redirect::to('list_mailbox/create')->with('notice', 'oops!');
	}
}
// para poder editar un solo dominio

   public function edit($id) {
	$register = Mailbox::where('username', '=', $id)->first();
	return View::make('list_mailbox.edit')->with('register', $register);

   }

// actualizo db
   public function update($id) {
	$length = strlen(Input::get('password'));
	if($length >= 6) {
        $current_timestamp = date("Y-m-d H:i:s");
        $mailbox = new Mailbox();
        $mailbox->password = crypt(Input::get('password'));
        $mailbox->name = Input::get('name');
        $mailbox->modified = $current_timestamp;
        $mailbox->active = Input::get('active');

	$address = new Address();
	$address->crypt = $mailbox->password;
	$address->name = $mailbox->name;	

//super query
Mailbox::where('username', '=', $id)->update(array('password' => $mailbox->password, 'name' => $mailbox->name, 'modified' => $mailbox->modified, 'active' => $mailbox->active));
Address::where('id', '=', $id)->update(array('crypt' => $address->crypt, 'name' => $address->name));

return Redirect::to('list_mailbox')->with('notice', 'El mailbox ha sido editado correctamente');

  }
else {
return Redirect::to('list_mailbox/'.$id.'/edit')->with('notice', 'oops!');

	}
}
   public function destroy($id) { 
	$mailbox = Mailbox::where('username', '=', $id)-> delete();
	$alias = Alias::where('address', '=', $id)-> delete();	
	$address = Address::where('id', '=', $id)->delete();
	return Redirect::to('list_mailbox')->with('notice', 'El mailbox ha sido eliminado correctamente.');
   }
}
?>

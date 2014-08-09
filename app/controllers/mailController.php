<?php
class mailController extends BaseController {

   public function index() {
	$domains = Mailist::all();
	return View::make('list_domains.index')->with('domains', $domains);

   }
   public function create() {
        $domain = new Maildomain();
        return View::make('list_domains.create')->with('domain', $domain);
 
   }
   public function store() {
	$name = Input::get('name',null);
	if($name != null) {
		$domain = Maildomain::where('domain', '=', $name)->first();
	if($domain != null) {
		return Redirect::to('list_domains/create')->with('notice', 'El nombre de dominio ya esta en uso');
	}

	$current_timestamp = date("Y-m-d H:i:s");
	$dominio = new Maildomain();
        $dominio->domain = Input::get('name');
        $dominio->description = Input::get('description');
        $dominio->aliases = Input::get('aliases');
        $dominio->mailboxes = Input::get('mailboxes');
        $dominio->maxquota = Input::get('mailboxes');
        $dominio->quota = '0';
        $dominio->transport = 'virtual';
	if (Input::get('mailserver') == '') {
		$dominio->backupmx = '0';
}else {
        $dominio->backupmx = '1';
}
        $dominio->created = $current_timestamp;
        $dominio->modified =$current_timestamp;
        $dominio->active = '1';
        $dominio->save();
	return Redirect::to('/')->with('notice', 'El dominio se ha sido creado correctamente.'); 
   }
else {
	return Redirect::to('list_domains/create')->with('notice', 'oops!');
	}
}
// para poder editar un solo dominio

   public function edit($id) {
	$item = Maildomain::where('domain', '=', $id)->first();
	return View::make('list_domains.edit')->with('item', $item);
   }

// actualizo db
   public function update($id) {
        $current_timestamp = date("Y-m-d H:i:s");
        $dominio = new Maildomain();
        $dominio->domain = $id;
        $dominio->description = Input::get('description');
        $dominio->aliases = Input::get('aliases');
        $dominio->mailboxes = Input::get('mailboxes');
        $dominio->maxquota = Input::get('mailboxes');
        $dominio->quota = '0';
        $dominio->transport = 'virtual';
        if (Input::get('mailserver') == '') {
                $dominio->backupmx = '0';
}else {
        $dominio->backupmx = '1';
}
        $dominio->created = $current_timestamp;
        $dominio->modified =$current_timestamp;
        $dominio->active = '1';

//super query
Maildomain::where('domain', '=', $id)->update(array('domain' => $id, 'description' => $dominio->description, 'aliases' => $dominio->aliases, 'mailboxes' => $dominio->mailboxes, 'maxquota' => $dominio->maxquota, 'quota' => $dominio->quota, 'transport' => 'virtual', 'backupmx' => $dominio->backupmx, 'modified' => $dominio->modified, 'active' => '1'));

        return Redirect::to('list_domains')->with('notice', 'El dominio  ha sido modificado correctamente.'); 
   }

   public function destroy($id) { 
	$dominio = Maildomain::where('domain', '=', $id)-> delete();
	return Redirect::to('list_domains')->with('notice', 'El dominio ha sido eliminado correctamente.');
   }
}
?>

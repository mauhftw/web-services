<?php
class dnsController extends BaseController {

// realizo consulta a tabla domains (with -> domains es el nombre de la variable, y el $domains el contenido de la varaiable)
   public function index() {
	$domains = Domain::all();
	return View::make('list_zones.index')->with('domains', $domains);

   }
   public function show($id) { 
	$domain_id = $id;
	$records = Record::where('domain_id', '=', $domain_id)->get();
	return View::make('list_zones.show')->with('records', $records);
   }
   public function createRecord($id) { 
	$query = Domain::where('id', '=', $id)->first();
	return View::make('list_zones.create', array('query' => $query));
   }
   public function store() {
	$dominio = '.'.Input::get('dominio');
        $name = Input::get('name',null);
        if ($name != null) {
        	$record = Record::where('name', '=', $name)->first();
        if ($record != null) {
                return Redirect::to('list_zones')->with('notice', 'El registro ya existe');
}
 $name = Input::get('name',null).$dominio;
// tabla records
        $records= new Record();
        $records->domain_id = Input::get('id');
        $records->name = Input::get('name').$dominio;
        $records->type = Input::get('type');
	if (Input::get('content') == '') {
	        $records->content ='ns1.'.Input::get('dominio') .' hostmasters.'.Input::get('dominio').' ' .date("Ymd") ."00 28800 7200 604800 86400";
	} else {
		$records->content = Input::get('content');
}
        $records->ttl = Input::get('ttl');
        $records->prio = Input::get('priority');
        $records->change_date = time();
        $records->auth = '1';
        $records->save();
        return Redirect::to('list_zones')->with('notice', 'El registro ha sido creada correctamente.');
}
        else {
        return Redirect::to('list_zones')->with('notice', 'El nombre de registro ya existe');
}
   }

// para poder editar un solo dominio
   public function edit($id) {
	$register = Record::find($id);
	return View::make('list_zones.edit')->with('register', $register);
   }

// actualizo de registros
   public function update($id) {
	$domains = Record::find($id);
	$domains->name = Input::get('name');
	$domains->type = Input::get('type');
	$domains->content = Input::get('content');
	$domains->prio = Input::get('priority');
	$domains->ttl = Input::get('ttl'); 
	$domains->auth = "1"; 
	$domains->save();
	$domain_id= $domains->domain_id;
	$type = $domains->type;

	if($type == 'SOA') {
		$zone = Domain::find($domain_id);
		$zone->name = Input::get('name');	
		$zone->save();
		return Redirect::to('list_zones')->with('notice', 'El registro ha sido modificado correctamente.'); 
} else {
	
	return Redirect::to('list_zones')->with('notice', 'oops!'); 
}
   }
//elimino las zonas, registro hidden envio informacion para eliminar un registro o una zona completa 
   public function destroy($id) {

	$aux = Input::get('hidden');
	if ($aux == 'record' ) {
		$records = Record::where('id', '=', $id)-> delete();
		return Redirect::to('list_zones')->with('notice', 'El registro ha sido eliminado correctamente.');
	}
	else {
// es una zona, borro tooodo 
	$domain = Domain::find($id);
	$domain_id = $id;
	$zones = Zone::where('domain_id', '=', $domain_id)-> delete();
	$records = Record::where('domain_id', '=', $domain_id)-> delete();
	$domain->delete();
	return Redirect::to('list_zones')->with('notice', 'El registro ha sido eliminado correctamente.');
	}
   }
}
?>

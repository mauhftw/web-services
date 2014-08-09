<?php
class masterController extends BaseController {


   public function index() {
   }
   public function show($id) { 
   }

//creo nueva zona master
   public function create() {
	$master = new Domain();
	return View::make('add_master.save')->with('master', $master);

 
   }
//guardo en db
   public function store() {
	$name = Input::get('name',null);
	if ($name != null) {
	
	$dominio = Domain::where('name', '=', $name)->first();

	if ($dominio != null) {
		return Redirect::to('add_master/create')->with('notice', 'La zona ya existe'); 
}
	$master = new Domain();
	$master->name = Input::get('name');
	$master->type = Input::get('type');
	$master->save();
	$id = $master->id; //obtengo id del ultimo registro que inserto

// tabla records

	$records= new Record();
	$records->domain_id = $id;
	$records->name = Input::get('name');
	$records->type = 'SOA';
	$records->content ='ns1.'.Input::get('name') .' hostmasters.'.Input::get('name').' ' .date("Ymd") ."00 28800 7200 604800 86400";
	$records->ttl = '86400';
	$records->prio = '0';
	$records->change_date = time();
	$records->auth = '1';
	$records->save();
// tabla zones

	$zones = new Zone();
	$zones->domain_id = $id;
	$zones->owner = '1';
	$zones->comment = '';
	$zones->zone_templ_id= '0';
	$zones->save();

	return Redirect::to('/')->with('notice', 'La zona ha sido creada correctamente.'); 
}
	else {

	return Redirect::to('add_master/create')->with('notice', 'oops!'); 
}


   }
   public function edit($id) {
   }

   public function update($id) {
   }
   public function destroy($id) { 
   }
}
?>

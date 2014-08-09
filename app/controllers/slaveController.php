<?php
class slaveController extends BaseController {

//creo nueva zona master
   public function create() {
	$slave = new Domain();
	return View::make('add_slave.save')->with('slave', $slave);
    }
//guardo en db
   public function store() {
	$name = Input::get('name',null);
	if ($name != null) {

	$dominio = Domain::where('name', '=', $name)->first();

	if ($dominio != null) {
		return Redirect::to('add_slave/create')->with('notice', 'La zona ya existe'); 
}
	$slave = new Domain();
	$slave->name = Input::get('name');
	$slave->master = Input::get('nameserver');
	$slave->type = 'SLAVE';
	$slave->save();
	$id = $slave->id; //obtengo id del ultimo registro que inserto

// tabla records -- comentar esto
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

	return Redirect::to('add_slave/create')->with('notice', 'oops!');
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

<?php
class Domain extends Eloquent {

protected $connection ='dns';
public $timestamps = false;

public function records(){
 return $this->hasMany('Record');
}
}
?>

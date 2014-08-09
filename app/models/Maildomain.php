<?php
class Maildomain extends Eloquent {

protected $connection ='mail';
protected $table = 'domain';
public $timestamps = false;

public function mailboxs () {

	return $this->hasMany('Mailbox','domain','domain');

}

}
?>

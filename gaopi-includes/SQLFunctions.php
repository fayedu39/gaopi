<?php
/*
 * Defines basic SQL functions
 **/

function SQLConnect() {
	return mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
}
function SQLReq($DB,$req) {
	return mysqli_query($DB,$req);
}
function SQLPrepStr($DB,$str) {
	return mysqli_real_escape_string($DB,$str);
}
function SQLFetch($req) {
	return mysqli_fetch_assoc($req);
}
function SQLFreeReq($req) {
	return mysqli_free_result($req);
}
function SQLExec($DB,$req) {
	return mysqli_real_query($DB,$req);
}
class SQLDB {
	public $DB;
	public function __construct() {
		$this->DB=SQLConnect();
	}
	public function req($req) {
		return SQLReq($this->DB,$req);
	}
	public function prepstr($str) {
		return SQLPrepStr($this->DB,$str);
	}
	public function fetch($req) {
		return SQLFetch($req);
	}
	public function freereq($req) {
		return SQLFreeReq($req);
	}
	public function exec($req) {
		return SQLExec($this->DB,req);
	}
	public function fetchall($req) {
		$n=0;
		$ret=array();
		while($data=$this->fetch($req)) {
			$ret[$n]=$data;
			$n++;
		}
		$this->freereq($req);
		return $ret;
	}
}
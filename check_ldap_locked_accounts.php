<?php
$user   = 'cn=ldapbindmgr,dc=dflight,dc=it';
$passwd = 'secret';
$dn = 'dflight';
$ds = ldap_connect('ldap://192.168.25.18');
$userbasedn='cn="ldapbindmgr,dc=dflight,dc=it"';
//$userbasedn='cn="admin,cn=config"';
$filter='(|(sn=$person*)(givenname=$person*))';

if(!$ds){
	die("Error:Unable to connect to the LDAP Server");
	return;
}
if (!ldap_bind($ds, $user, $passwd)){
	die("Error:Unable to bind to '$dn'!");
	return;
}
$sr=ldap_search($ds, $userbasedn, $filter);
$info = ldap_get_entries($ds, $sr);

if($info["count"] > 0){
	$entry = ldap_first_entry($ds, $sr);
	$return_array = ldap_get_attributes($ds, $entry);
	if($return_array)
	{
		for ($i=0;$i<$return_array['count'];$i++)
		{
		  print($return_array[$i]);
		  print($return_array[$return_array[$i]][0]);
		}
	}
}
?>
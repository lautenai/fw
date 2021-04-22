<?php
function dd($value)
{
	die(highlight_string("<?php\n" . var_export($value, true) . ";\n?>"));
}

function acl($permission, $user_id, $group_id){
	return Acl::check($permission, $user_id, $group_id);
}
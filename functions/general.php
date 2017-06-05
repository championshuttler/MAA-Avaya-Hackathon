<?php 

function logged_in(){

return (isset($_SESSION["user_id"])) ? true : false;
}


function protect_page(){
	if(logged_in()===false){
	header('Location:protected.php');	
	exit();
	}
	
}
function email($to,$subject,$body){
	
	mail($to,$subject,$body,'From: webadmin@infoxpression.in ');
}

function protect_logged_page(){
	if(logged_in()===true){
	
	header('Location:profile.php');	
	exit();
	}
	
	
}
function protect_profile_page(){
	if(logged_in()===false){
	header('Location:login.php');	
	exit();
	}
	
}

function admin_protect(){
	global $user_data;
	if($user_data['type']!=1){
		
		//else if(is_admin($user_data['user_id'])===false){
		header('Location:index.php');	
	exit();
	}
}

function redirect_index(){
	if(logged_in()===true){
	header('Location:index.php');	
	exit();
	}
	
}
function array_sanitize(&$item){
	
	$item=htmlentities(strip_tags(escape($item)));
	
}
function sanitize($data){
	
	return htmlentities(strip_tags(escape($data)));

}

function output_errors($errors){
	
		$output=array();
		foreach($errors as $error){
			$output[]='<li>'. $error .'</li>'; 
		}
		return '<ul>'.  implode('',$output) . '</ul>';
}	

function escape($value) {
    $return = '';
    for($i = 0; $i < strlen($value); ++$i) {
        $char = $value[$i];
        $ord = ord($char);
        if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
            $return .= $char;
        else
            $return .= '\\x' . dechex($ord);
    }
    return $return;
}



?>
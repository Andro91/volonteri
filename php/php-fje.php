<?php
	function postojiGET($name){
		if(isset($_GET[$name]))
			if($_GET[$name]!="") return 1;
		return 0;
	}
?>
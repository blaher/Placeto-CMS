<?php function placeto_extension_gzip($ext){$exts=array('.css'=>TRUE,'.js'=>TRUE,'.htm'=>TRUE,'.html'=>TRUE,'.xml'=>TRUE,'.txt'=>TRUE);if($exts[$ext]){unset($exts,$ext);return TRUE;}else{unset($exts,$ext);return FALSE;}}if(!$nf||placeto_extension_gzip($extension)){if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip')){ob_start('ob_gzhandler');}}?>
<?php function placeto_suggest_keywords($contents){$contents=strip_tags($contents);$contents=strtolower($contents);$contents=preg_replace('/[(\.,"><;\'\:)]/','',$contents);$contents=trim($contents);$array=explode(' ',$contents);foreach($array as $value){$array2[$value]=substr_count($contents,$value);}arsort($array2);return $array2;}?>
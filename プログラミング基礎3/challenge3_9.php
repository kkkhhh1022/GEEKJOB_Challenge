<?php
function data($id){
	$kitagawa = array(1, 'きたがわ', '昭和63年10月22日', '神奈川');
	$ito = array(2, 'いとう', '平成2年6月3日', null);
	$yamada = array(3, 'やまだ', '平成4年5月5日', '千葉県');
		$member = array($kitagawa, $ito, $yamada);
		return $member[$id - 1];
}
$array = array(1, 2, 3);
foreach($array as $id){
	$array_data = data($id);
	foreach($array_data as $key => $value){
		if($key == 0 || $value == null){
			continue;
		}
		echo "$value <br>";
	}
}

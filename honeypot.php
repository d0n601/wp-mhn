<?php

class Mhn_Server {

	function last_day() {

		$json = file_get_contents(SERVER_URL.'/api/session/?api_key='.API_KEY.'&hours_ago=24');
		$obj  = json_decode($json);

		$html =   "<table class='".MHN_TABLE."'>";
		$html .=  '	<tr>';
		$html .=  '	<tr>';
		$html .=  '		<th>Time Stamp</th>';
		$html .=  '		<th>Attacking IP</th>';
		$html .=  '		<th>Target Port</th>';
		$html .=  '		<th>Attack Protocol</th>';
		$html .=  '		<th>Honeypot</th>';
		$html .=  '	</tr>';

		foreach(array_reverse($obj->data) as $attack) {
			$html .=  '	<tr>';
			$html .=  '		<td>'.date('Y-m-d h:i:s A',strtotime($attack->timestamp)).'</td>';
			$html .=  "		<td><a href='".SOURCE_IP_LINK.$attack->source_ip."'>".$attack->source_ip."</a></td>";
			$html .=  '		<td>'.$attack->destination_port.'</td>';
			$html .=  '		<td>'.$attack->protocol.'</td>';
			$html .=  "		<td><a href='".HONEYPOT_PAGE_LINK.$attack->honeypot."'>".$attack->honeypot."</a></td>";
			$html .=  '	</tr>';
		}

		$html .= '</table>';

		return $html;
	}

	function top_attackers() {

		$json = file_get_contents(SERVER_URL.'/api/top_attackers/?api_key='.API_KEY.'&hours_ago=168');
		$obj  = json_decode($json);

		$html =   "<table class='".MHN_TABLE."'>";
		$html .=  '	<tr>';

		foreach($obj->data as $attack) {
			$html .=  '	<tr>';
			$html .=  "		<td><a href='".SOURCE_IP_LINK.$attack->source_ip."'>".$attack->source_ip."</a></td>";
			$html .=  "		<td><a href='".HONEYPOT_PAGE_LINK.$attack->honeypot."'>".$attack->honeypot."</a></td>";
			$html .=  '	</tr>';
		}
		
		$html .= '</table>';

		return $html;
	}

	function honeypot($atts) {

	    $honeypot_atts = shortcode_atts( array(
			'hp' => ''
	    ), $atts );	

		$url  = SERVER_URL.'/api/session/?api_key='.API_KEY.'&limit=5000&honeypot='.$honeypot_atts['hp'];
		$json = file_get_contents($url);
		$obj  = json_decode($json);

		$html =   "<table class='".MHN_TABLE."'>";
		$html .=  '	<tr>';
		$html .=  '		<th>Time Stamp</th>';
		$html .=  '		<th>Attacking IP</th>';
		$html .=  '		<th>Target Port</th>';
		$html .=  '		<th>Attack Protocol</th>';
		$html .=  '	</tr>';

		foreach(array_reverse($obj->data) as $attack){
			$html .=  '	<tr>';
			$html .=  '		<td>'.date('Y-m-d h:i:s A',strtotime($attack->timestamp)).'</td>';
			$html .=  "		<td><a href='".SOURCE_IP_LINK.$attack->source_ip."'>".$attack->source_ip."</a></td>";
			$html .=  '		<td>'.$attack->destination_port.'</td>';
			$html .=  '		<td>'.$attack->protocol.'</td>';
			$html .=  '	</tr>';
		}
		$html .= '</table>';

		return $html;

	}


	function sessions() {
		if(isset($_GET['source_ip'])) {
	    	$url  = SERVER_URL.'/api/session/?api_key='.API_KEY.'&limit=3000&source_ip='.$_GET['source_ip'];
			$json = file_get_contents($url);
			$obj  = json_decode($json);

			if(count($obj->data) > 0){
				$html =   "<table class='".MHN_TABLE."'>";
				$html .=  '	<tr>';
				$html .=  '		<th>Time Stamp</th>';
				$html .=  '		<th>Attacking IP</th>';
				$html .=  '		<th>Target Port</th>';
				$html .=  '		<th>Attack Protocol</th>';
				$html .=  '	</tr>';

				foreach(array_reverse($obj->data) as $attack){
					$html .=  '	<tr>';
					$html .=  '		<td>'.date('Y-m-d h:i:s A',strtotime($attack->timestamp)).'</td>';
					$html .=  "		<td><a href='".SOURCE_IP_LINK.$attack->source_ip."'>".$attack->source_ip."</a></td>";
					$html .=  '		<td>'.$attack->destination_port.'</td>';
					$html .=  '		<td>'.$attack->protocol.'</td>';
					$html .=  '	</tr>';
				}
				$html .= '</table>';
			}
			else {
				$html = 'No Sessions Found';
			}
		}
		else {
			$html = 'No Sessions Found';
		}
		return $html;
	}

}



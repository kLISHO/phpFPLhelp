<!doctype html>
<html lang="en">
<head>
	<title>Fantasy Premier League - Sekta</title>  
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <style>
		#players {
			margin: auto;
			font-family:'Arial'; 
			color: #37003c; 
			text-shadow: 1px 1px #ccc; 
			font-weight: bold;
			max-width: 90%;
		}
		.player_items_row {
			display: block;
			padding: 0 0 60px 0;
		}
		.player_item {
			display: inline-block;
			width: 12%;
			padding:5px;
		}
		.player_item img {
			padding: 0 0 5px 0;
		}
		.player_item_name {
			font-size: 12px;
			color: #fff;
			padding: 2px;
			text-shadow: 1px 1px #333;
			background-color: #02894e;
		}
		.player_item_value {
			font-size: 10px;
			color: #fff;
			padding: 2px;
			text-shadow: 1px 1px #333;
			background-color: #37003c;		
		}
		h1,h2,h3,h4 {
		color: #fff;
		}
		@media (max-width:768px)
		{
			#players {
				margin: auto;
				font-family:'Arial'; 
				color: #37003c; 
				text-shadow: 1px 1px #ccc; 
				font-weight: bold;
				width: 100%;
				margin:0;
				max-width: 100%;
			}			
			.player_items_row {
				display: block;
				padding: 0 0 20px 0;
			}
			.player_item {
				display: inline-block;
				width: 18%;
				padding:2px;
			}
			.player_item img{
				width: 100%;
			}
			.player_item_name {
				width: 100%;
				font-size: 9px;
			}
			.player_item_value {
				font-size:8px;
				width: 100%;				
			}			
		}
		
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark  mb-4" style="margin-bottom:0px!important;background-color: #02894e;">
  <a class="navbar-brand" href="#">
	<img style="height: 50px" src="ball.png"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./">Players</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./prediction.php">Prediction</a>
      </li>
    </ul>
  </div>
</nav>
<main role="main" class="container-fluid">
<div class="row" style="text-align: center;background-color: #37003c;">
<div class="col-12" style="padding:15px 0 15px 0;background: url('https://fantasy.premierleague.com/static/media/header-players.c7adc20a.png') no-repeat 80% center;background-size: contain">
<h3>Kupres Premier League Fantasy Help</h3>
<h4>Team Prediction</h4>
</div>
</div>
<br/>

<?php
function curl_get_file_contents($URL)
{
	$c = curl_init();
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $URL);
	$contents = curl_exec($c);
	curl_close($c);

	if ($contents) return $contents;
	else return FALSE;
}
if(isset($_POST['filter']))
{
	$post = $_POST['filter'];
	
	//All data
	$json_url = "https://fantasy.premierleague.com/api/bootstrap-static/";
	$json = curl_get_file_contents($json_url);
	$jsonData = stripslashes(html_entity_decode($json));
	$data = json_decode($jsonData,true);
	$players = $data['elements'];
	
	//Fixures
	$json_url_fix = "https://fantasy.premierleague.com/api/fixtures/";
	$json_fix = curl_get_file_contents($json_url_fix);
	$jsonData_fix = stripslashes(html_entity_decode($json_fix));
	$fixtures = json_decode($jsonData_fix,true);		

	$gk_no = 0;
	$def_no = 0;
	$mid_no = 0;
	$fwd_no = 0;
	$dreamteam = null;
	$team_total_points = 0;
	$cost = 0;
	$gw = $post['GW'];
	$method = $post['MET'];
	$bench = $post['BENCH'];
	
	//Method name
	if ($post['MET'] == 0) { $method_name = 'Points Per Milion';} else { $method_name = 'Highest points sum';}
	$pn=0;
	foreach($players as $key=>$item)
	{
		if ($gw == 0)
		{
			$players[$pn]['ppm'] = round($item['total_points'] / ($item['now_cost']/10), 2);	
		}
		else
		{
			$player_diff=0;
			foreach ($fixtures as $key=>$fix)
			{
				if (($item['team_code'] == $fix['team_h']) and ($fix['event']<=$gw))
				{
					$player_diff += $fix['team_h_difficulty'];
				}
				if (($item['team_code'] == $fix['team_a']) and ($fix['event']<=$gw))
				{
					$player_diff += $fix['team_a_difficulty'];
				}
			}
			//echo $item['web_name'].'-tp-'.$item['total_points'].'-nc-'.$item['now_cost'].'-diff-'.$player_diff.'<br>';
			if ($post['MET'] == 0) 
			{ 
				$players[$pn]['ppm'] = round($item['total_points']/(($item['now_cost']/10)*$player_diff),2);
			}
			else
			{
				$players[$pn]['ppm'] = round(($item['total_points']/$player_diff),2);
			}			
						
		}
		$pn++;
	}				
		
	array_multisort(array_column($players, 'ppm'), SORT_DESC,SORT_NUMERIC, $players);		

	$i = ($bench>0)?4:0;

	foreach ($players as $key=>$item)
	{ 		
		//if ((count($dreamteam)<15))
		//{
			
			switch ($item['element_type'])
			{
				//GK
				case 1:
					if ((array_count_values(array_column($dreamteam, 'team'))[$item['team']]<3))
					{
						//Cheap bench
						if ($bench==1)
						{
							if (($item['now_cost']==40) and ($item['ppm']>$dreamteam[0]['ppm']))
							{
								$dreamteam[0] = $item;
								$dreamteam[0]['cheap'] = 1;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$gk_no++;
							}
							else if ($gk_no < 1)
							{
								$dreamteam[$i] = $item;
								$dreamteam[$i]['cheap'] = 0;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$gk_no++;
								$i++;
							}
						}
						else if ($gk_no < 2)
						{
							$dreamteam[$i] = $item;
							$dreamteam[$i]['cheap'] = 0;
							$team_total_points += $item['total_points'];
							$cost += $item['now_cost'];
							$gk_no++;
							$i++;
						}
					}
				break;
				//DEF
				case 2:
					if ((array_count_values(array_column($dreamteam, 'team'))[$item['team']]<3))
					{
						//Cheap bench
						if ($bench==1)
						{
							if (($item['now_cost']==40) and ($item['ppm']>$dreamteam[1]['ppm']))
							{
								$dreamteam[1] = $item;
								$dreamteam[1]['cheap'] = 1;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$def_no++;
							}
							else if ($def_no < 4)
							{
								$dreamteam[$i] = $item;
								$dreamteam[$i]['cheap'] = 0;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$def_no++;
								$i++;
							}
						}
						else if ($def_no < 5)
						{
							$dreamteam[$i] = $item;
							$dreamteam[$i]['cheap'] = 0;
							$team_total_points += $item['total_points'];
							$cost += $item['now_cost'];
							$def_no++;
							$i++;
						}
					}
				break;
				//MID
				case 3:
					if ((array_count_values(array_column($dreamteam, 'team'))[$item['team']]<3))
					{
						//Cheap bench
						if ($bench==1)
						{
							if (($item['now_cost']==45) and ($item['ppm']>$dreamteam[2]['ppm']))
							{
								$dreamteam[2] = $item;
								$dreamteam[2]['cheap'] = 1;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$mid_no++;
							}
							else if ($mid_no < 4)
							{
								$dreamteam[$i] = $item;
								$dreamteam[$i]['cheap'] = 0;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$mid_no++;
								$i++;
							}
						}
						else if ($mid_no < 5)
						{
							$dreamteam[$i] = $item;
							$dreamteam[$i]['cheap'] = 0;
							$team_total_points += $item['total_points'];
							$cost += $item['now_cost'];
							$mid_no++;
							$i++;
						}
					}
				break;
				//FW
				case 4:
					if ((array_count_values(array_column($dreamteam, 'team'))[$item['team']]<3))
					{
						//Cheap bench
						if ($bench==1)
						{
							if (($item['now_cost']==45) and ($item['ppm']>$dreamteam[3]['ppm']))
							{
								$dreamteam[3] = $item;
								$dreamteam[3]['cheap'] = 1;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$fwd_no++;
							}
							else if ($fwd_no < 2)
							{
								$dreamteam[$i] = $item;
								$dreamteam[$i]['cheap'] = 0;
								$team_total_points += $item['total_points'];
								$cost += $item['now_cost'];
								$fwd_no++;
								$i++;
							}
						}
						else if ($fwd_no < 3)
						{
							$dreamteam[$i] = $item;
							$dreamteam[$i]['cheap'] = 0;
							$team_total_points += $item['total_points'];
							$cost += $item['now_cost'];
							$fwd_no++;
							$i++;
						}
					}
				break;				
			}
		/*}
		else { break;}*/
	}	

	do
	{		
		foreach ($players as $key=>$item)
		{
			//echo $item['web_name'].'--'.$item['ppm'].'<br>';

			$replaced = false;
			for ($dtp = 0; $dtp < 15; $dtp++)
			{
				if ((in_array($item['code'], array_column($dreamteam, 'code')) == false) and ($dreamteam[$dtp]['cheap'] == 0))
				{
					//PPM
					if ($method == 0)
					{
						if (($item['team'] == $dreamteam[$dtp]['team']) or (array_count_values(array_column($dreamteam, 'team'))[$item['team']]<3))
						{
							if (($cost>1000) and ($replaced == false) and ($item['element_type'] == $dreamteam[$dtp]['element_type']) and ($item['now_cost'] <= $dreamteam[$dtp]['now_cost']))
							{
								$cost = $cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'];
								$team_total_points = $team_total_points - $dreamteam[$dtp]['total_points'] + $item['total_points'];
								$dreamteam[$dtp] = $item;
								$replaced = true;
								break;
							}
							if (($cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'])<=1000 and ($item['ppm'] > $dreamteam[$dtp]['ppm']) and ($replaced == false) and ($item['element_type'] == $dreamteam[$dtp]['element_type'])) 
							{echo '2';
								$cost = $cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'];
								$team_total_points = $team_total_points - $dreamteam[$dtp]['total_points'] + $item['total_points'];
								$dreamteam[$dtp] = $item;
								$replaced = true;
								break;
							}
						}
					}
					//Max
					if ($method == 1)
					{
						if (($item['team'] == $dreamteam[$dtp]['team']) or (array_count_values(array_column($dreamteam, 'team'))[$item['team']]<3))
						{
							//gw=0
							if ($gw==0)
							{								
								if (($cost>1000) and ($replaced == false) and ($item['now_cost'] <= $dreamteam[$dtp]['now_cost']) and ($item['element_type'] == $dreamteam[$dtp]['element_type']))
								{
									$cost = $cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'];
									$team_total_points = $team_total_points - $dreamteam[$dtp]['total_points'] + $item['total_points'];
									$dreamteam[$dtp] = $item;
									$replaced = true;
									break;
								}
								if ((($cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'])<=1000) and ($item['total_points'] >= $dreamteam[$dtp]['total_points']) and ($replaced == false) and ($item['element_type'] == $dreamteam[$dtp]['element_type'])) 
								{
									$cost = $cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'];
									$team_total_points = $team_total_points - $dreamteam[$dtp]['total_points'] + $item['total_points'];
									$dreamteam[$dtp] = $item;
									$replaced = true;
									break;
								}
							}							
							//gw>0
							else
							{
								if (($cost>1000) and ($replaced == false) and ($item['now_cost'] <= $dreamteam[$dtp]['now_cost']) and ($item['element_type'] == $dreamteam[$dtp]['element_type']))
								{
									$cost = $cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'];
									$team_total_points = $team_total_points - $dreamteam[$dtp]['total_points'] + $item['total_points'];
									$dreamteam[$dtp] = $item;
									$replaced = true;
									break;
								}
								if ((($cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'])<=1000) and ($item['ppm'] >= $dreamteam[$dtp]['ppm']) and ($replaced == false) and ($item['element_type'] == $dreamteam[$dtp]['element_type'])) 
								{
									$cost = $cost - $dreamteam[$dtp]['now_cost'] + $item['now_cost'];
									$team_total_points = $team_total_points - $dreamteam[$dtp]['total_points'] + $item['total_points'];
									$dreamteam[$dtp] = $item;
									$replaced = true;
									break;
								}								
							}							
						}
					}
				array_multisort(array_column($dreamteam, 'ppm'), SORT_ASC,SORT_NUMERIC, $dreamteam);				
				}
			}			
		}
	}
	while ($replaced==true);

	array_multisort(array_column($dreamteam, 'element_type'), SORT_ASC,SORT_NUMERIC, $dreamteam);
	
}	
	?>
<div class="row text-center" style="text-align: center; margin: auto">
<div class="col-12">
<form method="post" id="lf" name="lf">
<span><b>FILTERS: </b></span>
<span>Method: </span>
<select name="filter[MET]" style="height: 30px">
	<option value = 0>PPM (Value/Cost)</option>
	<option value = 1>Highest points</option>
</select>&nbsp;
<span>Gameweeks: </span>
<select name="filter[GW]" style="height:30px">
    <option value = 0>Without GW</option>
    <option value = 1>Gameweeks:  1</option>
    <option value = 2>Gameweeks:  2</option>
    <option value = 3>Gameweeks:  3</option>
    <option value = 4>Gameweeks:  4</option>
    <option value = 5>Gameweeks:  5</option>
    <option value = 6>Gameweeks:  6</option>
    <option value = 7>Gameweeks:  7</option>
    <option value = 8>Gameweeks:  8</option>
    <option value = 9>Gameweeks:  9</option>
    <option value = 10>Gameweeks:  10</option>
    <option value = 11>Gameweeks:  11</option>
    <option value = 12>Gameweeks:  12</option>
    <option value = 13>Gameweeks:  13</option>
    <option value = 14>Gameweeks:  14</option>
    <option value = 15>Gameweeks:  15</option>
    <option value = 16>Gameweeks:  16</option>
    <option value = 17>Gameweeks:  17</option>
    <option value = 18>Gameweeks:  18</option>
    <option value = 19>Gameweeks:  19</option>
    <option value = 20>Gameweeks:  20</option>
    <option value = 21>Gameweeks:  21</option>
    <option value = 22>Gameweeks:  22</option>
    <option value = 23>Gameweeks:  23</option>
    <option value = 24>Gameweeks:  24</option>
    <option value = 25>Gameweeks:  25</option>
    <option value = 26>Gameweeks:  26</option>
    <option value = 27>Gameweeks:  27</option>
    <option value = 28>Gameweeks:  28</option>
    <option value = 29>Gameweeks:  29</option>
    <option value = 30>Gameweeks:  30</option>
    <option value = 31>Gameweeks:  31</option>
    <option value = 32>Gameweeks:  32</option>
    <option value = 33>Gameweeks:  33</option>
    <option value = 34>Gameweeks:  34</option>
    <option value = 35>Gameweeks:  35</option>
    <option value = 36>Gameweeks:  36</option>
    <option value = 37>Gameweeks:  37</option>
    <option value = 38>Gameweeks:  38</option>
</select>&nbsp;
<input type="checkbox" name="filter[BENCH]" value="1">
<label for="checkbox_id">Cheap bench <small>4-4-2</small></label>&nbsp;
<button style="height:30px" type="submit" onClick=" document.forms['lf'].submit(); this.disabled='disabled';">Predict</button>
</form>	
</div>
</div>
<br/>
	<div class="row text-center" style="text-align: center; margin: auto;">
		<div class="col-12 text-center">
		<span style="color: #37003c;font-size:20px;"><?PHP echo 'Method: <b>'.$method_name.'</b> | Gameweeks: <b>'.$gw.'</b> | Cost: <b>'.($cost/10).'</b> | Points: <b>'.$team_total_points; ?></b></span>
		</div><br/><br/>
	</div>
	<div class="row text-center" style="text-align: center; margin: auto;">
		<div class="col-12 text-center" style="text-align: center; margin: auto;max-width:100%; background: url('https://fantasy.premierleague.com/static/media/pitch.6892d4e8.svg') no-repeat center top; background-size: cover">
				<?PHP if (!isset($_POST['filter'])) echo '<!--'; ?>
				<div id="players" class="text-center">
					<div class="player_items_row">
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[0]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[0]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[0]['now_cost']/10); ?> Points <?PHP echo $dreamteam[0]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[1]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[1]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[1]['now_cost']/10); ?> Points <?PHP echo $dreamteam[1]['total_points']; ?></div>
						</div>
					</div>
					<div class="player_items_row">
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[2]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[2]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[2]['now_cost']/10); ?> Points <?PHP echo $dreamteam[2]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[3]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[3]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[3]['now_cost']/10); ?> Points <?PHP echo $dreamteam[3]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[4]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[4]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[4]['now_cost']/10); ?> Points <?PHP echo $dreamteam[4]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[5]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[5]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[5]['now_cost']/10); ?> Points <?PHP echo $dreamteam[5]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[6]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[6]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[6]['now_cost']/10); ?> Points <?PHP echo $dreamteam[6]['total_points']; ?></div>
						</div>
					</div>
					<div class="player_items_row">
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[7]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[7]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[7]['now_cost']/10); ?> Points <?PHP echo $dreamteam[7]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[8]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[8]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[8]['now_cost']/10); ?> Points <?PHP echo $dreamteam[8]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[9]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[9]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[9]['now_cost']/10); ?> Points <?PHP echo $dreamteam[9]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[10]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[10]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[10]['now_cost']/10); ?> Points <?PHP echo $dreamteam[10]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[11]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[11]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[11]['now_cost']/10); ?> Points <?PHP echo $dreamteam[11]['total_points']; ?></div>
						</div>
					</div>
					<div class="player_items_row">
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[12]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[12]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[12]['now_cost']/10); ?> Points <?PHP echo $dreamteam[12]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[13]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[13]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[13]['now_cost']/10); ?> Points <?PHP echo $dreamteam[13]['total_points']; ?></div>
						</div>
						<div class="player_item align-top">
							<img style="max-width: 80px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$dreamteam[14]['photo']); ?>"/>
							<div class="player_item_name"><?PHP echo $dreamteam[14]['web_name']; ?></div>
							<div class="player_item_value">Cost: <?PHP echo ($dreamteam[14]['now_cost']/10); ?> Points <?PHP echo $dreamteam[14]['total_points']; ?></div>
						</div>
					</div>
				</div>
				<?PHP if (!isset($_POST['filter'])) echo '-->'; ?>
		</div>
	</div>
</main>

</body>
</html>
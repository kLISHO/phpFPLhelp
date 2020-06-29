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
		h1,h2,h3,h4 {
		color: #fff;
		}
		.dataTables_info {
			font-size: 10px;
		}
		#players_paginate, #players_length, #players_filter {
			font-size: 10px;
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
      <li class="nav-item active">
        <a class="nav-link" href="./">Players</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./prediction.php">Prediction</a>
      </li>
    </ul>
  </div>
</nav>
<main role="main" class="container-fluid">

<div class="row" style="text-align: center;background-color: #37003c;">
<div class="col-12" style="padding:15px 0 15px 0;background: url('https://fantasy.premierleague.com/static/media/header-players.c7adc20a.png') no-repeat 80% center;background-size: contain">
<h3>Kupres Premier League Fantasy Help</h3>
<h4>Player List</h4>
</div>
</div>
<br/>
<div class="row">
<div class="col-12">
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

	$json_url = "https://fantasy.premierleague.com/api/bootstrap-static/";
	$json = curl_get_file_contents($json_url);
	$jsonData = stripslashes(html_entity_decode($json));
	$data = json_decode($jsonData, TRUE);
	?>
<table id="players" class="table table-striped table-bordered" style="font-family:'Arial',sans;font-size:12px;">
	<thead style="color: #37003c; background-color: #eee">
		<tr>
			<th>Full Name</th>
			<th>News</th>			
			<th>Team</th>
			<th>Position</th>
			<th>Current Price</th>
			<th>Value Season</th>
			<th>Cost Change from Start</th>
			<th>Selected by (%)</th>
			<th>Transfers In</th>
			<th>Transfers Out</th>
			<th>Total Points</th>
			<th>Bonus Points</th>
			<th>Bonus Point System Score</th>			
			<th>Points Per Game</th>
			<th>Minutes</th>
			<th>Goals Scored</th>
			<th>Assists</th>
			<th>Clean Sheets</th>
			<th>Goals Conceded</th>
			<th>Own Goals</th>
			<th>Penalties Saved</th>
			<th>Penalties Missed</th>
			<th>Yellow Cards</th>
			<th>Red Cards</th>
			<th>Saves</th>
			<th>Influence</th>
			<th>Creativity</th>
			<th>Threat</th> 
			<th>ICT Index</th>
			<th>EA Index</th>	
		</tr>
	</thead>
	<tbody>
		<?php
			//$positions = json_decode($data['element_types'], true);			
			
			foreach($data['elements'] as $key=>$item)
			{
				$teams = $data['teams'];	
				$keyteam = array_search($item['team'], array_column($teams, 'id'));
				$itemteam = $teams[$keyteam];
				
				$positions = $data['element_types'];	
				$keypos = array_search($item['element_type'], array_column($teams, 'id'));
				$itempos = $positions[$keypos];
			
		?>
		<tr>
			<td><a target="_blank" href="/fpl/playerinfo.php?ID=<?PHP echo $item['id']; ?>"><?PHP echo $item['first_name']; ?> <?PHP echo $item['second_name']; ?></a></td>
			<td><small><?PHP echo $item['news']; ?></small></td>
			<td><?PHP echo $itemteam['name']; ?></td>
			<td><?PHP echo $itempos['singular_name_short']; ?></td>
			<td><?PHP echo (number_format($item['now_cost']/10,1)); ?></td>
			<td><?PHP echo $item['value_season']; ?></td>
			<td><?PHP echo $item['cost_change_start']; ?></td>
			<td><?PHP echo $item['selected_by_percent']; ?></td>
			<td><?PHP echo $item['transfers_in']; ?></td>
			<td><?PHP echo $item['transfers_out']; ?></td>
			<td><?PHP echo $item['total_points']; ?></td>
			<td><?PHP echo $item['bonus']; ?></td>
			<td><?PHP echo $item['bps']; ?></td>		
			<td><?PHP echo $item['points_per_game']; ?></td>
			<td><?PHP echo $item['minutes']; ?></td>
			<td><?PHP echo $item['goals_scored']; ?></td>
			<td><?PHP echo $item['assists']; ?></td>
			<td><?PHP echo $item['clean_sheets']; ?></td>
			<td><?PHP echo $item['goals_conceded']; ?></td>
			<td><?PHP echo $item['own_goals']; ?></td>
			<td><?PHP echo $item['penalties_saved']; ?></td>
			<td><?PHP echo $item['penalties_missed']; ?></td>
			<td><?PHP echo $item['yellow_cards']; ?></td>
			<td><?PHP echo $item['red_cards']; ?></td>
			<td><?PHP echo $item['saves']; ?></td>
			<td><?PHP echo $item['influence']; ?></td>
			<td><?PHP echo $item['creativity']; ?></td>
			<td><?PHP echo $item['threat']; ?></td>
			<td><?PHP echo $item['ict_index']; ?></td>
			<td><?PHP echo $item['ea_index']; ?></td>		
		</tr>
		<?PHP
		}
		?>
	</tbody>
</table>
</div>
</div>

</main>
<script>
$(document).ready(function() {
    $('#players').DataTable( {
        "scrollX": true
    } );
} );
</script>
</body>
</html>
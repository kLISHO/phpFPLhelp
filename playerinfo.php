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
<h4>Player Data</h4>
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

	$json_url = "https://fantasy.premierleague.com/api/bootstrap-static/";
	$json = curl_get_file_contents($json_url);
	$jsonData = stripslashes(html_entity_decode($json));
	$data = json_decode($jsonData,true);
	$data = $data['elements'];
	if (isset($_GET['ID']))
	{
		$key = array_search($_GET['ID'], array_column($data, 'id'));
		$item = $data[$key];
	}	
	?>
<div class="row" style="background: url('https://fantasy.premierleague.com/static/media/pitch.6892d4e8.svg') no-repeat center center; background-size: cover">
<div class="col-12 text-center">	
<table id="players" class="table text-center" style="margin: auto;font-family:'Arial'; max-width: 600px; color: #37003c; text-shadow: 1px 1px #ccc; font-weight: bold;">
	<tbody>
		<tr>
			<td colspan="2"><img style="width: 100px" src="https://fantasyoverlord.com/FPL/PlayerImage?id=<?PHP echo str_replace('.jpg','',$item['photo']); ?>"/></td>
		</tr>
		<tr style="background-color: #37003c;">
			<td colspan="2"><h2><?PHP echo $item['first_name']; ?> <?PHP echo $item['second_name']; ?></h2></td>
		</tr>
		<?PHP
			foreach($item as $key=>$value)
			{
				echo '<tr><td>'.strtoupper(str_replace("_", " ",$key)).'</td><td>'.$value.'</td></tr>';
			}
		?>
		
	</tbody>
</table>
</div>
</div>

</main>

</body>
</html>
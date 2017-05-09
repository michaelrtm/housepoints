<!DOCTYPE html>
<html>
<head>
	<title>MEPS Intranet</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
</head>
<body>

<div id="app">
{{-- 	<div class="nav">
		<h1>MEPS INTRANET</h1>
		<ul class="main-buttons">
			<div v-for="link in links">
				<link-button :link="link"></link-button>
			</div>
		</ul>
	</div> --}}
	<div class="content">
		<div class="container">
				<div class="row">
					<div class="col-md-6">
						<transition enter-active-class="animated bounceIn"
    								leave-active-class="animated bounceOut"
	    							>
							<button class="btn cancel" @click="clearAll" v-show="houseOrStudentActive">
								<i class="fa fa-times"></i>
							</button>
						</transition>
						<h1>HOUSE POINTS</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<transition enter-active-class="animated bounceIn"
    					leave-active-class="animated bounceOut"
	    					mode="out-in"
							>
							<div class="main" key="main" v-if="!findStudent">
								<div class="square-buttons">
									<button class="btn-square grey wide" @click="findStudent = true"><i class="fa fa-user"></i> Find Student</button>
								</div>

								<manage-scores :houses="houses"
									v-bind:active-house="activeHouse"
									@scored="scoreAdded"
									@house-set="activeHouseSet"
								>
								</manage-scores>

							</div>

							<div class="find-student" key="find-student" v-else>
								<find-student @active-house-set="activeHouseSet"
											  :students="students"></find-student>
							</div>
						</transition>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th></th>
									<th style="width:20%" v-for="score in lastWeekScores">@{{ score.name }}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>This Week</td>
									<td style="width:20%" v-for="score in scores">@{{ score.score }}</td>
								</tr>
								<tr>
									<td>Last Week</td>
									<td style="width:20%" v-for="score in lastWeekScores">@{{ score.score }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<house-points v-bind:scores="scores" :height="288"></house-points>
							<div class="square-buttons">
								<button class="btn-square grey half" @click="viewWeeklyScores()" v-bind:class="{ active: week }"><i class="fa fa-trophy"></i> Week</button>
								<button class="btn-square grey half" @click="viewYearlyScores()" v-bind:class="{ active: year }"><i class="fa fa-trophy"></i> Year</button>
							</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="/js/app.js"></script>
</body>
</html>

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
								<manage-scores v-bind:active-house="activeHouse"
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
					</div>
					<div class="col-md-6">
						<house-points v-bind:scores="scores.data"></house-points>
							<div class="square-buttons">
								<button class="btn-square grey half" @click="viewWeeklyScores()"><i class="fa fa-trophy"></i> Week</button>
								<button class="btn-square grey half" @click="viewYearlyScores()"><i class="fa fa-trophy"></i> Year</button>
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
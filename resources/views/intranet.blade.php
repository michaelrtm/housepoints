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
						<router-link to="/settings" :test="houseOrStudentActive">
							<button class="btn cancel">
								<i class="fa fa-cogs"></i>
							</button>
						</router-link>
						<h1>HOUSE POINTS</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<transition enter-active-class="animated bounceIn"
							leave-active-class="animated bounceOut"
								mode="out-in"
							>
						<router-view></router-view>
						  </transition>
					</div>
					<div class="col-md-6">
						<router-view name="secondary"></router-view>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="/js/app.js"></script>
</body>
</html>

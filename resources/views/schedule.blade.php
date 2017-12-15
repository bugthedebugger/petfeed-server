<!DOCTYPE html>
<html>
<head>
	<title>Add new schedule</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="card card-default">
			<div class="card-header">
				Add new schedule
			</div>
			<div class="card-body">
				<form action="{{ route('user.test.set.schedule') }}" method="GET">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Id</label>
						<input type="number" name="id" class="form-control">
					</div>
					@for( $i=0; $i<2; $i++ )
					<div class="form-group">
						<hr>
						<label>Day</label>
						<select class="form-control" name="day[]">
							<option value="">
								Select Day
							</option>
							<option value="Sunday">
								Sun
							</option>
							<option value="Monday">
								Mon
							</option>
							<option value="Tuesday">
								Tue
							</option>
							<option value="Wednesday">
								Wed
							</option>
							<option value="Thursday">
								Thu
							</option>
							<option value="Friday">
								Fri
							</option>
							<option value="Saturday">
								Sat
							</option>
						</select>
						<div class="form-group">
							<label>Select Time</label>
							<input type="time" name="time[]" class="form-control">
						</div>
					</div>
					@endfor
					<div class="form-group">
						<center>
							<button class="btn btn-outline-success" type="submit">Submit</button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
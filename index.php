<?php
$todos = [];
if(file_exists('todo.json')) {
	$json = file_get_contents('todo.json');
	$todos = json_decode($json, true
	);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Todo APP</title>
		<!-- Bootstrap css goes here -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	</head>
	<section class="container py-2 mb-4">
		<div class="row">
			<div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
				<form class="" action="newtodo.php" method="post">
					<div class="card bg-secondary text-light mb-3">
						<div class="card-header">
							<h1 class="text-center"> Todo APP</h1>
						</div>
						<div class="card-body bg-dark">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="todo_name" placeholder="Enter your Todo" aria-label="Recipient's username" aria-describedby="basic-addon2">
							</div>
							
							<div class="col-lg-6 mb-2">
								<button type="" name="" class="btn btn-success btn-block"><i class="fas fa-check"></i>New Todo</button>
							</div>
						</div>
					</div>
				</form>
				<?php foreach ($todos as $todoName => $todo): ?>
				<div style="margin-bottom: 20px;">
        <form class="d-inline" action="change_status.php" method="post">
          <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
          <input type="checkbox" name="status" value="1" <?php echo($todo['completed'] ? 'checked' : '') ?>>
        </form>
          <?php echo $todoName ?>
        <form class="d-inline" action="delete.php" method="post">
          <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
          <button class="btn btn-primary">Delete</button>
        </form>
      </div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<script>
	const checkboxes = document.querySelectorAll('input[type=checkbox]');
	checkboxes.forEach(ch => {
	ch.onclick = function () {
	this.parentNode.submit()
	};
	})
	</script>
</body>
</html>
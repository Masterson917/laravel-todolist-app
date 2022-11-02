<html>
	<head>
		<title>todolist</title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js" integrity="sha512-XFd1m0eHgU1F05yOmuzEklFHtiacLVbtdBufAyZwFR0zfcq7vc6iJuxerGPyVFOXlPGgM8Uhem9gwzMI8SJ5uw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">
	</head>

	<body class="bg-info">
		<div class="container w-25 mt-5">
			<div class="card shadow-sm">
				<div class="card-body">
					<h3>To-do List</h3>
					<form action="{{ route('store') }}" method="POST" autocomplete="off">
						@csrf

						<div class="input-group">
							<input type="text" name="content" class="form-control" placeholder="add a task">
							<button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
						</div>
					</form>

					@if(count($todolists))
					<ul class="list-group list-group-flush mt-3">
						@foreach($todolists as $todolist)
							<li class="list-group-item">
								<form action="{{ route('destroy', $todolist->id)}}" method="POST">
									{{ $todolist->content }}
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>

								</form>
							</li>
						@endforeach		
					</ul>
					@else
					<p class="text-center mt-3">No current tasks!</p> 
					@endif
				</div>
				@if (count($todolists))
					<div class="card-footer">
						you have {{ count($todolists)}} pending tasks! 
					</div>
				@else
				
				@endif	
			</div>
		</div>	

	</body>
</html>
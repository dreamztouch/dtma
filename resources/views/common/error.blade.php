@if(count($errors) > 0)

	<div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Oops Somthing wrong
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul>
				@foreach ($errors->all() as $error)

					<li class="text-danger">{{$error}}</li>

				@endforeach
			</ul>
        </div>
        <!-- /.panel-body -->
    </div>

@endif
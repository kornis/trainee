<div class="col-md-3">
		<div class="card">
			<div class="card-header">
				<p>TOPICS</p>
			</div>
			<div class="card-body">
				<ul class="list-group">
					@foreach ($topics as $topic)
						<li class="list-group-item"> 
							<a href="{{action('topic_controller@show',$topic->id_topic)}}"><span>{{$topic->name_topic}}</span>
							<span class="badge badge-primary" style="float: right;">{{$topic->article->count()}}</span></a>
						</li>
					@endforeach
					
				</ul>
				
			</div>
		</div>
	</div>	
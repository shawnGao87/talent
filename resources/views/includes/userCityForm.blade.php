{{-- {{dd($user_cities_arr)}} --}}
<input type="hidden" name="user_id" value={{$userId}}>
<div class="row">
	<div class="nav flex-column nav-pills px-3" style="width:20%" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		<h4>States</h4>
		@foreach ($userCity->state_cities as  $state => $cities)
			<a class="nav-link {{$state == 'California'? 'active': ''}}" id="{{str_replace(' ', '_', $state)}}-tab" data-toggle="pill" href="#{{str_replace(' ', '_', $state)}}" role="tab" aria-controls="{{str_replace(' ', '_', $state)}}" aria-selected="{{$state == 'California'? 'true': 'false'}}">{{$state}}</a>
		@endforeach
	</div>

	<div class="tab-content" style="width:80%" id="v-pills-tabContent">
		<h4>Cities</h4>
		@foreach ($userCity->state_cities as  $state => $cities)
			
			@php
				$city_count = sizeof($cities);
				$column_size = ceil($city_count / 3);
			@endphp
			
			<div class="tab-pane fade {{$state == 'California'? 'show active': ''}} " id="{{str_replace(' ', '_', $state)}}" role="tabpanel" aria-labelledby="{{str_replace(' ', '_', $state)}}-tab">
				<div class="row">
					@if ($city_count < 3)
						<div class="col-xs-12 col-sm-4">
							@for ($i = 0; $i < $city_count; $i++)
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="{{$cities[$i]}}" name="states[{{ $state}}][]" {{in_array($state.'-'.$cities[$i], $user_cities_arr) ? "checked": ""}}>
								<label class="form-check-label">
										{{$cities[$i]}}
								</label>
							</div>
							@endfor
						</div>
					@else			
					<div class="col-xs-12 col-sm-4">
						@for ($i = 0; $i < $column_size; $i++)
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{$cities[$i]}}" name="states[{{$state}}][]" {{in_array($state.'-'.$cities[$i], $user_cities_arr) ? "checked": ""}}>
							<label class="form-check-label">
									{{$cities[$i]}}
							</label>
						</div>
						@endfor
					</div>
					
					<div class="col-xs-12 col-sm-4">
						@for ($i = $column_size; $i < $column_size * 2 ; $i++)
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{$cities[$i]}}" name="states[{{ $state}}][]" {{in_array($state.'-'.$cities[$i], $user_cities_arr) ? "checked": ""}}>
							<label class="form-check-label">
									{{$cities[$i]}}
							</label>
						</div>
						@endfor
					</div>

					<div class="col-xs-12 col-sm-4">
						@for ($i = $column_size * 2; $i < $city_count ; $i++)
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="{{$cities[$i]}}" name="states[{{$state}}][]" {{in_array($state.'-'.$cities[$i], $user_cities_arr) ? "checked": ""}}>
							<label class="form-check-label">
									{{$cities[$i]}}
							</label>
						</div>
						@endfor
					</div>
					@endif
				</div>
			</div>
		@endforeach
	</div>
</div>


@csrf
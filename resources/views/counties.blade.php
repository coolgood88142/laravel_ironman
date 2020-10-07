<html>
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<body>
		<div id="app">
			@{{ message }}
			<counties-city
				@change-city="updateCity" 
				:city-selected="citySelected"
				:city-data="{{ json_encode($city) }}"
			>
			</counties-city>
			<counties-districts 
				@change-districts="updateDistricts" 
				:city-selected="citySelected" 
				:districts-selected="districtsSelected" 
				:districts-data="{{ json_encode($districts) }}" 
			/>
			</counties-districts>
			<input 
				type="button" 
				id="show" 
				:class="btnStyle" 
				:value="showText" 
				@click="showPostalCode" 
			/>
		</div>
		<script src="{{mix('js/app.js')}}"></script>
		<script src="{{mix('js/counties.js')}}"></script>
	</body>
</html>
<html>
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<body>
		<div id="app">
			@{{ message }}
			<country-city
				@change-city="updateCity" 
				:city-selected="city.selected"
				:city-data="{{ json_encode($city) }}"
			>
			</country-city>
			<country-districts 
				@change-districts="updateDistricts" 
				:city-selected="city.selected" 
				:districts-selected="districts.selected" 
				:districts-data="{{ json_encode($districts) }}" 
			/>
			</country-districts>
			<input 
				type="button" 
				id="show" 
				:class="btnStyle" 
				:value="showText" 
				@click="showPostalCode" 
			/>
		</div>
		<script src="{{mix('js/app.js')}}"></script>
		<script src="{{mix('js/country.js')}}"></script>
		<link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}">
	</body>
</html>
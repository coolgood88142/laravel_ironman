<html>
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<body>
		<div id="app">
			@{{ message }}
			<city-county 
				@change-county="updateCounty" 
				:county-selected="countySelected"
				:county-data="{{ json_encode($county) }}"
			>
			</city-county>
			<city-districts 
				@change-districts="updateDistricts" 
				:county-selected="countySelected" 
				:districts-selected="districtsSelected" 
				:districts-data="{{ json_encode($districts) }}" 
			/>
			</city-districts>
			<input 
				type="button" 
				id="show" 
				:class="btnStyle" 
				:value="showText" 
				@click="showPostalCode" 
			/>
		</div>
		<script src="{{mix('js/app.js')}}"></script>
		<script src="{{mix('js/city.js')}}"></script>
	</body>
</html>
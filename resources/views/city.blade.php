<html>
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<body>
		<div id="app">
			@{{ message }}
			<city-counties 
				@change-counties="updateDistricts" 
				:counties-selected="countiesSelected"
				:counties-data="{{ json_encode($counties) }}"
			>
			</city-counties>
			<city-districts 
				@change-districts="getDistrictsData" 
				:counties-selected-text="countiesSelectedText" 
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
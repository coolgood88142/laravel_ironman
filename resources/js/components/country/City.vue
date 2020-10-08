<template>
	<select v-model="cityValue" id="us_city" name="us_city" @change="changeCity()">
		<option value=null disabled selected>--請選擇--</option>
		<option v-for="(city, index) in cityArray" :key="index"
			:value="city.value">{{ city.text }}</option>
	</select>
</template>

<script>
export default {
	props: {
		cityData: {
			type:Array
		},
		citySelected: {
			type:Number
		}
	},
	data() {
		return {
			cityArray: this.cityData,
			cityValue: this.citySelected,
		}
	},
	methods:{
		changeCity() {
			if (this.cityValue != null) {
				this.$emit('change-city', this.cityArray[this.cityValue]['text'], this.cityValue)
			}
		}
	}
}
</script>
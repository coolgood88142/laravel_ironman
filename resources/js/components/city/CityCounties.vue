=<template>
	<select v-model="countiesValue" id="us_counties" name="us_counties" @change="changeCounties()">
		<option value="NaN" disabled selected>--請選擇--</option>
		<option v-for="(counties, index) in countiesArray" :key="index"
			:value="counties.value">{{ counties.text }}</option>
	</select>
</template>

<script>
export default {
	props: {
		countiesData: {
			type:Array
		},
		countiesSelected: {
			type:Number
		}
	},
	data() {
		return {
			countiesArray: this.countiesData,
			countiesValue: this.countiesSelected,
		}
	},
	methods:{
		changeCounties() {
			if (this.countiesValue != NaN) {
				this.$emit('change-counties', this.countiesArray[this.countiesValue]['text'], this.countiesValue)
			}
		}
	}
}
</script>
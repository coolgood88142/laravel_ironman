<template>
	<select v-model="countyValue" id="us_county" name="us_county" @change="changeCounty()">
		<option value=null disabled selected>--請選擇--</option>
		<option v-for="(county, index) in countyArray" :key="index"
			:value="county.value">{{ county.text }}</option>
	</select>
</template>

<script>
export default {
	props: {
		countyData: {
			type:Array
		},
		countySelected: {
			type:Number
		}
	},
	data() {
		return {
			countyArray: this.countyData,
			countyValue: this.countySelected,
		}
	},
	methods:{
		changeCounty() {
			if (this.countyValue != null) {
				this.$emit('change-county', this.countyArray[this.countyValue]['text'], this.countyValue)
			}
		}
	}
}
</script>
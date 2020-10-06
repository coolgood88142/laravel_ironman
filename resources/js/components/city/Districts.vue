<template>
	<select v-model="districtsValue" id="us_districts" name="us_districts" >
		<option value=null disabled selected>--請選擇--</option>
		<option v-for="(districts, index) in districtsArray" :key="index" :value="districts.value">{{ districts.text }}</option>
	</select>
</template>

<script>
export default {
	props: {
		countySelected: {
			type:Number
		},
		districtsData: {
			type:Array
		},
		districtsSelected: {
			type:Number
		}
	},
	computed: {
		districtsArray() {
			if (this.countySelected != null ) {
				this.districtsValue = this.districtsSelected
				return this.districtsData[this.countySelected];
			}
		}
	},
	data() {
		return {
			districts: [],
			districtsValue: this.districtsSelected,
		}
	},
	watch:{
		districtsValue(newVal) {
			let districtsText = ''
			_.findKey (this.districtsArray, (e, key) => {
				 if (e.value === newVal) {
					 districtsText = e.text
				 }
			})

			if (districtsText != '') {
				this.$emit('change-districts', districtsText, newVal)
			}
		}
	}
}
</script>
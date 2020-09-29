<template>
	<select v-model="districtsValue" id="us_districts" name="us_districts" >
		<option value="NaN" disabled selected>--請選擇--</option>
		<option v-for="(districts, index) in districtsArray" :key="index" :value="districts.value">{{ districts.text }}</option>
	</select>
</template>

<script>
export default {
	props: {
		countiesSelectedText: {
			type:String
		},
		districtsData: {
			type:Object
		},
		districtsSelected: {
			type:Number
		}
	},
	computed: {
		districtsArray() {
			if (this.countiesSelectedText != '' ) {
				this.districtsValue = this.districtsSelected
				return this.districtsData[this.countiesSelectedText];
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
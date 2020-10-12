<template>
	<div id="channel_list">
		<div class="form-group">
			<label>搜尋使用者名稱</label>
			<vSelect v-model="seleted" label="name" :options="searchData" @input="selectedData">
				<span slot="no-options">
					查無資料!
				</span>
			</vSelect>
		</div>
		<div class="form-group" id="select">
			<table class="table table-striped table-bordered" style="width:100%">
				<tr>
					<th>ID</th>
					<th>使用者名稱</th>
					<th>Email</th>
					<th>電話</th>
				</tr>
				<tr v-for="(data, index) in showData" :key="index">
					<th>{{ data.id }}</th>
					<th>{{ data.username }}</th>
					<th>{{ data.email }}</th>
					<th>{{ data.phone }}</th>
				</tr>
			</table>
		</div>
		</div>
</template>

<script>
import 'vue-select/dist/vue-select.css'
import vSelect from 'vue-select'

export default {
	components: {
		'vSelect': vSelect
	},
	data() {
		return {
			btnSelect: 'btn btn-primary',
			url: `https://jsonplaceholder.typicode.com/users`,
			seleted: '',
			showData: []
		}
	},
	computed:{
		searchData() {
			let searchArray = []
			_.findKey(this.showData, function(e, key) {
				searchArray.push(e.username)
			})
			return searchArray
		}
	},
	mounted() {
		this.getDefaultSearchData()
	},
	methods: {
		getDefaultSearchData(){
			this.getApiData(this.url)
		},
		getApiData(url){
			axios.get(url)
			.then(
				response => (
					this.showData = response.data
				)
			)
			.catch(error => {
				console.log(error)
				this.errored = true
			})
		},
		selectedData(){
			if (this.seleted == '' || this.seleted == null) {
				this.getDefaultSearchData()
			}else{
				this.getApiData(this.url+`?username=${this.seleted}`)
			}
		},
	},
}
</script>
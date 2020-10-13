<template>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>英文名稱</th>
				<th>中文名稱</th>
				<th>建立日期</th>
				<th>編輯設定</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(keyword, index) in keywordData" :key="index">
				<td>{{ keyword.en }}</td>
				<td>{{ keyword.tc }}</td>
				<td>{{ keyword.created_at.substring(0,10) }}</td>
				<td>
					<input type="button" class="btn btn-primary" value="編輯" @click="$emit('update-keyword', keyword._id, keyword.en, keyword.tc, index)" />
					<input type="button" class="btn btn-primary" value="刪除" @click="deleteKeyword(keyword._id, index)" />
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: {
		keywordData: {
			type:Array
		},
		urlDelete: {
			type:String
		}
	},
	data() {
		return {
			
		}
	},
	methods: {
		deleteKeyword(id, index) {
			let url = this.urlDelete
			let params = {
                id: id
			}
			
			axios.post(url, params).then((response) => {
				let isSuccess = response.data.status == 'success' ? true : false
				if (isSuccess) {
					this.$emit('delete-keyword-data', index)
				}
                this.isShowMessage(isSuccess, response.data.message)
            }).catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                } else {
                	console.log('Error', error.message);
                }
                this.$emit('is-show-message', false, '發生意外錯誤!')
            })
		}
	}
}
</script>
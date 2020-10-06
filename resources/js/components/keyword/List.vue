<template>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th></th>
				<th>英文名稱</th>
				<th>中文名稱</th>
				<th>建立日期</th>
				<th>編輯設定</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(keyword, index) in keyWordData" :key="index">
				<td><input type="checkbox" name="id[]" :value="keyword._id" v-model="keywordID"></td>
				<td>{{ keyword.english_name }}</td>
				<td>{{ keyword.chinese_name }}</td>
				<td>{{ keyword.created_at.substring(0,10) }}</td>
				<td><input type="button" class="btn btn-primary" value="編輯" @click="$emit('update-keyword', keyword._id, keyword.english_name, keyword.chinese_name, index)" /></td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: {
		keyWordData: {
			type:Array
		}
	},
	data() {
		return {
			keywordID: []
		}
	},
	watch:{
		keywordID(newVal){
			this.$emit('send-keyword-id', newVal)
		}
	}
}
</script>
<template>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th></th>
				<th>序號</th>
				<th>英文名稱</th>
				<th>中文名稱</th>
				<th>編輯設定</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(keywords, index) in keyWordsData" :key="index">
				<td><input type="checkbox" name="id[]" :value="keywords.id" v-model="checkedKeywords"></td>
				<td>{{ index }}</td>
				<td>{{ keywords.english_name }}</td>
				<td>{{ keywords.chinese_name }}</td>
				<td><input type="button" class="btn btn-primary" value="編輯" v-on:click="editUserData(user.id)" /></td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: {
		keyWordsData: {
			type:Array
		}
	},
	data() {
		return {
			districts: [],
		}
	},
}
</script>
<template>
	<transition name="modal">
		<div class="modal-mask">
			<div class="modal-wrapper">
				<div class="modal-container">
                    <form :action="action" method="POST" class="sidebar-form">
                        <div class="modal-header">
                            <slot name="header">
                                <h3>{{ title }}</h3>
                            </slot>
                        </div>
                        <div class="modal-body">
                            <slot name="body">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">英文名稱</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" :value="enName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">中文名稱</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" :value="chName">
                                    </div>
                                </div>
                            </slot>
                        </div>
                        <div class="modal-footer">
                            <slot name="footer">
                                <div class="form-check form-check-inline">
                                    <input type="button" class="btn btn-primary" id="cancel" name="cancel"
                                            value="取消" @click="$emit('close')">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="submit" class="btn btn-primary" id="save" name="save"
                                            value="儲存" @click="checkKeyWordsData()">
                                    </div>
                            </slot>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</transition>
</template>

<style>
	.modal-container{
		width:480px
	}
</style>

<script>
export default {
    props: {
        title: {
            type:String
        },
		englishName: {
			type:String
        },
        chineseName: {
			type:String
		},
	},
	data() {
		return {
			enName: this.englishName,
			chName: this.chineseName,
		}
	},
	methods: {
		checkKeyWordsData() {
            let enName = this.enName
            let chName = this.chName
            let message = ''

			if (enName === "" && chName === "") {
				message = "英文或中文名稱不能為空"
			} else if (enName === "") {
				message = "英文名稱不能為空"
			} else if (chName === "") {
				message = "中文名稱不能為空"
            }
            
            if(message != ''){
                this.$emit('')
            }
		},
	},
}
</script>
<template>
	<div class="flex justify-center items-center">	
		<div class="max-w-2xl w-full">
			<div class="card bg-white dark:bg-slate-600 border rounded-lg px-8 pt-6 pb-8 mb-4 dark:border-slate-800">
				<edit-form 
					:key="$route.params.id"
					:consultation-evaluation-id="$route.params.id"
					@submit="formSubmit"/>
			</div>
		</div>
	</div>
</template>

<script>

	import { getPolicy } from '@consultantManagerModels/consultation-evaluation'
	import EditForm from '@consultantManagerModels/consultation-evaluation/forms/EditForm.vue'

	export default {
		components: {
			EditForm
		},
		emits: ['updateData'],
		mounted() {
			this.fetchEditPolicy();
		},
		methods: {
			fetchEditPolicy() {
				getPolicy('update', this.$route.params.id).then( res => {
					if(!res.update) {
						// this.$router.push({name: "NotAuthorized" });
					}
                });
			},
			formSubmit(payload) {	
				this.$emit('updateData', payload);
				this.$router.push({
					name: "AdminShowConsultationEvaluation", 
					params: { 
						id: payload.id 
					} 
				});
			}
		}
	}
</script>
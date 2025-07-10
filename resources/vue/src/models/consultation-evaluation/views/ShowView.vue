<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-evaluation="consultationEvaluation" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-evaluation="consultationEvaluation" />
	    			</div>
	    			<div v-else>
	    				<router-view @updateData="fetchData"></router-view>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</template>

<script>

	import { showModel } from '@consultantManagerModels/consultation-evaluation'
	import ModelCard from '@consultantManagerModels/consultation-evaluation/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-evaluation/widgets/ModelProfile.vue'

	export default {
		components: {
			ModelCard,
			ModelProfile
		},
		mounted() {
			this.fetchData();
		},
		data() {
			return {
				dataLoaded: false,
				title: undefined,
				consultationEvaluationId: this.$route.params.id,
				consultationEvaluation: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationEvaluation');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationEvaluation') {
					return [
						{ text: 'ConsultationEvaluations', path: '/admin/consultation-evaluation'},
						{ text: this.consultationEvaluation.name ?? 'ConsultationEvaluation', path: '/admin/consultation-evaluation/' + this.consultationEvaluation.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationEvaluation') {
					return [
						{ text: 'ConsultationEvaluations', path: '/admin/consultation-evaluation'},
						{ text: this.consultationEvaluation.name ?? 'ConsultationEvaluation' , path: '/admin/consultation-evaluation/' + this.consultationEvaluation.id},
						{ text: 'Editar consultation-evaluation', path: '/admin/consultation-evaluation/' + this.consultationEvaluation.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationEvaluation()
				this.dataLoaded = true;
				this.title = this.consultationEvaluation.name;
				document.title = this.title;
			},
			async fetchConsultationEvaluation() {
				let res = await showModel(this.consultationEvaluationId);
				this.consultationEvaluation = res;
            },
		}
	}
</script>
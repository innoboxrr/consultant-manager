<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-service="consultationService" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-service="consultationService" />
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

	import { showModel } from '@consultantManagerModels/consultation-service'
	import ModelCard from '@consultantManagerModels/consultation-service/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-service/widgets/ModelProfile.vue'

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
				consultationServiceId: this.$route.params.id,
				consultationService: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationService');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationService') {
					return [
						{ text: 'ConsultationServices', path: '/admin/consultation-service'},
						{ text: this.consultationService.name ?? 'ConsultationService', path: '/admin/consultation-service/' + this.consultationService.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationService') {
					return [
						{ text: 'ConsultationServices', path: '/admin/consultation-service'},
						{ text: this.consultationService.name ?? 'ConsultationService' , path: '/admin/consultation-service/' + this.consultationService.id},
						{ text: 'Editar consultation-service', path: '/admin/consultation-service/' + this.consultationService.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationService()
				this.dataLoaded = true;
				this.title = this.consultationService.name;
				document.title = this.title;
			},
			async fetchConsultationService() {
				let res = await showModel(this.consultationServiceId);
				this.consultationService = res;
            },
		}
	}
</script>
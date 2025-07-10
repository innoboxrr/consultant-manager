<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-session-service="consultationSessionService" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-session-service="consultationSessionService" />
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

	import { showModel } from '@consultantManagerModels/consultation-session-service'
	import ModelCard from '@consultantManagerModels/consultation-session-service/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-session-service/widgets/ModelProfile.vue'

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
				consultationSessionServiceId: this.$route.params.id,
				consultationSessionService: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationSessionService');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationSessionService') {
					return [
						{ text: 'ConsultationSessionServices', path: '/admin/consultation-session-service'},
						{ text: this.consultationSessionService.name ?? 'ConsultationSessionService', path: '/admin/consultation-session-service/' + this.consultationSessionService.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationSessionService') {
					return [
						{ text: 'ConsultationSessionServices', path: '/admin/consultation-session-service'},
						{ text: this.consultationSessionService.name ?? 'ConsultationSessionService' , path: '/admin/consultation-session-service/' + this.consultationSessionService.id},
						{ text: 'Editar consultation-session-service', path: '/admin/consultation-session-service/' + this.consultationSessionService.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationSessionService()
				this.dataLoaded = true;
				this.title = this.consultationSessionService.name;
				document.title = this.title;
			},
			async fetchConsultationSessionService() {
				let res = await showModel(this.consultationSessionServiceId);
				this.consultationSessionService = res;
            },
		}
	}
</script>
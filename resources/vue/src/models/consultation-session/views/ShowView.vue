<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-session="consultationSession" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-session="consultationSession" />
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

	import { showModel } from '@consultantManagerModels/consultation-session'
	import ModelCard from '@consultantManagerModels/consultation-session/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-session/widgets/ModelProfile.vue'

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
				consultationSessionId: this.$route.params.id,
				consultationSession: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationSession');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationSession') {
					return [
						{ text: 'ConsultationSessions', path: '/admin/consultation-session'},
						{ text: this.consultationSession.name ?? 'ConsultationSession', path: '/admin/consultation-session/' + this.consultationSession.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationSession') {
					return [
						{ text: 'ConsultationSessions', path: '/admin/consultation-session'},
						{ text: this.consultationSession.name ?? 'ConsultationSession' , path: '/admin/consultation-session/' + this.consultationSession.id},
						{ text: 'Editar consultation-session', path: '/admin/consultation-session/' + this.consultationSession.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationSession()
				this.dataLoaded = true;
				this.title = this.consultationSession.name;
				document.title = this.title;
			},
			async fetchConsultationSession() {
				let res = await showModel(this.consultationSessionId);
				this.consultationSession = res;
            },
		}
	}
</script>
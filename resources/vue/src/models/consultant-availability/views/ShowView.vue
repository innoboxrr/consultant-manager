<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultant-availability="consultantAvailability" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultant-availability="consultantAvailability" />
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

	import { showModel } from '@consultantManagerModels/consultant-availability'
	import ModelCard from '@consultantManagerModels/consultant-availability/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultant-availability/widgets/ModelProfile.vue'

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
				consultantAvailabilityId: this.$route.params.id,
				consultantAvailability: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultantAvailability');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultantAvailability') {
					return [
						{ text: 'ConsultantAvailabilities', path: '/admin/consultant-availability'},
						{ text: this.consultantAvailability.name ?? 'ConsultantAvailability', path: '/admin/consultant-availability/' + this.consultantAvailability.id}
					];
				} else if(this.$route.name == 'AdminEditConsultantAvailability') {
					return [
						{ text: 'ConsultantAvailabilities', path: '/admin/consultant-availability'},
						{ text: this.consultantAvailability.name ?? 'ConsultantAvailability' , path: '/admin/consultant-availability/' + this.consultantAvailability.id},
						{ text: 'Editar consultant-availability', path: '/admin/consultant-availability/' + this.consultantAvailability.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultantAvailability()
				this.dataLoaded = true;
				this.title = this.consultantAvailability.name;
				document.title = this.title;
			},
			async fetchConsultantAvailability() {
				let res = await showModel(this.consultantAvailabilityId);
				this.consultantAvailability = res;
            },
		}
	}
</script>
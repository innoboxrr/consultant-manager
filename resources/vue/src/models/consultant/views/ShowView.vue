<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultant="consultant" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultant="consultant" />
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

	import { showModel } from '@consultantManagerModels/consultant'
	import ModelCard from '@consultantManagerModels/consultant/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultant/widgets/ModelProfile.vue'

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
				consultantId: this.$route.params.id,
				consultant: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultant');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultant') {
					return [
						{ text: 'Consultants', path: '/admin/consultant'},
						{ text: this.consultant.name ?? 'Consultant', path: '/admin/consultant/' + this.consultant.id}
					];
				} else if(this.$route.name == 'AdminEditConsultant') {
					return [
						{ text: 'Consultants', path: '/admin/consultant'},
						{ text: this.consultant.name ?? 'Consultant' , path: '/admin/consultant/' + this.consultant.id},
						{ text: 'Editar consultant', path: '/admin/consultant/' + this.consultant.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultant()
				this.dataLoaded = true;
				this.title = this.consultant.name;
				document.title = this.title;
			},
			async fetchConsultant() {
				let res = await showModel(this.consultantId);
				this.consultant = res;
            },
		}
	}
</script>
<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultant-record-template="consultantRecordTemplate" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultant-record-template="consultantRecordTemplate" />
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

	import { showModel } from '@consultantManagerModels/consultant-record-template'
	import ModelCard from '@consultantManagerModels/consultant-record-template/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultant-record-template/widgets/ModelProfile.vue'

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
				consultantRecordTemplateId: this.$route.params.id,
				consultantRecordTemplate: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultantRecordTemplate');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultantRecordTemplate') {
					return [
						{ text: 'ConsultantRecordTemplates', path: '/admin/consultant-record-template'},
						{ text: this.consultantRecordTemplate.name ?? 'ConsultantRecordTemplate', path: '/admin/consultant-record-template/' + this.consultantRecordTemplate.id}
					];
				} else if(this.$route.name == 'AdminEditConsultantRecordTemplate') {
					return [
						{ text: 'ConsultantRecordTemplates', path: '/admin/consultant-record-template'},
						{ text: this.consultantRecordTemplate.name ?? 'ConsultantRecordTemplate' , path: '/admin/consultant-record-template/' + this.consultantRecordTemplate.id},
						{ text: 'Editar consultant-record-template', path: '/admin/consultant-record-template/' + this.consultantRecordTemplate.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultantRecordTemplate()
				this.dataLoaded = true;
				this.title = this.consultantRecordTemplate.name;
				document.title = this.title;
			},
			async fetchConsultantRecordTemplate() {
				let res = await showModel(this.consultantRecordTemplateId);
				this.consultantRecordTemplate = res;
            },
		}
	}
</script>
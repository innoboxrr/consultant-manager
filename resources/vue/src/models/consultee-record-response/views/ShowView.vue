<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultee-record-response="consulteeRecordResponse" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultee-record-response="consulteeRecordResponse" />
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

	import { showModel } from '@consultantManagerModels/consultee-record-response'
	import ModelCard from '@consultantManagerModels/consultee-record-response/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultee-record-response/widgets/ModelProfile.vue'

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
				consulteeRecordResponseId: this.$route.params.id,
				consulteeRecordResponse: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsulteeRecordResponse');
			},
			items() {
				if(this.$route.name == 'AdminShowConsulteeRecordResponse') {
					return [
						{ text: 'ConsulteeRecordResponses', path: '/admin/consultee-record-response'},
						{ text: this.consulteeRecordResponse.name ?? 'ConsulteeRecordResponse', path: '/admin/consultee-record-response/' + this.consulteeRecordResponse.id}
					];
				} else if(this.$route.name == 'AdminEditConsulteeRecordResponse') {
					return [
						{ text: 'ConsulteeRecordResponses', path: '/admin/consultee-record-response'},
						{ text: this.consulteeRecordResponse.name ?? 'ConsulteeRecordResponse' , path: '/admin/consultee-record-response/' + this.consulteeRecordResponse.id},
						{ text: 'Editar consultee-record-response', path: '/admin/consultee-record-response/' + this.consulteeRecordResponse.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsulteeRecordResponse()
				this.dataLoaded = true;
				this.title = this.consulteeRecordResponse.name;
				document.title = this.title;
			},
			async fetchConsulteeRecordResponse() {
				let res = await showModel(this.consulteeRecordResponseId);
				this.consulteeRecordResponse = res;
            },
		}
	}
</script>
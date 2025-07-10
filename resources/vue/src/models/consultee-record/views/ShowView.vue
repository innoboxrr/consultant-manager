<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultee-record="consulteeRecord" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultee-record="consulteeRecord" />
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

	import { showModel } from '@consultantManagerModels/consultee-record'
	import ModelCard from '@consultantManagerModels/consultee-record/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultee-record/widgets/ModelProfile.vue'

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
				consulteeRecordId: this.$route.params.id,
				consulteeRecord: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsulteeRecord');
			},
			items() {
				if(this.$route.name == 'AdminShowConsulteeRecord') {
					return [
						{ text: 'ConsulteeRecords', path: '/admin/consultee-record'},
						{ text: this.consulteeRecord.name ?? 'ConsulteeRecord', path: '/admin/consultee-record/' + this.consulteeRecord.id}
					];
				} else if(this.$route.name == 'AdminEditConsulteeRecord') {
					return [
						{ text: 'ConsulteeRecords', path: '/admin/consultee-record'},
						{ text: this.consulteeRecord.name ?? 'ConsulteeRecord' , path: '/admin/consultee-record/' + this.consulteeRecord.id},
						{ text: 'Editar consultee-record', path: '/admin/consultee-record/' + this.consulteeRecord.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsulteeRecord()
				this.dataLoaded = true;
				this.title = this.consulteeRecord.name;
				document.title = this.title;
			},
			async fetchConsulteeRecord() {
				let res = await showModel(this.consulteeRecordId);
				this.consulteeRecord = res;
            },
		}
	}
</script>
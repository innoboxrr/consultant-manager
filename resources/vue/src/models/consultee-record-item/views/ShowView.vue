<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultee-record-item="consulteeRecordItem" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultee-record-item="consulteeRecordItem" />
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

	import { showModel } from '@consultantManagerModels/consultee-record-item'
	import ModelCard from '@consultantManagerModels/consultee-record-item/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultee-record-item/widgets/ModelProfile.vue'

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
				consulteeRecordItemId: this.$route.params.id,
				consulteeRecordItem: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsulteeRecordItem');
			},
			items() {
				if(this.$route.name == 'AdminShowConsulteeRecordItem') {
					return [
						{ text: 'ConsulteeRecordItems', path: '/admin/consultee-record-item'},
						{ text: this.consulteeRecordItem.name ?? 'ConsulteeRecordItem', path: '/admin/consultee-record-item/' + this.consulteeRecordItem.id}
					];
				} else if(this.$route.name == 'AdminEditConsulteeRecordItem') {
					return [
						{ text: 'ConsulteeRecordItems', path: '/admin/consultee-record-item'},
						{ text: this.consulteeRecordItem.name ?? 'ConsulteeRecordItem' , path: '/admin/consultee-record-item/' + this.consulteeRecordItem.id},
						{ text: 'Editar consultee-record-item', path: '/admin/consultee-record-item/' + this.consulteeRecordItem.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsulteeRecordItem()
				this.dataLoaded = true;
				this.title = this.consulteeRecordItem.name;
				document.title = this.title;
			},
			async fetchConsulteeRecordItem() {
				let res = await showModel(this.consulteeRecordItemId);
				this.consulteeRecordItem = res;
            },
		}
	}
</script>
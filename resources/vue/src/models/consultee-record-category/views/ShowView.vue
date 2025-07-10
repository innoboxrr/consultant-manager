<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultee-record-category="consulteeRecordCategory" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultee-record-category="consulteeRecordCategory" />
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

	import { showModel } from '@consultantManagerModels/consultee-record-category'
	import ModelCard from '@consultantManagerModels/consultee-record-category/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultee-record-category/widgets/ModelProfile.vue'

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
				consulteeRecordCategoryId: this.$route.params.id,
				consulteeRecordCategory: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsulteeRecordCategory');
			},
			items() {
				if(this.$route.name == 'AdminShowConsulteeRecordCategory') {
					return [
						{ text: 'ConsulteeRecordCategories', path: '/admin/consultee-record-category'},
						{ text: this.consulteeRecordCategory.name ?? 'ConsulteeRecordCategory', path: '/admin/consultee-record-category/' + this.consulteeRecordCategory.id}
					];
				} else if(this.$route.name == 'AdminEditConsulteeRecordCategory') {
					return [
						{ text: 'ConsulteeRecordCategories', path: '/admin/consultee-record-category'},
						{ text: this.consulteeRecordCategory.name ?? 'ConsulteeRecordCategory' , path: '/admin/consultee-record-category/' + this.consulteeRecordCategory.id},
						{ text: 'Editar consultee-record-category', path: '/admin/consultee-record-category/' + this.consulteeRecordCategory.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsulteeRecordCategory()
				this.dataLoaded = true;
				this.title = this.consulteeRecordCategory.name;
				document.title = this.title;
			},
			async fetchConsulteeRecordCategory() {
				let res = await showModel(this.consulteeRecordCategoryId);
				this.consulteeRecordCategory = res;
            },
		}
	}
</script>
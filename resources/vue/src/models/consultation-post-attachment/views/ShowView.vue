<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-post-attachment="consultationPostAttachment" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-post-attachment="consultationPostAttachment" />
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

	import { showModel } from '@consultantManagerModels/consultation-post-attachment'
	import ModelCard from '@consultantManagerModels/consultation-post-attachment/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-post-attachment/widgets/ModelProfile.vue'

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
				consultationPostAttachmentId: this.$route.params.id,
				consultationPostAttachment: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationPostAttachment');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationPostAttachment') {
					return [
						{ text: 'ConsultationPostAttachments', path: '/admin/consultation-post-attachment'},
						{ text: this.consultationPostAttachment.name ?? 'ConsultationPostAttachment', path: '/admin/consultation-post-attachment/' + this.consultationPostAttachment.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationPostAttachment') {
					return [
						{ text: 'ConsultationPostAttachments', path: '/admin/consultation-post-attachment'},
						{ text: this.consultationPostAttachment.name ?? 'ConsultationPostAttachment' , path: '/admin/consultation-post-attachment/' + this.consultationPostAttachment.id},
						{ text: 'Editar consultation-post-attachment', path: '/admin/consultation-post-attachment/' + this.consultationPostAttachment.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationPostAttachment()
				this.dataLoaded = true;
				this.title = this.consultationPostAttachment.name;
				document.title = this.title;
			},
			async fetchConsultationPostAttachment() {
				let res = await showModel(this.consultationPostAttachmentId);
				this.consultationPostAttachment = res;
            },
		}
	}
</script>
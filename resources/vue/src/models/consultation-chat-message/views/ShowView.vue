<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-chat-message="consultationChatMessage" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-chat-message="consultationChatMessage" />
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

	import { showModel } from '@consultantManagerModels/consultation-chat-message'
	import ModelCard from '@consultantManagerModels/consultation-chat-message/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-chat-message/widgets/ModelProfile.vue'

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
				consultationChatMessageId: this.$route.params.id,
				consultationChatMessage: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationChatMessage');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationChatMessage') {
					return [
						{ text: 'ConsultationChatMessages', path: '/admin/consultation-chat-message'},
						{ text: this.consultationChatMessage.name ?? 'ConsultationChatMessage', path: '/admin/consultation-chat-message/' + this.consultationChatMessage.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationChatMessage') {
					return [
						{ text: 'ConsultationChatMessages', path: '/admin/consultation-chat-message'},
						{ text: this.consultationChatMessage.name ?? 'ConsultationChatMessage' , path: '/admin/consultation-chat-message/' + this.consultationChatMessage.id},
						{ text: 'Editar consultation-chat-message', path: '/admin/consultation-chat-message/' + this.consultationChatMessage.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationChatMessage()
				this.dataLoaded = true;
				this.title = this.consultationChatMessage.name;
				document.title = this.title;
			},
			async fetchConsultationChatMessage() {
				let res = await showModel(this.consultationChatMessageId);
				this.consultationChatMessage = res;
            },
		}
	}
</script>
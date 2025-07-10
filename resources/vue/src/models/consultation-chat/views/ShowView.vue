<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-chat="consultationChat" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-chat="consultationChat" />
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

	import { showModel } from '@consultantManagerModels/consultation-chat'
	import ModelCard from '@consultantManagerModels/consultation-chat/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-chat/widgets/ModelProfile.vue'

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
				consultationChatId: this.$route.params.id,
				consultationChat: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationChat');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationChat') {
					return [
						{ text: 'ConsultationChats', path: '/admin/consultation-chat'},
						{ text: this.consultationChat.name ?? 'ConsultationChat', path: '/admin/consultation-chat/' + this.consultationChat.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationChat') {
					return [
						{ text: 'ConsultationChats', path: '/admin/consultation-chat'},
						{ text: this.consultationChat.name ?? 'ConsultationChat' , path: '/admin/consultation-chat/' + this.consultationChat.id},
						{ text: 'Editar consultation-chat', path: '/admin/consultation-chat/' + this.consultationChat.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationChat()
				this.dataLoaded = true;
				this.title = this.consultationChat.name;
				document.title = this.title;
			},
			async fetchConsultationChat() {
				let res = await showModel(this.consultationChatId);
				this.consultationChat = res;
            },
		}
	}
</script>
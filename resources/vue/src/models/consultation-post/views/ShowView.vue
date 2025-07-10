<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-post="consultationPost" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-post="consultationPost" />
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

	import { showModel } from '@consultantManagerModels/consultation-post'
	import ModelCard from '@consultantManagerModels/consultation-post/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-post/widgets/ModelProfile.vue'

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
				consultationPostId: this.$route.params.id,
				consultationPost: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationPost');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationPost') {
					return [
						{ text: 'ConsultationPosts', path: '/admin/consultation-post'},
						{ text: this.consultationPost.name ?? 'ConsultationPost', path: '/admin/consultation-post/' + this.consultationPost.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationPost') {
					return [
						{ text: 'ConsultationPosts', path: '/admin/consultation-post'},
						{ text: this.consultationPost.name ?? 'ConsultationPost' , path: '/admin/consultation-post/' + this.consultationPost.id},
						{ text: 'Editar consultation-post', path: '/admin/consultation-post/' + this.consultationPost.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationPost()
				this.dataLoaded = true;
				this.title = this.consultationPost.name;
				document.title = this.title;
			},
			async fetchConsultationPost() {
				let res = await showModel(this.consultationPostId);
				this.consultationPost = res;
            },
		}
	}
</script>
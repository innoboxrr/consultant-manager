<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-advice="consultationAdvice" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-advice="consultationAdvice" />
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

	import { showModel } from '@consultantManagerModels/consultation-advice'
	import ModelCard from '@consultantManagerModels/consultation-advice/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-advice/widgets/ModelProfile.vue'

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
				consultationAdviceId: this.$route.params.id,
				consultationAdvice: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationAdvice');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationAdvice') {
					return [
						{ text: 'ConsultationAdvices', path: '/admin/consultation-advice'},
						{ text: this.consultationAdvice.name ?? 'ConsultationAdvice', path: '/admin/consultation-advice/' + this.consultationAdvice.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationAdvice') {
					return [
						{ text: 'ConsultationAdvices', path: '/admin/consultation-advice'},
						{ text: this.consultationAdvice.name ?? 'ConsultationAdvice' , path: '/admin/consultation-advice/' + this.consultationAdvice.id},
						{ text: 'Editar consultation-advice', path: '/admin/consultation-advice/' + this.consultationAdvice.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationAdvice()
				this.dataLoaded = true;
				this.title = this.consultationAdvice.name;
				document.title = this.title;
			},
			async fetchConsultationAdvice() {
				let res = await showModel(this.consultationAdviceId);
				this.consultationAdvice = res;
            },
		}
	}
</script>
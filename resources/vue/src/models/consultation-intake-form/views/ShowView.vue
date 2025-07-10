<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-intake-form="consultationIntakeForm" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-intake-form="consultationIntakeForm" />
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

	import { showModel } from '@consultantManagerModels/consultation-intake-form'
	import ModelCard from '@consultantManagerModels/consultation-intake-form/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-intake-form/widgets/ModelProfile.vue'

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
				consultationIntakeFormId: this.$route.params.id,
				consultationIntakeForm: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationIntakeForm');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationIntakeForm') {
					return [
						{ text: 'ConsultationIntakeForms', path: '/admin/consultation-intake-form'},
						{ text: this.consultationIntakeForm.name ?? 'ConsultationIntakeForm', path: '/admin/consultation-intake-form/' + this.consultationIntakeForm.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationIntakeForm') {
					return [
						{ text: 'ConsultationIntakeForms', path: '/admin/consultation-intake-form'},
						{ text: this.consultationIntakeForm.name ?? 'ConsultationIntakeForm' , path: '/admin/consultation-intake-form/' + this.consultationIntakeForm.id},
						{ text: 'Editar consultation-intake-form', path: '/admin/consultation-intake-form/' + this.consultationIntakeForm.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationIntakeForm()
				this.dataLoaded = true;
				this.title = this.consultationIntakeForm.name;
				document.title = this.title;
			},
			async fetchConsultationIntakeForm() {
				let res = await showModel(this.consultationIntakeFormId);
				this.consultationIntakeForm = res;
            },
		}
	}
</script>
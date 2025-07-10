<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-payment="consultationPayment" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-payment="consultationPayment" />
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

	import { showModel } from '@consultantManagerModels/consultation-payment'
	import ModelCard from '@consultantManagerModels/consultation-payment/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-payment/widgets/ModelProfile.vue'

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
				consultationPaymentId: this.$route.params.id,
				consultationPayment: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationPayment');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationPayment') {
					return [
						{ text: 'ConsultationPayments', path: '/admin/consultation-payment'},
						{ text: this.consultationPayment.name ?? 'ConsultationPayment', path: '/admin/consultation-payment/' + this.consultationPayment.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationPayment') {
					return [
						{ text: 'ConsultationPayments', path: '/admin/consultation-payment'},
						{ text: this.consultationPayment.name ?? 'ConsultationPayment' , path: '/admin/consultation-payment/' + this.consultationPayment.id},
						{ text: 'Editar consultation-payment', path: '/admin/consultation-payment/' + this.consultationPayment.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationPayment()
				this.dataLoaded = true;
				this.title = this.consultationPayment.name;
				document.title = this.title;
			},
			async fetchConsultationPayment() {
				let res = await showModel(this.consultationPaymentId);
				this.consultationPayment = res;
            },
		}
	}
</script>
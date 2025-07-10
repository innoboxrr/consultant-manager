<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-price="consultationPrice" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-price="consultationPrice" />
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

	import { showModel } from '@consultantManagerModels/consultation-price'
	import ModelCard from '@consultantManagerModels/consultation-price/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-price/widgets/ModelProfile.vue'

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
				consultationPriceId: this.$route.params.id,
				consultationPrice: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationPrice');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationPrice') {
					return [
						{ text: 'ConsultationPrices', path: '/admin/consultation-price'},
						{ text: this.consultationPrice.name ?? 'ConsultationPrice', path: '/admin/consultation-price/' + this.consultationPrice.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationPrice') {
					return [
						{ text: 'ConsultationPrices', path: '/admin/consultation-price'},
						{ text: this.consultationPrice.name ?? 'ConsultationPrice' , path: '/admin/consultation-price/' + this.consultationPrice.id},
						{ text: 'Editar consultation-price', path: '/admin/consultation-price/' + this.consultationPrice.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationPrice()
				this.dataLoaded = true;
				this.title = this.consultationPrice.name;
				document.title = this.title;
			},
			async fetchConsultationPrice() {
				let res = await showModel(this.consultationPriceId);
				this.consultationPrice = res;
            },
		}
	}
</script>
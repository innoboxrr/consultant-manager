<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultee="consultee" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultee="consultee" />
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

	import { showModel } from '@consultantManagerModels/consultee'
	import ModelCard from '@consultantManagerModels/consultee/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultee/widgets/ModelProfile.vue'

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
				consulteeId: this.$route.params.id,
				consultee: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultee');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultee') {
					return [
						{ text: 'Consultees', path: '/admin/consultee'},
						{ text: this.consultee.name ?? 'Consultee', path: '/admin/consultee/' + this.consultee.id}
					];
				} else if(this.$route.name == 'AdminEditConsultee') {
					return [
						{ text: 'Consultees', path: '/admin/consultee'},
						{ text: this.consultee.name ?? 'Consultee' , path: '/admin/consultee/' + this.consultee.id},
						{ text: 'Editar consultee', path: '/admin/consultee/' + this.consultee.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultee()
				this.dataLoaded = true;
				this.title = this.consultee.name;
				document.title = this.title;
			},
			async fetchConsultee() {
				let res = await showModel(this.consulteeId);
				this.consultee = res;
            },
		}
	}
</script>
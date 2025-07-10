<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-appointment="consultationAppointment" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-appointment="consultationAppointment" />
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

	import { showModel } from '@consultantManagerModels/consultation-appointment'
	import ModelCard from '@consultantManagerModels/consultation-appointment/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-appointment/widgets/ModelProfile.vue'

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
				consultationAppointmentId: this.$route.params.id,
				consultationAppointment: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationAppointment');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationAppointment') {
					return [
						{ text: 'ConsultationAppointments', path: '/admin/consultation-appointment'},
						{ text: this.consultationAppointment.name ?? 'ConsultationAppointment', path: '/admin/consultation-appointment/' + this.consultationAppointment.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationAppointment') {
					return [
						{ text: 'ConsultationAppointments', path: '/admin/consultation-appointment'},
						{ text: this.consultationAppointment.name ?? 'ConsultationAppointment' , path: '/admin/consultation-appointment/' + this.consultationAppointment.id},
						{ text: 'Editar consultation-appointment', path: '/admin/consultation-appointment/' + this.consultationAppointment.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationAppointment()
				this.dataLoaded = true;
				this.title = this.consultationAppointment.name;
				document.title = this.title;
			},
			async fetchConsultationAppointment() {
				let res = await showModel(this.consultationAppointmentId);
				this.consultationAppointment = res;
            },
		}
	}
</script>
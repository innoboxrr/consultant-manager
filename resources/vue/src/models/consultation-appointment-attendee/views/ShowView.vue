<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultation-appointment-attendee="consultationAppointmentAttendee" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultation-appointment-attendee="consultationAppointmentAttendee" />
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

	import { showModel } from '@consultantManagerModels/consultation-appointment-attendee'
	import ModelCard from '@consultantManagerModels/consultation-appointment-attendee/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultation-appointment-attendee/widgets/ModelProfile.vue'

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
				consultationAppointmentAttendeeId: this.$route.params.id,
				consultationAppointmentAttendee: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultationAppointmentAttendee');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultationAppointmentAttendee') {
					return [
						{ text: 'ConsultationAppointmentAttendees', path: '/admin/consultation-appointment-attendee'},
						{ text: this.consultationAppointmentAttendee.name ?? 'ConsultationAppointmentAttendee', path: '/admin/consultation-appointment-attendee/' + this.consultationAppointmentAttendee.id}
					];
				} else if(this.$route.name == 'AdminEditConsultationAppointmentAttendee') {
					return [
						{ text: 'ConsultationAppointmentAttendees', path: '/admin/consultation-appointment-attendee'},
						{ text: this.consultationAppointmentAttendee.name ?? 'ConsultationAppointmentAttendee' , path: '/admin/consultation-appointment-attendee/' + this.consultationAppointmentAttendee.id},
						{ text: 'Editar consultation-appointment-attendee', path: '/admin/consultation-appointment-attendee/' + this.consultationAppointmentAttendee.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultationAppointmentAttendee()
				this.dataLoaded = true;
				this.title = this.consultationAppointmentAttendee.name;
				document.title = this.title;
			},
			async fetchConsultationAppointmentAttendee() {
				let res = await showModel(this.consultationAppointmentAttendeeId);
				this.consultationAppointmentAttendee = res;
            },
		}
	}
</script>
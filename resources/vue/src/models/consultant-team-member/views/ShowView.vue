<template>
	<div v-if="dataLoaded">
		<breadcrumbs-component :items="items" />
	    <div class="uk-container uk-container-expand">
	    	<div class="uk-grid-small" uk-grid>
	    		<div class="uk-width-1-3@m uk-width-1-1@s">
					<model-card 
						:consultant-team-member="consultantTeamMember" />
	    		</div>
	    		<div class="uk-width-expand uk-width-1-2@m uk-width-1-1@s">
	    			<div v-if="this.isShowView">
	    				<model-profile 
	    					:consultant-team-member="consultantTeamMember" />
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

	import { showModel } from '@consultantManagerModels/consultant-team-member'
	import ModelCard from '@consultantManagerModels/consultant-team-member/widgets/ModelCard.vue'
	import ModelProfile from '@consultantManagerModels/consultant-team-member/widgets/ModelProfile.vue'

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
				consultantTeamMemberId: this.$route.params.id,
				consultantTeamMember: {},
			}
		},
		computed: {
			isShowView() {
				return (this.$route.name == 'AdminShowConsultantTeamMember');
			},
			items() {
				if(this.$route.name == 'AdminShowConsultantTeamMember') {
					return [
						{ text: 'ConsultantTeamMembers', path: '/admin/consultant-team-member'},
						{ text: this.consultantTeamMember.name ?? 'ConsultantTeamMember', path: '/admin/consultant-team-member/' + this.consultantTeamMember.id}
					];
				} else if(this.$route.name == 'AdminEditConsultantTeamMember') {
					return [
						{ text: 'ConsultantTeamMembers', path: '/admin/consultant-team-member'},
						{ text: this.consultantTeamMember.name ?? 'ConsultantTeamMember' , path: '/admin/consultant-team-member/' + this.consultantTeamMember.id},
						{ text: 'Editar consultant-team-member', path: '/admin/consultant-team-member/' + this.consultantTeamMember.id + '/edit'}	
					];
				}
			}
		},
		methods: {
			async fetchData() {
				await this.fetchConsultantTeamMember()
				this.dataLoaded = true;
				this.title = this.consultantTeamMember.name;
				document.title = this.title;
			},
			async fetchConsultantTeamMember() {
				let res = await showModel(this.consultantTeamMemberId);
				this.consultantTeamMember = res;
            },
		}
	}
</script>
<template>
	<div id="AdminConsultantTeamMembersWrapper">
		<div v-if="isHome" class="uk-section uk-section-xsmall">
			<breadcrumbs-component 
				:pages="[
					{ link: $router.resolve({ name: 'AdminConsultantTeamMembers' }).fullPath, title: 'ConsultantTeamMembers'}
				]"/>
			<data-table 
				:show-title="false"
				:hide-columns="hideColumns"
				:key="crudKey" />
		</div>
		<div v-else>
			<router-view @updateData="updateDatatable"></router-view>
		</div>
	</div>
</template>

<script>
	import DataTable from '@consultantManagerModels/consultant-team-member/widgets/DataTable.vue'

	export default {
		components: {
			DataTable

		},
		data() {
			return {
				title: undefined,
				crudKey: 0,
			}
		},
		computed: {
			isHome() {
				return (this.$route.name == 'AdminConsultantTeamMembers');
			},
			hideColumns() {
				if(false) {
					this.updateDatatable();
					return [];
				}
				return [];
			}
		},
		methods: {
			updateDatatable() {
				++this.crudKey;
			},
		}
	}
</script>
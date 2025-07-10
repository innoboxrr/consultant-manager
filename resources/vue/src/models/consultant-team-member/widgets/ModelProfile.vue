<template>
    <div v-if="dataLoaded" class="space-y-6">
        <div class="border rounded-xl shadow-sm p-6 bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center border-b pb-4 mb-6 dark:border-gray-600">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Detalle del modelo
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Información complementaria
                    </p>
                </div>
                <span class="text-xs px-3 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                    ID: {{ consultantTeamMember.id }}
                </span>
            </div>

            <dl class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Campo 1</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ consultantTeamMember.other }}</dd>
                </div>
                <!-- Agrega más campos aquí según sea necesario -->
            </dl>
        </div>
    </div>
</template>

<script>
import { showModel } from '@consultantManagerModels/consultant-team-member'

export default {
    props: {
        consultantTeamMember: {
            type: Object,
            required: false,
        },
        consultantTeamMemberId: {
            type: [Number, String],
            required: false
        }
    },
    data() {
        return {
            dataLoaded: false,
        }
    },
    created() {
        if (!this.consultantTeamMember && !this.consultantTeamMemberId) {
            console.error("Se debe proporcionar 'consultantTeamMember' o 'consultantTeamMemberId'.");
        }
    },
    mounted() {
        if (!this.consultantTeamMember && this.consultantTeamMemberId) {
            this.fetchConsultantTeamMember();
        } else {
            this.dataLoaded = true;
        }
    },
    methods: {
        fetchConsultantTeamMember() {
            showModel(this.consultantTeamMemberId).then(res => {
                this.consultantTeamMember = res;
                this.dataLoaded = true;
            });
        }
    }
}
</script>

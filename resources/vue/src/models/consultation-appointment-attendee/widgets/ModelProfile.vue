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
                    ID: {{ consultationAppointmentAttendee.id }}
                </span>
            </div>

            <dl class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Campo 1</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ consultationAppointmentAttendee.other }}</dd>
                </div>
                <!-- Agrega más campos aquí según sea necesario -->
            </dl>
        </div>
    </div>
</template>

<script>
import { showModel } from '@consultantManagerModels/consultation-appointment-attendee'

export default {
    props: {
        consultationAppointmentAttendee: {
            type: Object,
            required: false,
        },
        consultationAppointmentAttendeeId: {
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
        if (!this.consultationAppointmentAttendee && !this.consultationAppointmentAttendeeId) {
            console.error("Se debe proporcionar 'consultationAppointmentAttendee' o 'consultationAppointmentAttendeeId'.");
        }
    },
    mounted() {
        if (!this.consultationAppointmentAttendee && this.consultationAppointmentAttendeeId) {
            this.fetchConsultationAppointmentAttendee();
        } else {
            this.dataLoaded = true;
        }
    },
    methods: {
        fetchConsultationAppointmentAttendee() {
            showModel(this.consultationAppointmentAttendeeId).then(res => {
                this.consultationAppointmentAttendee = res;
                this.dataLoaded = true;
            });
        }
    }
}
</script>

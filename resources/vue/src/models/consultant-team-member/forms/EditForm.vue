<template>
	
	<form :id="formId" @submit.prevent="onSubmit">

<!-- Add more inputs -->

        <button-component
            :custom-class="buttonClass"
            :disabled="disabled"
            value="Actualizar" />
        
    </form>

</template>

<script>

    import { showModel, updateModel} from '@consultantManagerModels/consultant-team-member'
    import JSValidator from 'innoboxrr-js-validator'
    import {
        TextInputComponent,
        ButtonComponent,
//import_more_components//
    } from 'innoboxrr-form-elements'
    
	
	export default {

        components: {
            TextInputComponent,
            ButtonComponent,
//register_more_components//
        },

        props: {
            formId: {
                type: String,
                default: 'editConsultantTeamMemberForm'
            },
            consultantTeamMemberId: {
                type: [Number, String],
                required: true
            },
//props//
        },

        emits: ['submit'],

        mounted() {
            this.fetchData(); 
            this.JSValidator = new JSValidator(this.formId).init();
            this.JSValidator.status = true;
        },

        data() {
            return {
                consultantTeamMember: {
//model_data//
                },
                disabled: false,
                JSValidator: undefined,
            }
        },

        methods: {

            fetchData() {
                this.fetchConsultantTeamMember();
            },

            fetchConsultantTeamMember() {
                showModel(this.consultantTeamMemberId).then( res => {
                    this.consultantTeamMember = res;
                });
            },

            onSubmit() {
                if(this.JSValidator.status) {
                    this.disabled = true;
                    updateModel(this.consultantTeamMember.id, {
//submit_data//
                    }).then( res => {
                        this.$emit('submit', res);
                        setTimeout(() => { this.disabled = false; }, 2500);
                    }).catch(error => {
                        this.disabled = false;
                        if(error.response.status == 422)
                            this.JSValidator
                                .appendExternalErrors(error.response.data.errors);
                    });
                } else {
                    this.disabled = false;
                }
            }
        }
	}
</script>
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

    import { showModel, updateModel} from '@consultantManagerModels/consultee-record'
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
                default: 'editConsulteeRecordForm'
            },
            consulteeRecordId: {
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
                consulteeRecord: {
//model_data//
                },
                disabled: false,
                JSValidator: undefined,
            }
        },

        methods: {

            fetchData() {
                this.fetchConsulteeRecord();
            },

            fetchConsulteeRecord() {
                showModel(this.consulteeRecordId).then( res => {
                    this.consulteeRecord = res;
                });
            },

            onSubmit() {
                if(this.JSValidator.status) {
                    this.disabled = true;
                    updateModel(this.consulteeRecord.id, {
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
<template>
    <div>
        <component
            :is="'form-' + field.dependsOn.component"
            :errors="errors"
            :resource-id="resourceId"
            :resource-name="resourceName"
            :field="field.dependsOn"
            :ref="'field-' + field.dependsOn.attribute"
        />

        <component v-if="showChild"
            :is="'form-' + field.field.component"
            :errors="errors"
            :resource-id="resourceId"
            :resource-name="resourceName"
            :field="field.field"
            :ref="'field-' + field.field.attribute"
        />
    </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    mounted() {
        this.registerDependencyWatchers(this.$root)
    },

    data() {
        return {
            showChild: true
        };
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value, root) {
            this.value = value

            root.$children.forEach(component => {
                if (this.componentIsChild(component)) {
                    component.handleChange(value)
                }
            })
        },

        registerDependencyWatchers(root) {
            root.$children.forEach(component => {
                if (this.componentIsDependency(component)) {

                    component.$watch('value', (value) => {

                        if(value != undefined)
                            this.handleChange(this.field.values[value], root)

                    }, {immediate: true})
                }

                this.registerDependencyWatchers(component)
            })
        },

        componentIsDependency(component) {
            if(component.field === undefined) {
                return false;
            }

            if(component.field.attribute === this.field.dependsOn.attribute) {
                return true;
            }

            return false;
        },

        componentIsChild(component) {
            if(component.field === undefined) {
                return false;
            }

            if(component.field.attribute === this.field.field.attribute) {
                return true;
            }

            return false;
        },
    },
}
</script>

<template>

    <div class="form-label-group mt-2">
        <label for="lote_edit">{{etiqueta}}</label>
        <input :type="type" :id="id" :name="id" class="form-control" v-model="valor"  @input="onImput" :placeholder="placeholder" required="">
                                    
    </div>
 
    
</template>


<script>

export default {

    props:{

        etiqueta: String,
        id: String,
        modelValue: String,
        placeholder: String,
        type: String

    },
    data(){
    return {
        valor: ""
        
    }
   },
   methods: {
     
    onImput(){
        this.$emit('update:modelValue', this.valor);
    }

   },
   watch:{
       modelValue(){
        this.valor = this.modelValue;
       }
   }
    
}
</script>

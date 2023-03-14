<template>


<div>
    
    <div class="jumbotron text-center">
        <h1 class="display-4 ">SAPERX</h1>
        
        <h1>SISTEMA DE AGENDA TELEFÔNICA</h1>
        <p class="lead">
            
        </p>
    </div> 
                        


<div class="container">

                

                <div class="row mt-5">
                   
                </div>

                <hr/>

                <h2 class="card-text text-center">AGENDA</h2>

               <div class="row" style="padding-top: 50px;">
                    <button type="submit" class="btn btn-primary ml-3 mb-4" data-toggle="modal" data-target="#formInserir" title="Inserir"><i class="fa fa-solid fa-plus"></i> Inserir contato</button>
					<div class="col-lg-12">
						<div class="card mb-4 p-4">
                                                        
							<table class="table table-bordered table-striped table-hover" id="tabela-agenda">

                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Data Nascimento</th>
                                    <th scope="col">Telefone 1</th>
                                    <th scope="col">Telefone 2</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(agenda, index) in agendas" :key="agenda.id">
                                    <th scope="row">{{index + 1}}</th>
                                    <td>{{agenda.nome}}</td>
                                    <td>{{agenda.cpf}}</td>   
                                    <td>{{agenda.email}}</td>
                                    <td>{{agenda.data_nascimento}}</td>
                                    <td>{{agenda.telefone1}}</td>
                                    <td>{{agenda.telefone2}}</td>                                
                                    <td style="width: 12%;">

                                        <button type="submit" class="btn btn-primary btn-edit" @click.prevent.self="edit(agenda.id)" data-toggle="modal" data-target="#formEdit" title="Editar"><i class='fa fa-pencil'></i></button>
                                        
                                        <button type="submit" class="btn btn-danger btn-delete" @click.prevent.self="remover(agenda.id)"  title="Remover"><i class="fa fa-times"></i> </button>                                                                                              
                                        
                                    </td>
                                    </tr>
                                    
                                </tbody>
        
                            </table>
						</div>
					</div>
				</div>


                <div class="modal fade" id="formInserir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inserir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-signin mt-5 mb-5">
                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal">Dados contato</h1>        
                                </div>  

                                <div v-if="errors">
                                    <div v-for="(v, k) in errors" :key="k">
                                         
                                        <div class="alert alert-warning">
                                            <p v-for="error in v" :key="error" class="">
                                            {{error}} 
                                            </p>
                                        </div>                                        
                                    
                                    </div>
                                </div>                             

                               
                                <campotexto etiqueta="Nome" id="nome" placeholder="Nome"  type="text" v-model="nome"></campotexto>

                                <div class="form-label-group mt-2">
                                    <label for="lote">E-mail</label>
                                    <input type="email" id="email" name="email" class="form-control" v-model="email" placeholder="Infome o email" required="" autofocus="">                                    
                                </div> 

                                <campotexto etiqueta="Data Nascimento" id="data_nascimento" placeholder="Data de nascimento" type="date" v-model="data_nascimento"></campotexto>   

                                <campotexto etiqueta="CPF" id="cpf" placeholder="Informe seu CPF" type="text" v-model="cpf"></campotexto>

                                <campotexto etiqueta="Telefone 1" id="telefone_1" placeholder="Telefone 1" type="number" v-model="telefone_1"></campotexto>

                                <campotexto etiqueta="Telefone 2" id="telefone_2" placeholder="Telefone 2" type="number" v-model="telefone_2"></campotexto>                                                             
                                             
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"  @click.prevent.self="inserir()"  type="submit"><i class="fa fa-solid fa-plus"></i>  Inserir</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="formEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-signin mt-5 mb-5">
                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal">Editar Contato</h1>        
                                </div>

                                <campotexto etiqueta="Nome" id="nome_edit" placeholder="Nome"  type="text" v-model="nome_edit"></campotexto>

                                <div class="form-label-group mt-2">
                                    <label for="lote">E-mail</label>
                                    <input type="email" id="email_edit" name="email" class="form-control" v-model="email_edit" placeholder="Infome o email" required="" autofocus="">                                    
                                </div> 

                                <campotexto etiqueta="Data Nascimento" id="data_nascimento_edit" placeholder="Data de nascimento" type="date" v-model="data_nascimento_edit"></campotexto>   

                                <campotexto etiqueta="CPF" id="cpf_edit" placeholder="Informe seu CPF" type="text" v-model="cpf_edit"></campotexto>

                                <campotexto etiqueta="Telefone 1" id="telefone_1_edit" placeholder="Telefone 1" type="number" v-model="telefone_1_edit"></campotexto>

                                <campotexto etiqueta="Telefone 2" id="telefone_2_edit" placeholder="Telefone 2" type="number" v-model="telefone_2_edit"></campotexto>                                                                   
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"  @click.prevent.self="update(id)"  type="submit" >Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                        </div>
                        </div>
                    </div>
                </div>

</div>
</div>

 
    
</template>


<script>


import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import campotexto from './Campotexto'

export default {

    data(){
    return {        
        agendas: [],
        nome: "",
        email: "",
        cpf: "",
        data_nascimento: "",
        telefone_1: "",
        telefone_2: "",
        id:"",
        nome_edit:"",
        email_edit:"",
        cpf_edit:"",
        data_nascimento_edit:"",
        telefone_1_edit:"",
        telefone_2_edit:"",
        
        errors:""   

    }
   },
   components: {
    vSelect,
    campotexto
  },
   mounted(){
        this.getAllAgendas();
        this.gettable();        
   },
   methods: {
    
    async getAllAgendas(){

        axios.get("/all_agendas")
        .then(response => {
            
            if(response.data){
                      
                this.agendas= response.data; 
                   
            }

        });
    },
    async inserir(){        

        
        if(this.nome == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo nome é obrigatorio!',
           
            }); 

        }else if(this.email == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo E-mail é obrigatorio!',
            
            });        

        }else if(this.cpf == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo cpf é obrigatorio!',
            
            });        

        }else if(this.data_nascimento == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo data de nascimento é obrigatorio!',
            
            });        

        }else if(this.telefone_1 == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo Telefone 1 é obrigatorio!',
            
            });        

        }else{

            
            axios.post("/save_agenda",{
                nome: this.nome,
                email: this.email,
                cpf: this.cpf,
                data_nascimento: this.data_nascimento,
                telefone1: this.telefone_1,
                telefone2: this.telefone_2
                
            })
            .then(response => {
                
                if(response.data == "success"){
                    
                    Swal.fire({
                        type: 'success',
                        title: 'Sucesso',
                        html: 'Contato adicionado com sucesso!',
                        onClose: function(){

                            $('#nome').val("");
                            $('#email').val("");

                            $('#cpf').val("");
                            $('#data_nacsimento').val("");
                            $('#telefone_1').val("");
                            $('#telefone_2').val("");
                            
                                                                                            
                        }
                    }); 

                    this.getAllAgendas();

                }else{

                    Swal.fire({
                        type: 'erro',
                        title: 'Atenção',
                        html: 'Todos os campos são obrigatorios!',
                       
                    }); 

                }

            }).catch((error) => {
                this.errors = error.response.data.errors;                
            });
            
        }          

    },    
    async edit(id){

       this.id = id;       
       axios.get("get_agenda/"+id)
       .then(response => {
                        
            if(response.data){                
                this.nome_edit= response.data.nome;
                this.email_edit= response.data.email;                
                this.cpf_edit= response.data.cpf;
                this.data_nascimento_edit= response.data.data_nascimento;
                this.telefone_1_edit= response.data.telefone1;
                this.telefone_2_edit= response.data.telefone2;
                
            }
        });
    },
    async update(id){

        axios.put("update_agenda",{
        id:   this.id,    
        nome: this.nome_edit,
        email: this.email_edit,      
        cpf: this.cpf_edit,
        data_nascimento: this.data_nascimento_edit,
        telefone1: this.telefone_1_edit,
        telefone2: this.telefone_2_edit
        
    })
    .then(response => {
        
        if(response.data == "success"){

            Swal.fire({
                type: 'success',
                title: 'Sucesso',
                html: 'Contato atualizado com sucesso!',
                    onClose: function(){
                        
                        $('#nome_edit').val("");
                        $('#email_edit').val("");

                        
                        $('#cpf_edit').val("");
                        $('#data_nacsimento_edit').val("");
                        $('#telefone_1_edit').val("");
                        $('#telefone_2_edit').val("");
                                                                
                    }
            });            
            
            this.getAllAgendas();

        }

    });
    },
    remover(id){

        
        Swal.fire({
            title: 'Você tem certeza que deseja excluir o contato selecionado?',
            text: "Você não poderá reverter isso!",            
            type: "warning",
            animation: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: "Agora não!",
            showLoaderOnConfirm: false
            }).then((result) => {
            if (result.value) {

                
                axios.delete("delete_agenda/"+id)
                .then(response => {
                    
                    if(response.data == "success"){ 

                        Swal.fire({
                            type: 'success',
                            title: 'Sucesso',
                            html: 'Contato removido com sucesso!'
                               
                        });       

                        this.getAllAgendas();

                    }

                });

            }
        })

        
    },    
    async gettable(){        

        axios.get("/all_agendas")
        .then(response => {

            $("#tabela-agenda").DataTable({ 
                dom: "<'row'<'col-xl-6'l><'col-xl-6'Tf>r>" +
                    "t" +
                    "<'row'<'col-xl-6'i><'col-xl-6'p>>",
                tableTools: {
                    sSwfPath: "assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                }
            });

        });

    }

   }
    
}
</script>

<style scoped>
    #tabela-agenda {
			float: right;
		}

		.pagination {
			float: right;
		}

		table.table-bordered tbody td {
			padding: 10px;
			text-align: center;
		}

		table.dataTable thead>tr>th {
			padding: 10px;
			text-align: center;
		}
        .btn-edit{
            margin-right: 5px;
        }

        .btn-delete{
            width: 41%;
        }
</style>
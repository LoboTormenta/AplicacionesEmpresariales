<template>
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Guillermo Culebro</li>

    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Empleados
                <button type="button" @click="abrirModal('empleado', 'registrar')" class="btn btn-secondary">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apeliido materno</th>
                            <th>Puesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="empleado in arrayEmpleado" :key="empleado.id">
                            <td>
                                <button type="button" @click="abrirModal('empleado', 'actualizar', empleado)" class="btn btn-warning btn-sm">
                                    Actualizar
                                </button>
                                &nbsp;

                                <template>
                                    <button type="button" class="btn btn-danger btn-sm" @click="eliminarEmpleado(empleado)"> Eliminar
                                    </button>
                                </template>

                            </td>
                            <td v-text="empleado_id.id"></td>
                            <td v-text="empleado.nombre"></td>
                            <td v-text="empleado.apaterno"></td>
                            <td v-text="empleado.amaterno"></td>
                            <td v-text="empleado.puesto"></td>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>

    <!--Inicio del modal agregar/actualizar-->

    <div class="modal fade" tabindex="-1" :class="{ mostrar: modal }" role="dialog" aria-labelledby="myModalLabel" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                            <div class="col-md-9">
                                <input type="text" v-model="nombre" class="form-control" placeholder="Ingrese nombre" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="email-input">Apellido Paterno</label>
                            <div class="col-md-9">
                                <input type="email" v-model="apaterno" class="form-control" placeholder="Ingrese Apellido paterno" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="email-input">Apellido Materno</label>
                            <div class="col-md-9">
                                <input type="email" v-model="amaterno" class="form-control" placeholder="Ingrese Apellido Materno" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="email-input">Puesto</label>
                            <div class="col-md-9">
                                <input type="email" v-model="puesto" class="form-control" placeholder="Ingrese Puesto " />
                            </div>
                        </div>

                        <div v-show="errorEmpleado" class="form-group row div-error"></div>

                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjEmpleado" :key="error" v-text="error"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">
                        Cerrar
                    </button>
                    <button type="button" v-if="tipoAccion == 1" class="btn btn-primary" @click="registrarEmpleado()">
                        Guardar
                    </button>
                    <button type="button" v-if="tipoAccion == 2" class="btn btn-primary" @click="actualizarEmpleado()">
                        Actualizar
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</main>
</template>

    <!--Fin del modal-->

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script>
export default {
    data() {
        return {
            empleado_id: 0,
            nombre: "",
            apaterno: "",
            amaterno: "",
            puesto: "",
            arrayEmpleado: [],
            modal: 0,
            tituloModal: "",
            tipoAccion: 0,
            errorEmpleado: 0,
            errorMostrarMsjEmpleado: [],
        };
    },
    methods: {
        listarEmpleado() {
            let me = this;

            axios
                .get("/ejercicio2/public/empleado")
                .then(function (response) {
                    // handle success
                    me.arrayEmpleado = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },

        registrarEmpleado() {
            if (this.validarEmpleado()) {
                return;
            }

            let me = this;
            axios
                .post("/ejercicio2/public/empleado/registrar", {
                    'nombre': this.nombre,
                    'apaterno': this.apaterno,
                    'amaterno': this.amaterno,
                    'puesto': this.puesto,
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarEmpleado();
                })

                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },

        actualizarEmpleado() {
            // if (this.validarEmpleado()) {
            //     return;
            // }

            let me = this;
            axios
                .put("/ejercicio2/public/empleado/actualizar", {
                    'nombre': this.nombre,
                    'apaterno': this.apaterno,
                    'amaterno': this.amaterno,
                    'puesto': this.puesto,
                    'id': this.empleado_id,
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarEmpleado();
                })

                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            return

        },
        eliminarEmpleado(empleado) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Estas seguro de eliminar empleado?',
                text: "No se puede revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    let me = this;
                    axios
                        .delete('/ejercicio2/public/empleado/eliminar/' + empleado.id)
                        .then(function (response) {

                            me.listarEmpleado();

                            swalWithBootstrapButtons.fire(
                                'Eliminado!',
                                'El registro ha sido eliminado con éxito',
                                'success'
                            )
                        })

                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(

                        'Tu registro no ha sido eliminado'

                    )
                }
            })

        },

        // activarCategoria(id) {

        //     const swalWithBootstrapButtons = Swal.mixin({
        //         customClass: {
        //             confirmButton: 'btn btn-success',
        //             cancelButton: 'btn btn-danger'
        //         },
        //         buttonsStyling: false
        //     })

        //     swalWithBootstrapButtons.fire({
        //         title: 'Estas seguro de activar esta categoria?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Aceptar',
        //         cancelButtonText: 'Cancelar',
        //         reverseButtons: true
        //     }).then((result) => {
        //         if (result.isConfirmed) {

        //             let me = this;
        //             axios
        //                 .put("/categoria/activar", {

        //                     'id': id,
        //                 })
        //                 .then(function (response) {

        //                     me.listarCategoria();

        //                     swalWithBootstrapButtons.fire(
        //                         'Activado!',
        //                         'El registro ha sido activado con éxito',
        //                         'success'
        //                     )
        //                 })

        //                 .catch(function (error) {
        //                     // handle error
        //                     console.log(error);
        //                 });

        //         } else if (
        //             /* Read more about handling dismissals below */
        //             result.dismiss === Swal.DismissReason.cancel
        //         ) {
        //             swalWithBootstrapButtons.fire(

        //             )
        //         }
        //     })

        // },

        validarEmpleado() {
            this.errorEmpleado = 0;
            this.errorMostrarMsjEmpleado = [];

            if (!this.nombre)
                this.errorMostrarMsjEmpleado.push(
                    "El nombre del empleado no puede estar vacio"
                );

            if (!this.apaterno)
                this.errorMostrarMsjEmpleado.push(
                    "El apellido paterno del empleado no puede estar vacio"
                );
            if (!this.amaterno)
                this.errorMostrarMsjEmpleado.push(
                    "El apellido materno del empleado no puede estar vacio"
                );

            if (!this.puesto)
                this.errorMostrarMsjEmpleado.push(
                    "El puesto del empleado no puede estar vacio"
                );
            if (this.errorMostrarMsjEmpleado.length) this.errorEmpleado = 1;

            return this.errorEmpleado;
        },

        cerrarModal() {
            this.modal = 0;
            this.tituloModal = "";
            this.nombre = "";
            this.apaterno = "";
            this.amaterno = "";
            this.puesto = "";
        },

        abrirModal(modelo, accion, data = []) {
            switch (modelo) {
                case "empleado": {
                    switch (accion) {
                        case "registrar": {
                            this.modal = 1;
                            this.tituloModal = "Registrar empleado";
                            this.nombre = "";
                            this.apaterno = "";
                            this.amaterno = "";
                            this.puesto = "";
                            this.tipoAccion = 1;
                            break;
                        }
                        case "actualizar": {
                            // console.log(data);

                            this.modal = 1;
                            this.tituloModal = "Actualizar empleado";
                            this.empleado_id = data["id"];
                            this.nombre = data["nombre"];
                            this.apaterno = data["apaterno"];
                            this.amaterno = data["amaterno"];
                            this.puesto = data["puesto"];
                            this.tipoAccion = 2;
                            break;
                        }
                    }
                }
            }
        },
    },

    mounted() {
        this.listarEmpleado();
    },
};
</script>

<style>
.modal-content {
    width: 100% !important;
    position: absolute !important;
}

.mostrar {
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #3c29297a !important;
}

.div-error {
    display: flex;
    justify-content: center;
}

.text-error {
    color: red !important;
    font-weight: bold;
}
</style>

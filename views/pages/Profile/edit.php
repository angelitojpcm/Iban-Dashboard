<div class="app-content-area">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->

                <div class=" mb-5">
                    <h3 class="mb-0 fw-bold">Editar Usuario</h3>

                </div>

            </div>
        </div>
        <div class="row mb-8">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center mb-8">
                            <div class="col-md-3 mb-3 mb-md-0">
                                <h5 class="mb-0">Foto</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex align-items-center mb-4">
                                    <div>
                                        <img class="image  avatar avatar-lg rounded-circle" src="<?= BASE_URL ?>assets/images/avatar/<?= $data->user->photo ?>" alt="Image">
                                    </div>

                                    <div class="file-upload btn btn-outline-white ms-4">
                                        <input type="file" class="file-input opacity-0">Actualizar Foto
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <form id="profile-update" data-id="<?= $data->user->id?>">
                                <!-- row -->

                                <div class="mb-3 row">
                                    <label for="fullName" class="col-sm-4 col-form-label
                                form-label">Nombre Completo</label>
                                    <div class="col-md-8 col-12">
                                        <input type="text" class="form-control" placeholder="Nombre Completo" id="fullName" name="full_name" value="<?= isset($data->user->email) ? $data->user->full_name : '' ?>" required>
                                    </div>
                                </div>

                                <!-- row -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-4 col-form-label
                                form-label">Email</label>
                                    <div class="col-md-8 col-12">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= isset($data->user->email) ? $data->user->email : '' ?>" required>
                                    </div>
                                </div>
                                <!-- row -->
                                <div class="mb-3 row">
                                    <label for="phone" class="col-sm-4 col-form-label
                                form-label">Tel&eacute;fono <span class="text-muted">(Opcional)</span></label>
                                    <div class="col-md-8 col-12">
                                        <input type="text" class="form-control" placeholder="Ingresa el tel&eacute;fono" name="phone" id="phone" value="<?= isset($data->user->phone) ? $data->user->phone : '' ?>">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <label for="zipcode" class="col-sm-4 col-form-label form-label">
                                        Contraseña <span class="text-muted">(Opcional)</span>
                                    </label>

                                    <div class="col-md-8 col-12">
                                        <input type="password" class="form-control" name="password" placeholder="Ingresa la nueva contraseña">
                                    </div>
                                    <div class="offset-md-4 col-md-8 mt-4">
                                        <button type="submit" class="btn btn-primary w-100"> 
                                            Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
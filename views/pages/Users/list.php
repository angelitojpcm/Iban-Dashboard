<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-5">
                <h3 class="mb-0">Usuarios del Sistema</h3>
            </div>
        </div>
    </div>
    <div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-md-flex border-bottom-0 justify-content-end">
                        <div class="mt-3 mt-md-0">
                            <a href="#!" class="btn btn-primary">+ Add Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table id="example" class="table text-nowrap table-centered mt-0" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th class="pe-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                <label class="form-check-label" for="checkAll">
                                                </label>
                                            </div>
                                        </th>
                                        <th>Nombre Completo</th>
                                        <th>Correo Electrónico</th>
                                        <th>Teléfono</th>
                                        <th>Fecha de Registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data->users as $user) : ?>
                                        <tr>
                                            <td class="pe-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="contactCheckbox2">
                                                    <label class="form-check-label" for="contactCheckbox2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= BASE_URL ?>assets/images/avatar/<?= $user->photo ?>" alt="" class="img-4by3-sm rounded-3">
                                                    <div class="ms-3">
                                                        <h5 class="mb-0">
                                                            <a href="#!" class="text-inherit"><?= $user->full_name ?></a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="ps-0 text-center">
                                                <?= $user->email ?>
                                            </td>
                                            <td class="ps-0 text-center">
                                                <?= $user->phone ?>
                                            </td>
                                            <td class="ps-0 text-center">
                                                <?=
                                                date("d/m/Y", strtotime($user->created_at));
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="editOne">
                                                    <i data-feather="edit" class="icon-xs"></i>
                                                    <div id="editOne" class="d-none">
                                                        <span>Edit</span>
                                                    </div>
                                                </a>
                                                <button class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip delete-user" data-id="<?= $user->id;?>">
                                                    <i data-feather="trash-2" class="icon-xs"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
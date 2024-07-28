<?php
$query = 'SELECT users.*, roles.rolename
FROM users
JOIN roles ON users.user_role = roles.id_rol;';

$users = make_query($query);

?>
<section>
    <h1>Lista de usuarios</h1>
    <p class="text-dark mb-4">Aqui podrás ver el listado de usuarios de tu aplicación</p>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="align-middle">
                    <td><?php echo htmlspecialchars($user['id_user']); ?></td>
                    <td><?php echo htmlspecialchars($user['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($user['rolename']); ?></td>
                    <td>
                        <button class="btn btn-primary border-0">Ver Compras</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>
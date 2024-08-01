<?php
$query = 'SELECT users.*, roles.rolename
FROM users
JOIN roles ON users.user_role = roles.id_rol;';

$users = make_query($query);

?>

<div class="p-2 users">
    <h1>Lista de usuarios</h1>
    <p class="text-dark mb-4">Aqui podrás ver el listado de usuarios de tu aplicación</p>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="text-center w-25">ID</th>
                <th class="text-center w-25">Email</th>
                <th class="text-center w-25">Rol</th>
                <th class="text-center w-25">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="align-middle">
                    <td class="text-center"><?php echo htmlspecialchars($user['id_user']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($user['user_email']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($user['rolename']); ?></td>
                    <td class="text-center">
                        <a href="index.php?section=userPurchases&id_user=<?php echo $user['id_user'] ?>"
                            class="btn px-2 py-1">Ver Compras</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
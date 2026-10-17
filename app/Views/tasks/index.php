<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { display: inline-block; padding: 6px 12px; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn-success { background: #28a745; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-danger { background: #dc3545; }
    </style>
</head>
<body>

<div class="container">
    <h1>Lista de Tareas</h1>
    <a href="<?= site_url('tasks/create') ?>" class="btn btn-success">+ Nueva Tarea</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha Límite</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td><strong><?= esc($task['title']) ?></strong></td>
                        <td><?= esc($task['description']) ?></td>
                        <td><?= esc($task['status']) ?></td>
                        <td><?= $task['due_date'] ?></td>
                        <td>
                            <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= site_url('tasks/delete/' . $task['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta tarea?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No hay tareas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

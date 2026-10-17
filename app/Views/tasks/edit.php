<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea, select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        a { text-decoration: none; color: #666; margin-left: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Editar Tarea</h1>

    <form action="<?= site_url('tasks/update/' . $task['id']) ?>" method="post">
        <div class="form-group">
            <label>Título:</label>
            <input type="text" name="title" value="<?= esc($task['title']) ?>" required>
        </div>

        <div class="form-group">
            <label>Descripción:</label>
            <textarea name="description" rows="4"><?= esc($task['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Estado:</label>
            <select name="status">
                <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pendiente</option>
                <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completada</option>
            </select>
        </div>

        <div class="form-group">
            <label>Fecha Límite:</label>
            <input type="date" name="due_date" value="<?= $task['due_date'] ?>">
        </div>

        <button type="submit">Guardar Cambios</button>
        <a href="<?= site_url('tasks') ?>">Cancelar</a>
    </form>
</div>

</body>
</html>

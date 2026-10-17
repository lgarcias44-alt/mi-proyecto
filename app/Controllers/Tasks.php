<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $model = new TaskModel();
        $data['tasks'] = $model->findAll();

        return view('tasks/index', $data);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $model = new TaskModel();

        $model->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status') ?? 'pending',
            'due_date'    => $this->request->getPost('due_date'),
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id = null)
    {
        $model = new TaskModel();
        $data['task'] = $model->find($id);

        if (!$data['task']) {
            return redirect()->to('/tasks');
        }

        return view('tasks/edit', $data);
    }

    public function update($id = null)
    {
        $model = new TaskModel();

        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'due_date'    => $this->request->getPost('due_date'),
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id = null)
    {
        $model = new TaskModel();
        $model->delete($id);

        return redirect()->to('/tasks');
    }
}

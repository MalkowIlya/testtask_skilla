<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => ['api', 'auth:apiWorkers']]);

Broadcast::channel('Worker.{id}', function (\App\Models\Worker $worker, $id) {
    return $worker->id === (int)$id;
});

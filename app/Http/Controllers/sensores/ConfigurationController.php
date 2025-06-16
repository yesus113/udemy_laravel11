<?php

namespace App\Http\Controllers\sensores;

use App\Http\Controllers\Controller;
use App\Models\sensores\Configuration;
use Illuminate\Http\Request;

use App\Http\Requests\Sensor\Configuration\StoreRequest;
use App\Http\Requests\Sensor\Configuration\PutRequest;


class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = Configuration::paginate(10);
        return view('sensores.configuration.index', compact('config'));

    }

    public function list()
    {
        $config = Configuration::paginate(10);
        return view('sensores.configuration.list', compact('config'));

    }

    public function info()
    {
        return view('sensores.info');

    }

    public function create()
    {
        $config = new Configuration();
        return view ('sensores/configuration/create', compact('config'));
    }

    
    public function store(StoreRequest $request)
    {
         Configuration::create($request->validated());
        return to_route('config.index')->with('status', 'Configuration created successfully');
    }

    public function show(Configuration $config)
    {
        return view('sensores.configuration.show', ['config'=> $config]);
    }

    
    public function edit(Configuration $config)
    {
        return view ('sensores.configuration.edit', compact('config'));
    }

    public function update(PutRequest $request, Configuration $config)
    {
        $data = $request->validated();


        $config->update($data);
        return to_route('config.index')->with('status', 'Config has been updated');
    }

    public function destroy(Configuration $config)
    {
        $config->delete();
        return to_route('config.index')->with('status', 'Config has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContratacionRequest;
use App\Http\Requests\UpdateContratacionRequest;
use App\Repositories\ContratacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
USE App\Models\Contratacion;
USE App\Models\Profesional;

class ContratacionController extends AppBaseController
{

	public function ver(Request $request, $vista = ""){
		$input = [];
		parse_str($request->form, $input);

		//=============================== RETURN 
		switch ($vista) {
			case 'paciente_show': 
				return redirect(route('pacientes.show', [$paciente->id]));
				// return view('pacientes.table', compact('paciente'));
				break;
			case 'datos_personales_tabla': 
				$pacienteDatosPersonales = $paciente->datospersonales;
				return view('paciente_datos_personales.show_fields', compact('pacienteDatosPersonales', 'paciente'));
				break;
			case 'crear': 
				return view('contratacions.create');
				break;
			case 'paciente_table': 
				return view('pacientes.table', compact('paciente'));
				break;
			
			default: 
				return view('pacientes.table', compact('paciente'));
				break;
		}
		if($request->redirect == "si"){
		}

	}















    /** @var  ContratacionRepository */
    private $contratacionRepository;

    public function __construct(ContratacionRepository $contratacionRepo)
    {
        $this->contratacionRepository = $contratacionRepo;
    }

    /**
     * Display a listing of the Contratacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contratacions = $this->contratacionRepository->paginate(50);

        return view('contratacions.index')
            ->with('contratacions', $contratacions);
    }

    /**
     * Show the form for creating a new Contratacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('contratacions.create');
    }

    /**
     * Store a newly created Contratacion in storage.
     *
     * @param CreateContratacionRequest $request
     *
     * @return Response
     */
    public function store(CreateContratacionRequest $request)
    {
        $input = $request->all();
        $contratacion = $this->contratacionRepository->create($input);

        Flash::success('Contratacion saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Contratacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contratacion = $this->contratacionRepository->find($id);

        if (empty($contratacion)) {
            Flash::error('Contratacion not found');

            return redirect(route('contratacions.index'));
        }

        return view('contratacions.show')->with('contratacion', $contratacion);
    }

    /**
     * Show the form for editing the specified Contratacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contratacion = $this->contratacionRepository->find($id);

        if (empty($contratacion)) {
            Flash::error('Contratacion not found');

            return redirect(route('contratacions.index'));
        }

        return redirect()->back()->with('contratacion', $contratacion);
    }

    /**
     * Update the specified Contratacion in storage.
     *
     * @param int $id
     * @param UpdateContratacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratacionRequest $request)
    {
        $contratacion = $this->contratacionRepository->find($id);

        if (empty($contratacion)) {
            Flash::error('Contratacion not found');

            return redirect(route('contratacions.index'));
        }

        $contratacion = $this->contratacionRepository->update($request->all(), $id);

        Flash::success('Contratacion updated successfully.');

        return redirect(route('contratacions.index'));
    }

    /**
     * Remove the specified Contratacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contratacion = $this->contratacionRepository->find($id);

        if (empty($contratacion)) {
            Flash::error('Contratacion not found');

            return redirect(route('contratacions.index'));
        }

        $this->contratacionRepository->delete($id);

        Flash::success('Contratacion deleted successfully.');

        return redirect(route('contratacions.index'));
    }

    public function render (Request $request){
        $paciente = ""; 
        $contratacion = ""; 
        if(isset($request->paciente)){
            $paciente = $request->paciente;
        }
        if(isset($request->contratacion)){
            $contratacion = Contratacion::find($request->contratacion);
        }

        switch ($request->view) {
            case 'ver':
                return view('contratacions.show', compact('contratacion'));
                # code...
                break;
            case 'nueva':
                $contratacion = new Contratacion; 
                return view('contratacions.create', compact('paciente'));
                # code...
                break;
            case 'agendar':
								$profesionales = Profesional::all(); 
                return view('contratacions.agendar', compact('contratacion', 'profesionales'));
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }
}

import PacientesTable from '../components/pacientes/PacientesTableO.vue'
import TratamientosTable from '../components/tratamientos/TratamientosTable.vue'
import Paciente from '../components/pacientes/Paciente.vue'
import ErrorView from '../components/ui/ErrorView.vue'
const routes = [
  { path: '/', component: PacientesTable },
  { path: '/pacientes', component: PacientesTable },
  { path: '/tratamientos', component: TratamientosTable },
  { path: '/pacientes/:id', name: 'Paciente', component: Paciente, props: true },
  { path: '/*', component: ErrorView, name: 'ErrorView' }
]

export default routes; 
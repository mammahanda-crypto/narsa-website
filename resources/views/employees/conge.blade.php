<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Congés') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                <div>
                    <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight">Documents Administratifs</h3>
                    <p class="text-gray-500 mt-1">Gérez les demandes et imprimez les attestations officielles</p>
                </div>
                
                @if(isset($employee))
                <a href="{{ route('attestation.show', $employee->id) }}" target="_blank" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-blue-200 transition-all flex items-center gap-2 active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Imprimer l'attestation
                </a>
                @endif
            </div>

            <div class="documents-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($conges as $conge)
                    <div class="doc-card bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col group">
                        
                        <div class="doc-paper relative h-52 w-full flex items-center justify-center bg-gray-50 overflow-hidden">
                            <svg class="w-16 h-16 text-slate-200 group-hover:scale-110 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            
                            <div class="absolute top-5 right-5">
                                <span class="bg-white/95 backdrop-blur-sm px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm
                                    {{ $conge->statut == 'En attente' ? 'text-yellow-600' : 'text-green-600' }}">
                                    {{ $conge->statut }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="h-10 w-10 rounded-full bg-[#0b3d91] text-white flex items-center justify-center font-bold text-sm ring-4 ring-blue-50">
                                    {{ strtoupper(substr($conge->employee->nom_prenom, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-gray-900 leading-none">{{ $conge->employee->nom_prenom }}</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase mt-1 tracking-tighter">NARSA - Agent Officiel</p>
                                </div>
                            </div>

                            <h4 class="text-lg font-black text-gray-800 leading-tight mb-4 group-hover:text-blue-600 transition-colors">
                                Attestation de Congé {{ $conge->type_conge }}
                            </h4>

                            <div class="flex items-center justify-between border-t border-gray-50 pt-5 mt-auto text-gray-400">
                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] font-bold tracking-tight">Du: {{ \Carbon\Carbon::parse($conge->date_debut)->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-[11px] font-bold tracking-tight">Fin: {{ \Carbon\Carbon::parse($conge->date_fin)->format('d/m/Y') }}</span>
                                </div>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('conges.imprimer', $conge->id) }}" target="_blank" 
                                   class="w-full flex items-center justify-center gap-2 tracking-widest uppercase py-3 bg-gray-100 rounded-lg text-[10px] font-bold active:scale-95 shadow-sm hover:shadow-blue-200 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                    </svg>
                                    Imprimer l'attestation
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-100 shadow-inner">
                        <div class="bg-gray-50 h-24 w-24 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-gray-800 tracking-tight">Aucun document prêt</h3>
                        <p class="text-gray-400 mt-2 font-medium">Commencez par ajouter une nouvelle demande de congé.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
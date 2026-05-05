<div class="space-y-5 w-full">
@php
            $entregas = [
                [
                    'loja' => 'Supermercado Silva',
                    'valor' => 'R$ 15,00',
                    'retirada' => 'Av. Paulista, 1000 - Bela Vista',
                    'entrega' => 'Rua Oscar Freire, 450 - Jardins',
                    'km' => '2.5 km',
                    'tempo' => '12 min'
                ],
                [
                    'loja' => 'Farmácia Central',
                    'valor' => 'R$ 18,50',
                    'retirada' => 'Rua Consolação, 2300 - Centro',
                    'entrega' => 'Av. Angélica, 120 - Higienópolis',
                    'km' => '3.8 km',
                    'tempo' => '18 min'
                ],
                [
                    'loja' => 'Restaurante Sabor',
                    'valor' => 'R$ 12,20',
                    'retirada' => 'Alameda Santos, 800 - Paraíso',
                    'entrega' => 'Rua Tutóia, 15 - Vila Mariana',
                    'km' => '1.2 km',
                    'tempo' => '8 min'
                ],
            ];
        @endphp

            @foreach($entregas as $entrega)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-100 active:scale-[0.98] transition-transform duration-200">
                    <div class="p-4 space-y-4">

                        <div class="flex justify-between items-start gap-3">
                            <div>
                                <h3 class="text-xl font-bold text-blue-900">
                                    {{ $entrega['loja'] }}
                                </h3>

                                <span class="inline-block mt-1 bg-green-100 text-green-700 text-xs font-bold px-2 py-0.5 rounded-full uppercase tracking-wide">
                                    Disponível
                                </span>
                            </div>

                            <div class="text-right">
                                <span class="text-2xl font-bold text-green-700">
                                    {{ $entrega['valor'] }}
                                </span>
                                <p class="text-xs text-slate-500">
                                    Estimativa
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center pt-1.5">
                                <div class="w-2.5 h-2.5 rounded-full border-2 border-blue-900 bg-white"></div>
                                <div class="w-0.5 h-10 bg-slate-200 my-0.5"></div>
                                <div class="w-2.5 h-2.5 bg-blue-900 rounded-sm"></div>
                            </div>

                            <div class="flex-1 space-y-3">
                                <div>
                                    <p class="text-xs font-semibold text-slate-400 leading-tight">
                                        RETIRADA
                                    </p>
                                    <p class="text-sm font-semibold text-slate-800">
                                        {{ $entrega['retirada'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold text-slate-400 leading-tight">
                                        ENTREGA
                                    </p>
                                    <p class="text-sm font-semibold text-slate-800">
                                        {{$entrega['entrega']}}
                                    </p>
                                </div>
                            </div>

                            
                            <button class="bg-green-700 text-white mt-6 px-6 py-3 rounded-xl text-sm font-bold shadow-lg uppercase tracking-wide">
                                Aceitar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
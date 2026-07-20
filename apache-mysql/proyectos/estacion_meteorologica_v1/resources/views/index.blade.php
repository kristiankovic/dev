<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR Weather</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-update { animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .5; } }
        .scroll-thin::-webkit-scrollbar { width: 6px; }
        .scroll-thin::-webkit-scrollbar-track { background: transparent; }
        .scroll-thin::-webkit-scrollbar-thumb { background: #3b3b4f; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#1e1e2e] text-[#cdd6f4] min-h-screen flex flex-col items-center justify-center font-sans p-4">

    <div class="w-full max-w-4xl">

        <header class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-[#f5c2e7] tracking-wide">Estación Meteorológica</h1>
            <p class="text-xs text-[#a6adc8] mt-1 uppercase tracking-widest">Monitoreo en Tiempo Real</p>
        </header>

        @php 
            $ultimoRegistro = $registros->last(); 
            $historial = $registros->reverse()->skip(1); 
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

            <!-- ============ COLUMNA IZQUIERDA: Último registro ============ -->
            <div class="md:col-span-3 bg-[#252538] border border-[#3b3b4f] rounded-2xl p-8 shadow-2xl backdrop-blur-md relative overflow-hidden flex flex-col justify-center">

                <div class="absolute top-5 left-5 flex items-center gap-1.5">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <span class="text-[10px] text-[#a6adc8] font-mono uppercase">En línea</span>
                </div>

                @if($ultimoRegistro)
                    <div class="mt-6">
                        <p class="text-center text-xs text-[#a6adc8] uppercase tracking-widest font-mono mb-6">Última lectura</p>

                        <div class="grid grid-cols-2 gap-6 divide-x divide-[#2d2d3f]">
                            <!-- Temperatura -->
                            <div class="flex flex-col items-center justify-center">
                                <span class="text-xs text-[#a6adc8] uppercase tracking-wider mb-2 font-mono">Temperatura</span>
                                <div class="flex items-baseline justify-center font-bold text-7xl text-[#89b4fa]" id="temp-display">
                                    <span id="temp-value">{{ $ultimoRegistro->temperatura }}</span>
                                    <span class="text-3xl text-[#f38ba8] ml-1">°C</span>
                                </div>
                            </div>

                            <!-- Humedad -->
                            <div class="flex flex-col items-center justify-center">
                                <span class="text-xs text-[#a6adc8] uppercase tracking-wider mb-2 font-mono">Humedad</span>
                                <div class="flex items-baseline justify-center font-bold text-7xl text-[#a6e3a1]" id="hum-display">
                                    <span id="hum-value">{{ $ultimoRegistro->humedad }}</span>
                                    <span class="text-3xl text-[#f9e2af] ml-1">%</span>
                                </div>
                            </div>
                        </div>

                        <footer class="text-center text-sm text-[#a6adc8] font-mono mt-8 pt-4 border-t border-[#2d2d3f]">
                            <div>Actualizado: <span class="text-[#cba6f7]" id="temp-time">{{ $ultimoRegistro->created_at->format('H:i:s') }}</span></div>
                            <div class="text-[11px] text-[#6c7086] mt-1">Actualizando automáticamente cada 5 minutos...</div>
                        </footer>
                    </div>
                @else
                    <div class="py-12 text-center text-[#a6adc8] text-sm">
                        Sin datos registrados actualmente
                    </div>
                @endif
            </div>

            <!-- ============ COLUMNA DERECHA: Historial ============ -->
            <div class="md:col-span-2 bg-[#252538] border border-[#3b3b4f] rounded-2xl p-6 shadow-2xl backdrop-blur-md flex flex-col">
                <h2 class="text-xs text-[#a6adc8] uppercase tracking-widest mb-4 font-mono">Historial</h2>

                @if($historial->count() > 0)
                    <div class="flex-1 overflow-y-auto scroll-thin pr-1 space-y-2 max-h-[420px]">
                        @foreach($historial as $registro)
                            <div class="flex items-center justify-between bg-[#181825] rounded-lg px-4 py-3 border border-[#2d2d3f]">
                                <span class="text-[11px] text-[#6c7086] font-mono">{{ $registro->created_at->format('d/m H:i:s') }}</span>
                                <div class="flex gap-3 text-sm font-semibold">
                                    <span class="text-[#89b4fa]">{{ $registro->temperatura }}°C</span>
                                    <span class="text-[#a6e3a1]">{{ $registro->humedad }}%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex-1 flex items-center justify-center text-[#6c7086] text-sm">
                        Sin registros anteriores
                    </div>
                @endif
            </div>

        </div>
    </div>
</body>
</html>
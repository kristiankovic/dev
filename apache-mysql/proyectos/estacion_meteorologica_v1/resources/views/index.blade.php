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
    </style>
</head>
<body class="bg-[#1e1e2e] text-[#cdd6f4] min-h-screen flex flex-col items-center justify-center font-sans p-4">

    <!-- Tarjeta Principal del Dashboard -->
    <div class="bg-[#252538] border border-[#3b3b4f] rounded-2xl p-8 w-full max-w-md shadow-2xl text-center backdrop-blur-md">
        
        <header class="mb-6">
            <h1 class="text-2xl font-bold text-[#f5c2e7] tracking-wide">Estación Meteorológica</h1>
            <p class="text-xs text-[#a6adc8] mt-1 uppercase tracking-widest">Monitoreo en Tiempo Real</p>
        </header>

        <!-- Contenedor del Dato Principal -->
        <div class="bg-[#181825] rounded-xl py-8 px-6 my-6 border border-[#2d2d3f] shadow-inner relative overflow-hidden">
            <div class="absolute top-3 left-3 flex items-center gap-1.5">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-[10px] text-[#a6adc8] font-mono uppercase">En línea</span>
            </div>

            <!-- Obtener el último registro de la colección de forma segura -->
            @php 
                $ultimoRegistro = $registros->last(); 
            @endphp

            @if($ultimoRegistro)
                <!-- Distribución en Grid para separar Temperatura y Humedad -->
                <div class="grid grid-cols-2 gap-4 mt-4 divide-x divide-[#2d2d3f]">
                    
                    <!-- Sección de Temperatura -->
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-[10px] text-[#a6adc8] uppercase tracking-wider mb-1 font-mono">Temperatura</span>
                        <div class="flex items-baseline justify-center font-bold text-5xl text-[#89b4fa]" id="temp-display">
                            <span id="temp-value">{{ $ultimoRegistro->temperatura }}</span>
                            <span class="text-2xl text-[#f38ba8] ml-0.5"> °C</span>
                        </div>
                    </div>

                    <!-- Sección de Humedad -->
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-[10px] text-[#a6adc8] uppercase tracking-wider mb-1 font-mono">Humedad</span>
                        <div class="flex items-baseline justify-center font-bold text-5xl text-[#a6e3a1]" id="hum-display">
                            <span id="hum-value">{{ $ultimoRegistro->humedad }}</span>
                            <span class="text-2xl text-[#f9e2af] ml-0.5"> %</span>
                        </div>
                    </div>

                </div>
            @else
                <div class="py-4 text-[#a6adc8] text-sm">
                    Sin datos registrados actualmente
                </div>
            @endif
        </div>

        <!-- Metadata: Última actualización habilitada -->
        @if($ultimoRegistro)
            <footer class="text-sm text-[#a6adc8] flex flex-col gap-1 font-mono">
                <div>Última lectura: <span class="text-[#cba6f7]" id="temp-time">{{ $ultimoRegistro->created_at->format('H:i:s') }}</span></div>
                <div class="text-[11px] text-[#6c7086] mt-4">Actualizando automáticamente cada 5 minutos...</div>
            </footer>
        @endif

    </div>
</body>
</html>
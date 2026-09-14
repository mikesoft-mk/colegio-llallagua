<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Libretas - U.E. Llallagua</title>
    
    <!-- CSS Puro integrado: Elimina la dependencia de CDN e internet 🔒 -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 480px;
        }
        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 30px;
            border: none;
        }
        .text-center { text-align: center; }
        .h2-title {
            color: #1e293b;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 8px 0;
        }
        .p-subtitle {
            color: #64748b;
            font-size: 14px;
            margin: 0 0 24px 0;
            line-height: 1.5;
        }
        hr {
            border: 0;
            border-top: 1px solid #e2e8f0;
            margin: 20px 0;
        }
        .mb-3 { margin-bottom: 16px; }
        .mb-4 { margin-bottom: 24px; }
        .form-label {
            display: block;
            color: #0d6efd; /* Color azul institucional */
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .form-control {
            width: 100%;
            box-sizing: border-box;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 15px;
            color: #334155;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: #0d6efd;
            background-color: #ffffff;
        }
        .d-grid { display: grid; }
        .btn-primary {
            background-color: #0d6efd;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(13, 110, 253, 0.2);
            transition: background-color 0.2s;
        }
        .btn-primary:hover { background-color: #0b5ed7; }
        .alert-danger {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #dc2626;
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .student-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
        }
        .btn-success {
            display: block;
            background-color: #198754;
            color: #ffffff;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 8px;
            box-shadow: 0 2px 4px rgba(25, 135, 84, 0.15);
        }
        .btn-success:hover { background-color: #157347; }
        .lock-box {
            background-color: #ffffff;
            color: #64748b;
            text-align: center;
            font-size: 13px;
            padding: 10px;
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 class="h2-title text-center">Unidad Educativa Llallagua</h2>
            <p class="p-subtitle text-center">Consulta de Libretas Escolares Trimestrales</p>
            <hr>

            <!-- Alertas de Errores -->
            @if(session('error'))
                <div class="alert-danger text-center">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif

            <!-- Formulario de Búsqueda -->
            <form method="POST" action="{{ route('consultas.buscar') }}">
                @csrf 

                <div class="mb-3">
                    <label class="form-label">Carnet de Identidad (CI):</label>
                    <input type="text" class="form-control" name="ci_estudiante" value="{{ old('ci_estudiante') }}" placeholder="Ej: 1234567" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn-primary">
                        Buscar Calificaciones
                    </button>
                </div>
            </form>

            <!-- Resultados de Búsqueda -->
            @if(isset($estudiante))
                <hr>
                <div class="student-box">
                    <p style="margin: 0 0 4px 0; color: #1e293b;">Estudiante: <strong style="color: #0d6efd;">{{ $estudiante->apellidos_nombres }}</strong></p>
                    <p style="margin: 0 0 16px 0; color: #64748b; font-size: 13px;">Seleccione el reporte trimestral para descargar:</p>
                    
                    <div class="d-grid">
                        <!-- 1ER TRIMESTRE -->
                        @if($estudiante->pdf_trimestre1)
                            <a href="{{ asset('libretillas/' . $estudiante->pdf_trimestre1) }}" target="_blank" class="btn-success">
                                📄 Descargar 1er Trimestre
                            </a>
                        @else
                            <div class="lock-box">🔒 1er Trimestre - No disponible todavía</div>
                        @endif

                        <!-- 2DO TRIMESTRE -->
                        @if($estudiante->pdf_trimestre2)
                            <a href="{{ asset('libretillas/' . $estudiante->pdf_trimestre2) }}" target="_blank" class="btn-success">
                                📄 Descargar 2do Trimestre
                            </a>
                        @else
                            <div class="lock-box">🔒 2do Trimestre - No disponible todavía</div>
                        @endif

                        <!-- 3ER TRIMESTRE -->
                        @if($estudiante->pdf_trimestre3)
                            <a href="{{ asset('libretillas/' . $estudiante->pdf_trimestre3) }}" target="_blank" class="btn-success">
                                📄 Descargar 3er Trimestre
                            </a>
                        @else
                            <div class="lock-box">🔒 3er Trimestre - No disponible todavía</div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>

</body>
</html>

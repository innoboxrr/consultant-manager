#!/bin/bash

echo "🚀 Instalador para node"
echo "📁 Directorio actual: $(pwd)"

# 1. Inicializar package.json si no existe
if [ ! -f package.json ]; then
    echo "📦 No se encontró package.json, creando uno..."
    npm init -y
else
    echo "📦 package.json encontrado"
fi

# 2. Instalar dependencias
echo "📥 Instalando dependencias..."

npm install \
    @headlessui/vue@^1.7.23 \
    @heroicons/vue@^2.2.0 \
    apexcharts@^4.7.0 \
    dayjs@^1.11.13 \
    innoboxrr-form-elements@^3.0.4 \
    innoboxrr-http-request@^1.1.0 \
    innoboxrr-js-libs@^1.0.9 \
    innoboxrr-js-validator@^1.1.0 \
    innoboxrr-vue-datatable@^1.3.3 \
    innoboxrr-vue-utils@^1.0.0 \
    pinia@^2.3.0 \
    vue@^3.5.13 \
    vue-router@^4.5.0 \
    innoboxrr-locale-generator

# 3. Instalar devDependencies
echo "🔧 Instalando dependencias de desarrollo..."
npm install -D vite@^4.0.0

# 4. Mostrar resumen
echo "✅ Instalación completada. Dependencias instaladas:"
npm list --depth=0

echo "📌 Script finalizado."

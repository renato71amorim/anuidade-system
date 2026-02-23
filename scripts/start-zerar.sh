#!/bin/bash

echo "⚠️ Atenção: este processo irá APAGAR volumes e recriar o ambiente do zero!"
read -p "Tem certeza? Escreva exatamente: sim eu quero → " confirmacao

if [ "$confirmacao" != "sim eu quero" ]; then
  echo "❌ Operação cancelada."
  exit 1
fi

# ------------------------------------------------------------
# Carregar variáveis do .env
# ------------------------------------------------------------
if [ ! -f .env ]; then
  echo "❌ Arquivo .env não encontrado."
  exit 1
fi

echo "📂 Lendo variáveis do .env..."
export $(grep -v '^#' .env | xargs)

# Verificações essenciais
if [ -z "$PROJECT_NAME" ]; then
  echo "❌ PROJECT_NAME não definido no .env."
  exit 1
fi

if [ -z "$DB_ROOT_PASS" ]; then
  echo "❌ DB_ROOT_PASS não definido no .env."
  exit 1
fi

DB_CONTAINER="${PROJECT_NAME}-db"

echo "📦 Container do banco detectado: $DB_CONTAINER"
echo ""

# ------------------------------------------------------------
# Derrubar containers + volumes
# ------------------------------------------------------------
echo "🔄 Limpando containers e volumes antigos..."
docker compose down --volumes --remove-orphans

# ------------------------------------------------------------
# Subir novamente do zero
# ------------------------------------------------------------
echo "🚀 Subindo containers com build forçado..."
docker compose up --build --force-recreate --detach

echo "✅ Ambiente iniciado do zero com sucesso!"

if [ -n "$PROJECT_URL" ]; then
  echo "🌐 Acesse: $PROJECT_URL"
fi

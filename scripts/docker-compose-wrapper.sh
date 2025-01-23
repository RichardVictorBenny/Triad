
COMMAND=$1

if [ "$COMMAND" == "down" ]; then
    echo "Stopping services and exporting database..."
    ./scripts/export-db.sh
    docker-compose down
elif [ "$COMMAND" == "up" ]; then
    echo "Starting services and importing database..."
    docker-compose up --build
    sleep 15 # Wait for the database to initialize
    ./scripts/import-db.sh
else
    echo "Usage: $0 {up|down}"
fi

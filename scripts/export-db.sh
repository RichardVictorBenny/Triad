
# Name of the MySQL container
CONTAINER_NAME="mysql_db"
# MySQL credentials
MYSQL_USER="test"
MYSQL_PASSWORD="triad"
MYSQL_DATABASE="booking"
# Export file path
EXPORT_FILE="./seed.sql"

# Check if the container is running
if [ "$(docker ps -q -f name=$CONTAINER_NAME)" ]; then
    echo "Exporting database from container '$CONTAINER_NAME'..."
    docker exec -i $CONTAINER_NAME mysqldump -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE > $EXPORT_FILE
    echo "Database exported to $EXPORT_FILE"
else
    echo "Container '$CONTAINER_NAME' is not running. Skipping export."
fi

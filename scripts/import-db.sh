
CONTAINER_NAME="mysql_db"
MYSQL_USER="test"
MYSQL_PASSWORD="triad"
MYSQL_DATABASE="booking"
# Seed file path
SEED_FILE="./seed.sql"

# Check if the seed file exists
if [ -f $SEED_FILE ]; then
    echo "Importing database from $SEED_FILE..."
    docker exec -i $CONTAINER_NAME mysql -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE < $SEED_FILE
    echo "Database imported from $SEED_FILE"
else
    echo "Seed file $SEED_FILE not found. Skipping import."
fi

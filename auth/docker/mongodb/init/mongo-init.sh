#!/bin/bash
echo "--------------------------------------------------------------------------"
set -e
#WARNING AFTER EDITING SWITCH TO UNIX LINE SEPARATORS
mongo <<EOF
use admin
db.createUser({
    user:  '$MONGO_APP_SERVER_USERNAME',
    pwd: '$MONGO_APP_SERVER_PASSWORD',
    roles: [{
        role: 'readWrite',
        db: '$MONGO_INITDB_DATABASE'
    }]
})


use $MONGO_INITDB_DATABASE
db.createCollection("node_data")
EOF

echo "--------------------------------------------------------------------------"
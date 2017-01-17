#!/usr/bin/env bash
TOKEN="3AK1UK2H-5UGG-4CT9-8D10-9WZK4KXPKCV6"
API_URL="https://api.nodeping.com/api"
API_VERSION=1
DATE_FROM=$(date --date='-1 month' --iso-8601)
CHECK_CONFIG="interval=days&start=$DATE_FROM"


get_checks(){
    curl -u "$1": -X GET "$2"/"$3"/checks | jq '[.[] | {name: .label, type: .type, id: ._id}]'
}

get_check_info() {
    curl -u "$1": --data "$CHECK_CONFIG" "$2"/"$3"/results/uptime/"$4"
}


checks=$(get_checks ${TOKEN} ${API_URL} ${API_VERSION})
checks_length=$(echo "$checks" | jq '. | length')


for (( i=0; i<$checks_length; i++ ))
do
    id=$(echo "$checks" | jq -r ".[$i].id")
    response=$(get_check_info ${TOKEN} ${API_URL} ${API_VERSION} ${id})

done


echo ${checks}

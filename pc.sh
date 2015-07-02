#!/bin/bash


pub=$1

txid=$2

type=$3

count=$4

height=$5


hextx=$(paycoind getrawtransaction "$txid")

rawtx=$(paycoind decoderawtransaction "$hextx")

output=$(echo "$rawtx" | grep -B6 'pubkey' | grep value | sed -e 's/"value" : //ig' -e 's/,//ig')

address=$(echo "$rawtx" | grep -A2 'pubkey' | grep 'P' | sed 's/"//ig' | xargs)



mysql -uYOURMYSQLUSERNAMEHERE -pYOURMYSQLPASSWORDHERE -D primeblocks -e "INSERT into blocksnew (Height, TXID, Pubkey, Stake_Rate, Key_Number, Output, Address) VALUES ('$5', '$2', '$1', '$3', '$4', '$output', '$address')"

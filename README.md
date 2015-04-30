

# primeblocks
www.primeblocks.com


Installation:

Build dooglus's modified paycoind

  git clone https://github.com/dooglus/paycoin
  
  cd paycoin/
  
  git checkout pcstakenotify
  
  cd src/
  
  make -f makefile.unix
  
  sudo mv paycoind /usr/bin
  
paycoin.conf:

  server=1
  
  daemon=1
  
  rpcuser=YOURUSERNAMEHERE
  
  rpcpassword=YOURPASSWORDHERE
  
  pcstakenotify=/home/YOURUSERNAMEHERE/pc.sh %p %i %t %c %h
  
DO NOT START PAYCOIND YET
  
Create a mysql database named primeblocks then a table with the following schema
 
  create database primeblocks;
  
  use primeblocks;
  
  CREATE TABLE blocks (ID int NOT NULL AUTO_INCREMENT, Height VARCHAR(10), TXID VARCHAR(99), Output VARCHAR(20), Pubkey VARCHAR(256), Stake_Rate VARCHAR(3), Key_Number VARCHAR(3), Address VARCHAR(99), PRIMARY KEY (ID));
  exit
  
Create the bash script to update the database

  echo "" > pc.sh
  
  chmod +x pc.sh
  
  nano pc.sh
  
  Copy the following into that file
  
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


The save and close the file. You can now start paycoind and the database should begin to fill up


Place index.php and script.js in your webservers root directory. Edit in your database username and password. And thats it.


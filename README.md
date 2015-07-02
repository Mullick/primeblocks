

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
  
Create a mysql database named primeblocks then a table with the following schema
 
  create database primeblocks;
  
  use primeblocks;
  
  CREATE TABLE blocks (ID int NOT NULL AUTO_INCREMENT, Height VARCHAR(10), TXID VARCHAR(99), Output VARCHAR(20), Pubkey VARCHAR(256), Stake_Rate VARCHAR(3), Key_Number VARCHAR(3), Address VARCHAR(99), PRIMARY KEY (ID));
  exit
  
Place pc.sh in your home directory

Make pc.sh executible

chmod +x pc.sh

Place paycoin.conf in your paycoin datadirectory. Make sure to change the RPC username and password as well as the path to pc.sh

You can now start paycoind and the database should begin to fill up


Place index.php and script.js in your webservers root directory. Edit in your database username and password. And thats it.


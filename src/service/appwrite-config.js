import { Account,Client } from 'appwrite';
 
const client=new Client()
export const account = new Account(client);
client
    .setEndpoint('https://89.116.231.4/v1')
    .setProject('63c7a58b52d4c014de4e');
// export account;


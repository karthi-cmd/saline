import { Account,Client,Databases } from 'appwrite';
 
const client=new Client()
export const collectionId='63cafcabe06d83c31e33';
export const dbId='63c9a7d2d94beb5c9a33';
export const db = new Databases(client);
export const account = new Account(client);
client
    .setEndpoint('https://89.116.231.4/v1')
    .setProject('63c7a58b52d4c014de4e');
// export account;


import { Account, Client, Databases } from "appwrite";

export const client = new Client();
client
  .setEndpoint("https://89.116.231.4/v1")
  .setProject("63c7a58b52d4c014de4e");
export const devicesCollectionId = "63cafcabe06d83c31e33";
export const variablesCollectionId = "63cf98f7929c1a3b17c0";
export const dbId = "63c9a7d2d94beb5c9a33";
export const db = new Databases(client);
export const account = new Account(client);
// export account;

import { Account, Client, Databases } from "appwrite";

export const client = new Client();
client
  .setEndpoint("https://dripsenseit.tech/v1")
  .setProject("64082b10e1b5dc76d2d2");
export const devicesCollectionId = "6408364a2f720a43055d";
export const variablesCollectionId = "6408365d179944b5b3aa";
export const dbId = "6408362bce5cf88fe516";
export const db = new Databases(client);
export const account = new Account(client);
// export account;

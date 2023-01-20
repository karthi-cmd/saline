// import {Client} from 'appwrite';
import { Client, Account } from "appwrite";

const client = new Client();

const account = new Account(client);

client
    .setEndpoint('https://89.116.231.4/v11') // Your API Endpoint
    .setProject('63c7a58b52d4c014de4e') // Your project ID
;

const promise = account.get();

promise.then(function (response) {
    console.log(response); // Success
}, function (error) {
    console.log(error); // Failure
});
// const sdk = require('node-appwrite');

// // Init SDK
// const client = new sdk.Client();

// const users = new sdk.Users(client);

// client
//     .setEndpoint('https://89.116.231.4/v1') // Your API Endpoint
//     .setProject('63c7a58b52d4c014de4e') // Your project ID
//     .setKey('919c2d18fb5d4...a2ae413da83346ad2') // Your secret API key
// ;

// const promise = users.get('63ca55029dbf28b79455');

// promise.then(function (response) {
//     console.log(response);
// }, function (error) {
//     console.log(error);
// });
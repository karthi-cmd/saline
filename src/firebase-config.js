// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";

const firebaseConfig = {
  apiKey: "AIzaSyCFAFlDpruwvm7vztt54ZEE8B-Vf5YrlBA",
  authDomain: "saline-test.firebaseapp.com",
  databaseURL: "https://saline-test-default-rtdb.firebaseio.com",
  projectId: "saline-test",
  storageBucket: "saline-test.appspot.com",
  messagingSenderId: "604641420061",
  appId: "1:604641420061:web:e754f2e220327f4a0437f4",
  measurementId: "G-TM3FKFVELG",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

export const db = getFirestore(app);

export const auth = getAuth(app);

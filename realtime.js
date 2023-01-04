import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
import {
  getFirestore,
  setDoc,
  addDoc,
  doc,
  updateDoc,
  deleteDoc,
  getDoc,
  query,
  collection,
  where,
  getDocs,
  onSnapshot,
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);

function addDeviceCard(name, deviceid){
 let container = document.getElementsByClassName('row')[0];

  let div1 = document.createElement('div') ;
  card.className = 'col-xl-3 col-lg-6 resizable';
  
  let div2 = document.createElement('div');
  card.className = 'card l-bg-black';

  let div3 = document.createElement('div');
  cardBody.className = 'card-statistic-3 p-4';
  
  let div4 = document.createElement('div');
  cardBody.className = 'mb-4';

  let div5 = document.createElement('h5');
  title.innerText = name;
  title.className = 'card-title mb-0';

  let div6 = document.createElement('div');
  color.className = 'row align-items-center mb-2 d-flex';
  
  let div7 = document.createElement('div');
  color.className = 'col-8';

  let div8 = document.createElement('h2');
  title.innerText = deviceid;
  color.className = 'd-flex align-items-center mb-0';


  div1.appendChild(div2);
  div2.appendChild(div3);
  div3.appendChild(div4);
  div4.appendChild(div5);
  div5.appendChild(div6);
  div6.appendChild(div7);
  div7.appendChild(div8);
  container.appendChild(div1);
  
}

async function GetAllDataOnce() {
  const querySnapshot = await getDocs(collection(db, "user"));
  var patients = [];

  querySnapshot.forEach((doc) => {
    patients.push(doc.data());
  });
  AddAllItemsToTable(patients);
}
async function GetAllDataRealtime() {
  const collectionRef = collection(db, "devices");
  onSnapshot(collectionRef, (querySnapshot) => {
    var patients = [];
    querySnapshot.forEach((doc) => {
      patients.push(doc.data());
    });

    AddAllItemsToTable(patients);
  });
}
window.onload = GetAllDataRealtime;

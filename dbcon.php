
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="./assets/js/real.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container mt">
    <table class="table table-dark">
      <thead>
        <th>no</th>
        <th>name</th>
        <th>bedno</th>
        <th>disease</th>
        <th>gender</th>
      </thead>
      <tbody id="tbody1"></tbody>
    </table>
  </div>
  <script type="module">
    var pno = 0;
    var tbody = document.getElementById('tbody1');

    function AddItemToTable(name, bd, sta, gen) {
      let trow = document.createElement('trow');
      let td1 = document.createElement('td');
      let td2 = document.createElement('td');
      let td3 = document.createElement('td');
      let td4 = document.createElement('td');
      let td5 = document.createElement('td');

      td1.innerHTML = ++pno;
      td2.innerHTML = name;
      td3.innerHTML = bd;
      td4.innerHTML = sta;
      td5.innerHTML = gen;

      trow.appendChild(td1);
      trow.appendChild(td2);
      trow.appendChild(td3);
      trow.appendChild(td4);
      trow.appendChild(td5);
      tbody.appendChild(trow);

    }

    function AddAllItemsToTable(Thepatient) {
      pno = 0;
      tbody.innerHTML = " ";
      Thepatient.forEach(element => {
        AddItemToTable(element.name, element.bedno, element.disease, element.gender);

      });
    }


    import {      initializeApp    } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
    import {      getAnalytics    } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
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
      onSnapshot
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
      measurementId: "G-TM3FKFVELG"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    // Initialize Cloud Firestore and get a reference to the service
    const db = getFirestore(app);


    async function GetAllDataOnce() {
      const querySnapshot = await getDocs(collection(db, "user"));
      var patients = [];

      querySnapshot.forEach(doc => {
        patients.push(doc.data());
      });
      AddAllItemsToTable(patients);

    }
    async function GetAllDatRealtime() {
      const dbRef = collection(db, "user");
      onSnapshot(dbRef, (querySnapshot) => {
        var patients = [];
        querySnapshot.forEach(doc => {
          patients.push(doc.data());
        });

        AddAllItemsToTable(patients);
      });

    }
    window.onload = GetAllDatRealtime;
  </script>

</body>

</html>
import React, {useEffect, useState} from 'react'
import {client, db} from '../service/appwrite-config'

// const getData = ()=>{
    
// }

function Variable() {
    
    const [variables, setVariables] = useState([]);


    useEffect(()=>{
        const unsubscribe = client.subscribe(["databases.*.collections.*.documents"], (response) => {
            // Callback will be executed on changes for documents A and all files.
            console.log(response);
            setVariables(response.payload);
            console.log("ans");
        });
      
    return()=>{
        unsubscribe();
    }
    }, []);
useEffect(()=>{
    const promise = db.listDocuments('63c9a7d2d94beb5c9a33', '63cf98f7929c1a3b17c0');
      promise.then(function (response) {
        console.log(response.documents);
        setVariables(response.documents);
    }, function (error) {
        console.log(error);
    });
}, [])

    console.log("start");
    console.log("end");

  return (
    <div>Variable</div>
  )
}

export default Variable
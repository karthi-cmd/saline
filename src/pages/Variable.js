import React, {useEffect, useState} from 'react'
import {client, db} from '../service/appwrite-config'
import { useParams } from 'react-router-dom';
// const getData = ()=>{
    
// }

const Variable=({match})=> {
    const id=useParams();
    console.log(id)
    

        return <h1>{id}</h1>
}
 
export default  Variable

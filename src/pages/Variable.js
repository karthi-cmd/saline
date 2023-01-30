import React, {useEffect, useState} from 'react'
import {client, db, dbId} from '../service/appwrite-config'
import { useParams} from 'react-router-dom';
// const getData = ()=>{
import {useQuery} from 'react-query';
// }



const Variable=()=> {
    const params = useParams();
    const id = params.id;
    console.log(params.id);
    
    const [variables, setVariables] = useState([]);
    const fetchVariables = () =>{
        const promise =  db.listDocuments("63c9a7d2d94beb5c9a33", "63cafcabe06d83c31e33");
        promise.then(response => {
            console.log(response.documents);
            setVariables(response.documents);
        })
    }
    const {isLoading, data, isError, error, isFetching} = useQuery(
        "variable",
        fetchVariables,
        {
            refetchInterval: 5000,
        }
    );

    
    

        return (
        <>
        <h1>{id}</h1>
        {variables.map((variable)=>{
            return(<>
            {variable.dpi}
            </>)
        })}
        </>
        )
}
 
export default  Variable

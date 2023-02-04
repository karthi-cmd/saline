import React, {useEffect, useState} from 'react'
import {client, db, dbId} from '../service/appwrite-config'
import { useParams} from 'react-router-dom';
// const getData = ()=>{
import {useQuery} from 'react-query';

// }
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import Typography from '@mui/material/Typography';
import Grid from '@mui/material/Grid';
import { Stack } from '@mui/system';


const Variable=()=> {
    const params = useParams();
    const id = params.id;
   
    console.log(params.id);
   
    
    const [variables, setVariables] = useState([]);
    const fetchVariables = () =>{
        const promise =  db.listDocuments("63c9a7d2d94beb5c9a33", "63cf98f7929c1a3b17c0");
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
        <h1 style={{fontSize:40,color:'#000'}}>DEVICE:{id}</h1>
        <Stack direction={'row'}  sx={{flexWrap:'wrap'}}>
        {variables.map((variable)=>{
           
            return(<>
         
            
         <Grid  sx={{p:'2%'}}>
   <Card key={variable} sx={{width:225,height:'100%',backgroundImage:'linear-gradient(to right,#EC008C,#FC6767)',borderRadius:'10px' }}
    variant="outlined"  >
   
      <>
      
     <CardContent>
        <Grid container>
          <Grid justifyContent='flex-end'>
      <Typography variant="h4"color="#FFFFFF" sx={{pb:2}} >
      {variable.dpm}
     </Typography>
     </Grid></Grid>

     <Grid container>
          <Grid justifyContent='flex-end'>
      <Typography variant="h5"  color="#FFFFFF" align='left'>
      {variable.capacity}
      </Typography>
      </Grid></Grid>
    
   
    
      </CardContent>
      
      </>
    
    </Card> 
   </Grid>
   
     
            </>)
       
            
        })}
         </Stack>
        </>
        )
}
 
export default  Variable;
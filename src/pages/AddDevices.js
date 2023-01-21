import {
  Button, 
  FormHelperText, 
  Grid,  
  Paper, 
  TextField,
  } from '@mui/material';
import { Container } from '@mui/system';

import { collectionId,db,dbId } from '../service/appwrite-config';
import { v4 as uuid } from 'uuid';
import {React,useState} from 'react';


export default function AddDevices() {
    const [deviceDetails, setDeviceDetails] = useState({
        deviceId: "",
        deviceName: "",
        description:""
      });

      const add=async (e)=>{
        e.preventDefault();

        const promise = db.createDocument(dbId,collectionId,uuid(), { 
            ...deviceDetails,});

promise.then(function (response) {
    console.log(response); // Success
}, function (error) {
    console.log(error); // Failure
});
      };
  return (
    <div>
        <Container maxWidth="sm">
            <Grid
                container
                spacing={2}
                direction="column"
                justifyContent="center"
                style={{ minHeight: "50vh" }}
                 
            >
                
                <Paper elevation={0} sx={{ padding: 5 }}>
                
                    
                    <Grid container direction="column" spacing={1}>
                        <Grid item>
                        <FormHelperText><h2>Device ID</h2></FormHelperText>
                            <TextField
                                onChange={(e) => {
                                    setDeviceDetails({
                                      ...deviceDetails,
                                      deviceId: e.target.value,
                                    });
                                  }}
                                type="number"
                                fullWidth 
                                placeholder='Enter device id '
                                variant='outlined'
                            >

                            </TextField>
                        </Grid>
                        <Grid item>
                        <FormHelperText><h2>Device Name</h2></FormHelperText>
                            <TextField
                                onChange={(e) => {
                                    setDeviceDetails({
                                      ...deviceDetails,
                                      deviceName: e.target.value,
                                    });
                                  }}
                                type="text"
                                fullWidth 
                                placeholder='Enter device name'
                                variant='outlined'
                            >

                            </TextField>
                        </Grid>
                        <Grid item>
                         <FormHelperText><h2>Description</h2></FormHelperText>
                        <TextField
                                onChange={(e) => {
                                    setDeviceDetails({
                                      ...deviceDetails,
                                      description: e.target.value,
                                    });
                                  }}
                                type="email"
                                fullWidth 
                                placeholder='Description'
                                variant='outlined'
                            >

                            </TextField>
                        </Grid>
                        
                        <Grid item>
                        <Button variant="contained" type="button"  onClick={(e) => add(e)} >Save</Button>
                         
                        </Grid>



                    </Grid>

                </Paper>
            </Grid>

        </Container>
    </div>
);
};
 
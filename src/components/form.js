import { Button, FormHelperText, Grid, Paper, TextField } from "@mui/material";
import { Container } from "@mui/system";

import { devicesCollectionId, db, dbId } from "../service/appwrite-config";
import { v4 as uuid } from "uuid";
import { React, useRef } from "react";


export default function Form() {
   
    



    const deviceForm = useRef(null);

    const handleClickEvent = (e) => {

        e.preventDefault();
        

        const form = deviceForm.current
        const promise = db.createDocument(dbId, devicesCollectionId, uuid(), {
            DEVICEID: form['deviceid'].value,
            DEVICENAME: form['devicename'].value,
            DESCRIPTION: form['description'].value,
        });

        promise.then(
            function (response) {
                console.log(response); // Success
                alert("Data inserted");
            },
            function (error) {
                console.log(error); // Failure
            }
        );
        

    }





    return (
        <div>
            <form ref={deviceForm} onSubmit={handleClickEvent} >
                <Container maxWidth="sm">
                    <Grid
                        container
                        spacing={2}
                        direction="column"
                        justifyContent="center"
                        style={{ minHeight: "60vh" }}

                    >

                        <Paper elevation={20} sx={{ padding: 3 }}>
                            <Grid align='center'>

                                <h2>DEVICE</h2>
                            </Grid>


                            <Grid container direction="column" spacing={2}>
                                <Grid item>
                                    <FormHelperText><h3>Device ID</h3></FormHelperText>
                                    <TextField
                                        fullWidth
                                        placeholder='Enter device id '
                                        variant='outlined'
                                        name={'deviceid'}
                                       
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText><h3>Device Name</h3></FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder="Enter unit"
                                        variant='outlined'
                                        name={'devicename'}
                                        
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText><h3>Description</h3></FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder='Description'
                                        variant='outlined'
                                        name={'description'}
                                      

                                    >

                                    </TextField>
                                </Grid>

                                <Grid item>
                                    <Button onClick={(e) => handleClickEvent(e)} variant="contained" color="primary" type="submit" className="btns">
                                        Save
                                    </Button>

                                </Grid>



                            </Grid>

                        </Paper>
                    </Grid>

                </Container>
            </form>
        </div>
    );
}
import { Button, FormHelperText, Grid, Paper, TextField } from "@mui/material";
import { Container } from "@mui/system";

import { devicesCollectionId, db, dbId } from "../service/appwrite-config";
import { v4 as uuid } from "uuid";
import { React, useState, useRef } from "react";
import { useForm } from "react-hook-form";


export default function Form() {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const onSubmit = (data) => console.log(data);
    console.log(errors);



    const deviceForm = useRef(null);

    const handleClickEvent = (e) => {

        e.preventDefault();
        handleSubmit(onSubmit);

        const form = deviceForm.current
        const promise = db.createDocument(dbId, devicesCollectionId, uuid(), {
            deviceId: form['deviceid'].value,
            deviceName: form['devicename'].value,
            description: form['description'].value,
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
        handleSubmit(onSubmit)

    }





    return (
        <div>
            <form ref={deviceForm} onSubmit={handleClickEvent}>
                <Container maxWidth="sm">
                    <Grid
                        container
                        spacing={2}
                        direction="column"
                        justifyContent="center"
                        style={{ minHeight: "80vh" }}

                    >

                        <Paper elevation={20} sx={{ padding: 5 }}>
                            <Grid align='center'>

                                <h2>DEVICE</h2>
                            </Grid>


                            <Grid container direction="column" spacing={2}>
                                <Grid item>
                                    <FormHelperText>Device ID</FormHelperText>
                                    <TextField
                                        fullWidth
                                        placeholder='Enter device id '
                                        variant='outlined'
                                        name={'deviceid'}
                                        {...register("deviceid", { required: "Id is required." })}
                                        error={Boolean(errors.dvar)}
                                        helperText={errors.dvar?.message}
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText>Device Name</FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder="Enter unit"
                                        variant='outlined'
                                        name={'devicename'}
                                        {...register("devicename", { required: "name is required." })}
                                        error={Boolean(errors.var)}
                                        helperText={errors.var?.message}
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText>Description</FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder='Description'
                                        variant='outlined'
                                        name={'description'}
                                        {...register("description", { required: "desc is required." })}
                                        error={Boolean(errors.desc)}
                                        helperText={errors.desc?.message}

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
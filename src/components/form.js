import React from 'react';

import FormHelperText from '@mui/material/FormHelperText';
import {
    Button,
    
    Grid,
    Paper,
    TextField,
    
} from '@mui/material';
import { Container } from '@mui/system';
import { useForm } from "react-hook-form";


export default function Form() {
    const { register, handleSubmit,  formState: { errors } } = useForm();
    const onSubmit = (data) => console.log(data);
    console.log(errors);
    


   

    return (
        <div>
            <form onSubmit={handleSubmit(onSubmit)}>
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
                                <FormHelperText><h2>Device ID</h2></FormHelperText>
                                <TextField
                                    type="email"
                                    fullWidth
                                    placeholder='Enter device id '
                                    variant='outlined'
                                    name="dvar"
                                    {...register("dvar", { required: "Id is required." })}
                                    error={Boolean(errors.dvar)}
                                    helperText={errors.dvar?.message}
                                >

                                </TextField>
                            </Grid>
                                <Grid item>
                                    <FormHelperText><h2>Device Name</h2></FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder="Enter unit"
                                        variant='outlined'
                                        name="var"
                                        {...register("var", { required: "name is required." })}
                                        error={Boolean(errors.var)}
                                        helperText={errors.var?.message}
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText><h2>Description</h2></FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder='Description'
                                        variant='outlined'
                                        name="desc"
                                        {...register("desc", { required: "desc is required." })}
                                        error={Boolean(errors.desc)}
                                        helperText={errors.desc?.message}
                                    >

                                    </TextField>
                                </Grid>

                                <Grid item>
                                    <Button variant="contained" color="primary" type="submit" className="btns">
                                        save
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